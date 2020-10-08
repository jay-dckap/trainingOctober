<?php
namespace Training\ActionLogger\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Logger implements ObserverInterface
{
    private $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $request = $observer->getData("request");

        $this->logger->info("from observer");
        $this->logger->info($request->getFullActionName());
    }

}
