<?php
/**
 * Camilooframework
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Camilooframework to newer
 * versions in the future. If you wish to customize Camilooframework for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Core
 * @copyright   Copyright (c) 2011 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * Design package collection
 *
 * @category    Mage
 * @package     Mage_Core
 * @author      Camilooframework Core Team <core@magentocommerce.com>
 */
class Mage_Core_Model_Resource_Design_Package_Collection extends Varien_Object
{
    /**
     * Load design package collection
     *
     * @return Mage_Core_Model_Resource_Design_Package_Collection
     */
    public function load()
    {
        $packages = $this->getData('packages');
        if (is_null($packages)) {
            $packages = Mage::getModel('core/design_package')->getPackageList();
            $this->setData('packages', $packages);
        }

        return $this;
    }

    /**
     * Convert to option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = array();
        $packages = $this->getData('packages');
        foreach ($packages as $package) {
            $options[] = array('value' => $package, 'label' => $package);
        }
        array_unshift($options, array('value' => '', 'label' => ''));

        return $options;
    }
}
