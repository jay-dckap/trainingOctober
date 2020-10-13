<?php
namespace Training\Repository\Controller\Index;


use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    private $customerRepository;

    public function __construct(
        Context $context,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository
    )
    {
        $this->customerRepository = $customerRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        $customer = $this->customerRepository->getById(1);
        print_r($customer->getFirstname());
        $customer->setFirstname($customer->getFirstname() . "AA");
        $this->customerRepository->save($customer);
        exit;
    }

}
