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





