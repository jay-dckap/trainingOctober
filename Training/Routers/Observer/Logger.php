<?php
namespace Training\Routers\Observer;

use Magento\Framework\App\RouterListInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Logger implements ObserverInterface
{
    private $routerList;

    private $logger;

    public function __construct(
        RouterListInterface $routerList,
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->routerList = $routerList;
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $this->logger->info("Logging routers");
        foreach ($this->routerList as $router)
        {
            $this->logger->info(get_class($router));
        }
    }

}
