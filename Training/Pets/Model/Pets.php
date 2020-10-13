<?php
namespace Training\Pets\Model;

use Magento\Framework\Model\AbstractModel;

class Pets extends AbstractModel
{
    private $petsResource;

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Training\Pets\Model\ResourceModel\Pets $petsResource,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = [])
    {
        $this->petsResource = $petsResource;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    protected function _construct()
    {
        $this->_init(\Training\Pets\Model\ResourceModel\Pets::class);
    }

    public function getCustomerName()
    {
        return $this->petsResource->getCustomerName($this->getCustomerId());
    }
}
