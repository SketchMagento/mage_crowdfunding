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
/*--------------------------------------------------------------------------------
The current attributes for a project
project_uid
project_name //=>product name
project_description //=>product description, product short description
project_pictures //=>product gallery images
project_location
funding_status
funds_total
funding_req_crowd  //
funding_available  // addition of these 2 attributes will give total funding
volunteer_status   
volunteer_total
volunteers_required  //
volunteers_available // addition of these 2 attributes will give total volunteers
contributors_funds
contributors_volunteer
start_date			
expiration_date
like_counts
project_category
project_owner
------------------------------
funding_status_money
funding_status_volunteer
number_of_contributors
days_left
------------------------------
using cminds
available_for_supplier => yes
-----------------------------------------------------------------------------------*/
?>


<?php
/**
 * Eav Variables Installer
 */
try {
    	/* @var $installer Mage_Catalog_Model_Resource_Setup */
    	$installer = $this;
    	$installer->startSetup(); 
	$entity = 'catalog_product';
	$entityTypeID = Mage::getSingleton('eav/config')->getEntityType(Mage_Catalog_Model_Product::ENTITY)->getId();

	//add attribute group 
	$installer->addAttributeGroup('catalog_product', 'Default', 'Project Attributes', 1001); 

	//create attribute if not exist
	$code = 'project_uid';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'project_uid', array(
        'label'                      => 'Project UID',             
        'input'                      => 'text',            //Input type (text, textarea, select...)
        'type'                       => 'varchar',         // Attribute type (varchar, text, int, decimal...)
        'required'                   => true,             
        'comparable'                 => false,             
        'filterable'                 => false,             
        'filterable_in_search'       => false,             
        'used_for_promo_rules'       => true,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,             
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,              
        'sort_order'                 => 101,               
        'unique'                     => true,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,               
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,  
      	 'Default',                            
      	 'Project Attributes',                            
      	 'project_uid',                        
      	 101                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 101);
	}


	//create attribute if not exist
	$code = 'project_location';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'project_location', array(
        'label'                      => 'Project Location',             
        'input'                      => 'text',           
        'type'                       => 'varchar',          
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => true,               
        'filterable_in_search'       => true,               
        'used_for_promo_rules'       => false,              
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,             
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => true,              
        'sort_order'                 => 102,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,             
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                           
      	 'Project Attributes',                          
      	 'project_location',                
      	 102                               
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 102);
	}


	//create attribute if not exist
	$code = 'funding_status';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'funding_status', array(
        'label'                      => 'Funding Status',   
        'input'                      => 'select',           
        'type'                       => 'varchar',         
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => true,               
        'filterable_in_search'       => true,              
        'used_for_promo_rules'       => false,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,              
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                
        'searchable'                 => false,               
        'sort_order'                 => 103,                
        'unique'                     => false,             
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,               
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE,
        'option' 		     => array(
            				"values" => array(
                				notfunded => 'Not Funded',
                				partiallyfunded => 'Partially Funded',
                				mostlyfunded => 'Mostly Funded',
						fullyfunded => 'Fully Funded'   ))
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                           
      	 'funding_status',                
      	 103                                  
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 103);
	}


	//create attribute if not exist
	$code = 'funding_req_crowd';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'funding_req_crowd', array(
        'label'                      => 'Funding Required From Crowd',      
        'input'                      => 'select',           
        'type'                       => 'int',             
        'required'                   => true,             
        'comparable'                 => false,              
        'filterable'                 => true,               
        'filterable_in_search'       => true,               
        'used_for_promo_rules'       => true,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,               
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                
        'searchable'                 => false,              
        'sort_order'                 => 104,                
        'unique'                     => false,             
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,               
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE,  
	'option'		     =>array(
				   	"values" => array(
						0 => No,
						1 => Yes  ))
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                           
      	 'funding_req_crowd',                
      	 104                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 104);
	}


	//create attribute if not exist
	$code = 'funding_available';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'funding_available', array(
        'label'                      => 'Funding Available',           
        'input'                      => 'select',           
        'type'                       => 'int',              
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => true,               
        'filterable_in_search'       => true,              
        'used_for_promo_rules'       => false,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,               
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,              
        'sort_order'                 => 105,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE,
	'option'		     =>array(
				   	"values" => array(
						0 => No,
						1 => Yes  ))
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                            
      	 'funding_available',                
      	 105                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 105);
	}


	//create attribute if not exist
	$code = 'volunteer_status';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'volunteer_status', array(
        'label'                      => 'Volunteer Status',     
        'input'                      => 'select',           
        'type'                       => 'int',              
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => true,               
        'filterable_in_search'       => true,               
        'used_for_promo_rules'       => true,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,               
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,               
        'sort_order'                 => 106,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
	'option'		     =>array(
				   	"values" => array(
						volunteersreq => 'Volunteers Required',
						volunteersnotreq => 'Volunteers Not Required' ))
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                           
      	 'volunteer_status',                
      	 106                                
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 106);
	}

	//create attribute if not exist
	$code = 'volunteer_required';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'volunteer_required', array(
        'label'                      => 'Volunteer Required',            
        'input'                      => 'select',           
        'type'                       => 'int',              
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => true,               
        'filterable_in_search'       => true,               
        'used_for_promo_rules'       => true,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,               
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,              
        'sort_order'                 => 107,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
	'option'		     =>array(
				   	"values" => array(
						0 => No,
						1 => Yes ))
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                           
      	 'volunteer_required',                
      	 107                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 107);
	}


	//create attribute if not exist
	$code = 'volunteer_available';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'volunteer_available', array(
        'label'                      => 'Volunteer Available',      
        'input'                      => 'text',           
        'type'                       => 'varchar',           
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => false,               
        'filterable_in_search'       => false,               
        'used_for_promo_rules'       => false,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,               
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,              
        'sort_order'                 => 108,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                            
      	 'volunteer_available',                
      	 108                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 108);
	}


	//create attribute if not exist
	$code = 'contributors_funds';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'contributors_funds', array(
        'label'                      => 'Contributor Funds',             
        'input'                      => 'text',           
        'type'                       => 'varchar',         
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => false,               
        'filterable_in_search'       => false,               
        'used_for_promo_rules'       => false,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,               
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,              
        'sort_order'                 => 109,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,             
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,             
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                            
      	 'contributors_funds',                
      	 109                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 109);
	}

	//create attribute if not exist
	$code = 'contributors_volunteer';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'contributors_volunteer', array(
        'label'                      => 'Volunteers For Contributions',             
        'input'                      => 'text',           
        'type'                       => 'varchar',          
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => false,               
        'filterable_in_search'       => false,               
        'used_for_promo_rules'       => false,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,              
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,              
        'sort_order'                 => 110,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                            
      	 'contributors_volunteer',             
      	 110                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 110);
	}

	//create attribute if not exist
	$code = 'like_counts';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'like_counts', array(
        'label'                      => 'Like Counts',       
        'input'                      => 'text',           
        'type'                       => 'varchar',         
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => false,               
        'filterable_in_search'       => false,               
        'used_for_promo_rules'       => false,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,              
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,              
        'sort_order'                 => 111,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,             
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                           
      	 'like_counts',                
      	 111                                  
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 111);
	}

	//create attribute if not exist
	$code = 'project_owner';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'project_owner', array(
        'label'                      => 'Project Owner',        
        'input'                      => 'text',           
        'type'                       => 'varchar',         
        'required'                   => true,             
        'comparable'                 => false,              
        'filterable'                 => false,              
        'filterable_in_search'       => false,              
        'used_for_promo_rules'       => false,              
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,             
        'is_html_allowed_on_front'   => false,             
        'note'                       => '',                
        'searchable'                 => false,              
        'sort_order'                 => 112,                
        'unique'                     => false,             
        'used_for_sort_by'           => false,             
        'used_in_product_listing'    => true,              
        'user_defined'               => true,              
        'visible'                    => true,              
        'visible_on_front'           => true,              
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,             
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                            
      	 'project_owner',                
      	 112                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 112);
	}

	//create attribute if not exist
	$code = 'funds_total';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'funds_total', array(
        'label'                      => 'Total Funds',     
        'input'                      => 'text',           
        'type'                       => 'varchar',          
        'required'                   => true,              
        'comparable'                 => false,              
        'filterable'                 => false,              
        'filterable_in_search'       => false,              
        'used_for_promo_rules'       => false,              
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,             
        'is_html_allowed_on_front'   => false,             
        'note'                       => '',                
        'searchable'                 => false,             
        'sort_order'                 => 113,               
        'unique'                     => false,             
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                           
      	 'funds_total',                
      	 113                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 113);
	}

	//create attribute if not exist
	$code = 'volunteer_total';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'volunteer_total', array(
        'label'                      => 'Total Volunteers',    
        'input'                      => 'text',           
        'type'                       => 'varchar',         
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => false,               
        'filterable_in_search'       => false,               
        'used_for_promo_rules'       => false,              
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,               
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,              
        'sort_order'                 => 114,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,              
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                            
      	 'volunteer_total',                
      	 114                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 114);
	}

	//create attribute if not exist
	$code = 'start_date';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'start_date', array(
        'label'                      => 'Start Date',            
        'input'                      => 'date',           
        'type'                       => 'datetime',          
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => false,               
        'filterable_in_search'       => false,               
        'used_for_promo_rules'       => false,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,               
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,               
        'sort_order'                 => 115,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                           
      	 'start_date',                
      	 115                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 115);
	}

	//create attribute if not exist
	$code = 'expiration_date';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'expiration_date', array(
        'label'                      => 'Expiration Date',            
        'input'                      => 'date',           
        'type'                       => 'datetime',          
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => false,               
        'filterable_in_search'       => false,               
        'used_for_promo_rules'       => false,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,              
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,              
        'sort_order'                 => 116,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                            
      	 'expiration_date',                
      	 116                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 116);
	}

	//create attribute if not exist
	$code = 'money_funding_status';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'money_funding_status', array(
        'label'                      => 'Funding Status: Money',            
        'input'                      => 'text',           
        'type'                       => 'varchar',          
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => false,               
        'filterable_in_search'       => false,               
        'used_for_promo_rules'       => false,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,              
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,              
        'sort_order'                 => 117,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,              
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                            
      	 'money_funding_status',               
      	 117                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 117);
	}

	//create attribute if not exist
	$code = 'volunteer_funding_status';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'volunteer_funding_status', array(
        'label'                      => 'Volunteer Funding Status',             
        'input'                      => 'text',           
        'type'                       => 'varchar',          
        'required'                   => true,              
        'comparable'                 => false,               
        'filterable'                 => false,               
        'filterable_in_search'       => false,               
        'used_for_promo_rules'       => false,              
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,               
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,               
        'sort_order'                 => 118,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,               
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                            
      	 'volunteer_funding_status',            
      	 118                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 118);
	}

	//create attribute if not exist
	$code = 'days_left';
        $attrib = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code);
	if(!$attrib->getID()){
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'days_left', array(
        'label'                      => 'Days Left',      
        'input'                      => 'text',           
        'type'                       => 'varchar',         
        'required'                   => true,              
        'comparable'                 => false,              
        'filterable'                 => false,               
        'filterable_in_search'       => false,               
        'used_for_promo_rules'       => false,               
        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL, 
        'is_configurable'            => false,              
        'is_html_allowed_on_front'   => false,              
        'note'                       => '',                 
        'searchable'                 => false,              
        'sort_order'                 => 119,                
        'unique'                     => false,              
        'used_for_sort_by'           => false,              
        'used_in_product_listing'    => true,               
        'user_defined'               => true,               
        'visible'                    => true,               
        'visible_on_front'           => true,               
        'visible_in_advanced_search' => false,               
        'wysiwyg_enabled'            => false,              
        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE, 
    	));
    	// Add the newly created attribute to attribute set(s)
    	$installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY,   
      	 'Default',                            
      	 'Project Attributes',                            
      	 'days_left',                
      	 119                                   
    	);
        $attribID = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity,$code)->getID();
	$installer->updateAttribute($entityTypeID, $attribID, 'available_for_supplier', 1, 119);
	}

    $installer->endSetup();
	

} catch (Exception $e) {
    Mage::logException($e);
}

?>

