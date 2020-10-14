<?php
namespace Training\LoyalCustomers\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Tracker implements ObserverInterface
{
    private $orderRepository;

    private $searchCriteriaBuilder;

    private $customerRepository;

    public function __construct(
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
    )
    {
        $this->orderRepository = $orderRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->customerRepository = $customerRepository;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $customerId = $order->getCustomerId();

        $searchCriteria = $this->searchCriteriaBuilder->addFilter("customer_id", $customerId)->create();
        $searchResults = $this->orderRepository->getList($searchCriteria);

        if ($searchResults->getTotalCount() > 1) {
            $customer = $this->customerRepository->getById($customerId);
            $customer->setCustomAttribute("loyal_customer", 1);
            $this->customerRepository->save($customer);
        }

    }

}
