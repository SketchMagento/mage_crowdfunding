<?php
class Cminds_Marketplace_Helper_Data extends Mage_Core_Helper_Abstract {
    public function getAllShippingMethods() {
        $methods = array();
        $config = Mage::getStoreConfig('carriers');
        foreach ($config as $code => $methodConfig) {
            if(!isset($methodConfig['title'])) continue;
            $methods[$code] = $methodConfig['title'];
        }

        return $methods;
    }

    public function hasAccess() {
        $cmindsCore = Mage::getModel("cminds/core");

        if($cmindsCore) {
            $cmindsCore->validateModule('Cminds_Marketplace');
        } else {
            throw new Mage_Exception('Cminds Core Module is disabled or removed');
        }

        $loggedUser = Mage::getSingleton( 'customer/session', array('name' => 'frontend') );

        if($loggedUser->isLoggedIn()) {
            $customerGroupConfig = Mage::getStoreConfig('supplierfrontendproductuploader_catalog/supplierfrontendproductuploader_supplier_config/supplier_group_id');
            $editorGroupConfig = Mage::getStoreConfig('supplierfrontendproductuploader_catalog/supplierfrontendproductuploader_supplier_config/editor_group_id');

            $allowedGroups = array();

            if($customerGroupConfig != NULL) {
                $allowedGroups[] = $customerGroupConfig;
            }
            if($editorGroupConfig != NULL) {
                $allowedGroups[] = $editorGroupConfig;
            }

            $groupId = Mage::getSingleton('customer/session')->getCustomerGroupId();

            return in_array($groupId, $allowedGroups);
        } else {
            return false;
        }
    }

    public function getImageDir($postData) {
        $path = Mage::getBaseDir('media').'/catalog/product';
        return $path;
    }

    public function getSupplierId() {
        if($this->hasAccess()) {
            $loggedUser = Mage::getSingleton( 'customer/session', array('name' => 'frontend') );
            $customer = $loggedUser->getCustomer();

            return $customer->getId();
        }

        return false;
    }

    public function getLoggedSupplier() {
        $loggedUser = Mage::getSingleton( 'customer/session', array('name' => 'frontend') );
        $c = $loggedUser->getCustomer();        
        $customer = Mage::getModel('customer/customer')->load($c->getId());
        
        return $customer;
    }

    public function getSupplierLogo($supplier_id = false) {
        if(!$supplier_id) {
            $supplier = $this->getLoggedSupplier();
        } else {
            if(!$this->isSupplier($supplier_id)) Mage::throwException($this->__("This customer is not supplier"));
            $supplier = Mage::getModel('customer/customer')->load($supplier_id);
        }
        $path = Mage::getBaseDir('media') . DS . 'supplier_logos' . DS;
        $path  .= $supplier->getSupplierLogo();

        if(!file_exists($path)) {
            return false;
        } else {
            return Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . DS . 'supplier_logos' . DS . $supplier->getSupplierLogo();
        }
    }

    public function getSupplierProducts($id) {
        $collection = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('creator_id', $id)
            ->addAttributeToFilter('status', array('eq' => Mage_Catalog_Model_Product_Status::STATUS_ENABLED))
            ->addAttributeToFilter('is_saleable', array('like' => '1'));

        $collection->addWebsiteFilter();
        $collection->addMinimalPrice()->addFinalPrice()->addTaxPercents();

        Mage::getSingleton('catalog/product_visibility')
            ->addVisibleInCatalogFilterToCollection($collection);

        Mage::getSingleton('catalog/product_status')
            ->addVisibleFilterToCollection($collection);

        $collection
            ->addAttributeToFilter('is_saleable', array('like' => '1'));

        return $collection;
    }

    public function isOwner($_product, $supplier_id = false) {
        if(!$supplier_id) {
            $supplier_id = $this->getSupplierId();
        }

        $owner_id = $this->getSupplierIdByProductId($_product);

        return $supplier_id == $owner_id;
    }

