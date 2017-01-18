<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage
 * @copyright  Copyright (c) 2006-2015 X.commerce, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */ ?>

<?php

project_uid
project_name
project_desc
project_pictures
project_loc
funding_status
funding_already_available
funding_required_from_crowd
volunteer_status
volunteers_from_crowd
volunteers_already_available
start_date
expiration_date
like_counts
project_category
project_owner_or_submitter




?>


<?php
/**
 * Eav Variables Installer
 */
try {
    /* @var $installer Mage_Catalog_Model_Resource_Setup */
    $installer = $this;
    $installer->startSetup(); 

    // Add new attribute `size`
    $installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'csize', array(
        'label'                      => 'CSize',             // Default label
        'input'                      => 'select',           // Input type (text, textarea, select...)
        'type'                       => 'int',              // Attribute type (varchar, text, int, decimal...)
        'required'                   => false,              // Is the attribute mandatory?
        'comparable'                 => true,               // Is the attribute comparable? (on frontend).
        'filterable'                 => true,               // Is the attribute filterable? (on frontend, in category view)
        'filterable_in_search'       => true,               // Is the attribute filterable? (on frontend, in search view)
        'used_for_promo_rules'       => true,               // Do we need that attribute for specific promo rules?
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, // Attribute scope
        'is_configurable'            => true,               // Can the attribute be used to create configurable products?
        'is_html_allowed_on_front'   => false,              // Is HTML allowed on frontend?
        'note'                       => '',                 // Note below the input field on admin area
        'searchable'                 => true,               // Is the attribute searchable?
        'sort_order'                 => 100,                // Which position on the admin area form group?
        'unique'                     => false,              // Must attribute values be unique?
        'used_for_sort_by'           => false,              // Can the attribute be used for the 'sort by' select on catalog/search views?
        'used_in_product_listing'    => true,               // Should we flat this attribute?
        'user_defined'               => true,               // Is the attribute user defined? If false the attribute isn't removable. TRUE needed if configurable attribute.
        'visible'                    => true,               // Is the attribute visible? If true the field appears in admin product page.
        'visible_on_front'           => true,               // Is the attribute visible on front?
        'visible_in_advanced_search' => true,               // Is the attribute visible on advanced search?
        'wysiwyg_enabled'            => false,              // Is Wysiwyg enabled? (use `textarea` input if you put that value to true)
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, // Product types
        'option' => array(
            "values" => array(
                0 => 'Size 1',
                1 => 'Size 2',
                2 => 'Size 3'
            )
        )
    ));
    // Add the newly created `size` attribute to attribute set(s)
    $installer->addAttributeToSet(
      Mage_Catalog_Model_Product::ENTITY,   // Entity type
      'Default',                            // Attribute set name
      'General',                            // Attribute set group name
      'csize',                               // Attribute code to add
      100                                   // Position on the attribute set group
    );

    $installer->endSetup();
} catch (Exception $e) {
    Mage::logException($e);
}

?>


<?php
    /*$this->startSetup();
    $this->addAttribute(catalog_product, 'sitewide_featured_product', array(
        'group'         => 'General',
        'input'         => 'select',
        'type'          => 'text',
        'label'         => 'SiteWide Featured Product',
        'backend'       => '',
        'visible'       => true,
        'required'      => false,
        'visible_on_front' => true,
        'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'source' => 'eav/entity_attribute_source_boolean',
        'sort_order'        => 8,
    ));
     
    $this->endSetup();*/

/*$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();
$installer->addAttribute("catalog_product", "price_offer",  array(
                    'group'         => 'Prices', 
                    'type'          => 'int',
                    'attribute_set' =>  'Price',
                    'backend'       => '',
                    'frontend'      => '',
                    'label'         => 'Allow Price Offer',
                    'input'         => 'select',
                    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
                    'backend'    => 'eav/entity_attribute_backend_array',
                    'visible'       => true,
                    'required'      => false,
                    'user_defined'  => true,
                    'default'       => '0',
                    'visible_on_front' => false,
                    'used_in_product_listing' => true,
                    'apply_to' => 'simple,configurable',
                    'sort_order'    => 10,
                    'is_configurable' => 1,
                    'option'     => array (
                        'values' => array(
                            0 => 'No',
                            1 => 'Yes',
                        )
                    ),

    ));

$installer->endSetup(); */ ?>



<?php /*$installer = $this; 

var_dump($installer->getData()); exit;

//$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

$installer->startSetup();

$installer->addAttributeGroup('catalog_product', 'Default', 'Prices', 1000);
$installer->addAttribute('catalog_product', 'custom_price', array(
        'group'             => 'Prices',
        'label'                => 'Apply Custom price',
        'type'                => 'int',
        'input'                => 'boolean',
        'source'               => 'eav/entity_attribute_source_boolean',
        'global'               => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'              => 1,
        'required'             => 1,
        'user_defined'         => 1,
        'searchable'           => 0,
        'filterable'           => 0,
        'comparable'           => 0,
        'visible_on_front'     => 0,
        'visible_in_advanced_search'    => 0,
        'unique'            		=> 0,
        'default'            		=> 0
));

$installer->updateAttribute('catalog_product', 'custom_price', 'is_used_for_promo_rules',1);
$installer->updateAttribute('catalog_product', 'custom_price', 'is_used_for_price_rules',1);
$installer->endSetup(); */

?>





