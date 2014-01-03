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
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_Eav
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * @method \Magento\Eav\Model\Resource\Entity\Store _getResource()
 * @method \Magento\Eav\Model\Resource\Entity\Store getResource()
 * @method int getEntityTypeId()
 * @method \Magento\Eav\Model\Entity\Store setEntityTypeId(int $value)
 * @method int getStoreId()
 * @method \Magento\Eav\Model\Entity\Store setStoreId(int $value)
 * @method string getIncrementPrefix()
 * @method \Magento\Eav\Model\Entity\Store setIncrementPrefix(string $value)
 * @method string getIncrementLastId()
 * @method \Magento\Eav\Model\Entity\Store setIncrementLastId(string $value)
 *
 * @category    Magento
 * @package     Magento_Eav
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Magento\Eav\Model\Entity;

class Store extends \Magento\Core\Model\AbstractModel
{
    /**
     * Resource initialization
     */
    protected function _construct()
    {
        $this->_init('Magento\Eav\Model\Resource\Entity\Store');
    }

    /**
     * Load entity by store
     *
     * @param int $entityTypeId
     * @param int $storeId
     * @return \Magento\Eav\Model\Entity\Store
     */
    public function loadByEntityStore($entityTypeId, $storeId)
    {
        $this->_getResource()->loadByEntityStore($this, $entityTypeId, $storeId);
        return $this;
    }
}