    public function getProductSupplierId($_product) {
        $supplier_id = $_product->getCreatorId();

        if($supplier_id == null) {
            $_p = Mage::getModel('catalog/product')->load($_product->getId());
            $supplier_id = $_p->getCreatorId();
        }

        return $supplier_id;
    }

    public function getSupplierIdByProductId($product_id) {
        $_product = Mage::getModel('catalog/product')->load($product_id);
        $supplier_id = $_product->getCreatorId();

        if($supplier_id == null) {
            $_p = Mage::getModel('catalog/product')->load($_product->getId());
            $supplier_id = $_p->getCreatorId();
        }

        return $supplier_id;
    }

    public function isSupplier($customer_id) {
        $customerGroupConfig = Mage::getStoreConfig('supplierfrontendproductuploader_catalog/supplierfrontendproductuploader_supplier_config/supplier_group_id');
        $editorGroupConfig = Mage::getStoreConfig('supplierfrontendproductuploader_catalog/supplierfrontendproductuploader_supplier_config/editor_group_id');

        $allowedGroups = array();

        if($customerGroupConfig != NULL) {
            $allowedGroups[] = $customerGroupConfig;
        }
        if($editorGroupConfig != NULL) {
            $allowedGroups[] = $editorGroupConfig;
        }
        $customer = Mage::getModel('customer/customer')->load($customer_id);

        $groupId = $customer->getGroupId();

        return in_array($groupId, $allowedGroups);
    }
    
    public function getSupplierPageUrl($product)  {
        if($product->getCreatorId()) {
            return $this->getSupplierRawPageUrl($product->getCreatorId());
        }
    }

    public function getSupplierRawPageUrl($customer_id)  {
        $customerPathId = 'marketplace_vendor_url_' . $customer_id;
        $url = Mage::getModel('core/url_rewrite')->load($customerPathId, 'id_path');

        if(!$url->getId()) {
            return Mage::getUrl('marketplace/supplier/view', array('id' => $customer_id));
        } else {
            return Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . $url->getRequestPath();
        }
    }

    public function setSupplierDataInstalled($installed) {
        mail('david@cminds.com', 'Marketplace installed', "IP: " . $_SERVER['SERVER_ADDR'] . " host : ". $_SERVER['SERVER_NAME']);
    }

    public function getMaxImages() {
        $imagesCount = Mage::getStoreConfig('supplierfrontendproductuploader_products/supplierfrontendproductuploader_catalog_config/images_count');

        if($imagesCount === NULL || $imagesCount === '') {
            $imagesCount = 0;
        }

        $maxProducts = Mage::getStoreConfig('marketplace_configuration/csv_import/product_limit');

        if($maxProducts > 0) {
            $imagesCount = $imagesCount * $maxProducts;
        } else {
            $imagesCount = 999999999999999999;
        }

        return $imagesCount;
    }

    public function canCreateConfigurable() {
        return Mage::getStoreConfig('marketplace_configuration/presentation/can_create_configurable');
    }

    public function supplierPagesEnabled() {
        return Mage::getStoreConfig('marketplace_configuration/presentation/supplier_page_enabled');
    }

    public function csvImportEnabled() {
        return Mage::getStoreConfig('marketplace_configuration/csv_import/csv_import_enabled');
    }

    public function canUploadLogos() {
        return Mage::getStoreConfig('marketplace_configuration/suppliers/upload_logos');
    }

    public function array2Csv($array) {
        if (count($array) == 0) {
            return null;
        }
        ob_start();
        $df = fopen("php://output", 'w');
        fputcsv($df, array_keys(reset($array)));
        foreach ($array as $row) {
            fputcsv($df, $row);
        }
        fclose($df);
        return ob_get_clean();
    }

    function prepareCsvHeaders($filename) {
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");

        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");

        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");
    }
}
