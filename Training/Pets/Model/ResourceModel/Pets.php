<?php
namespace Training\Pets\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Pets extends AbstractDb
{
    private $customerFactory;

    private $customerResource;

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Model\ResourceModel\Customer $customerResource,
        $connectionName = null)
    {
        $this->customerFactory = $customerFactory;
        $this->customerResource = $customerResource;
        parent::__construct($context, $connectionName);
    }

    protected function _construct()
    {
        $this->_init("training_pets", "pet_id");
    }

    public function getCustomerName($customerId)
    {
        $customerModel = $this->customerFactory->create();
        $this->customerResource->load($customerModel, $customerId);
        return $customerModel->getName();
    }

}
