<?php
namespace Training\ActionLogger\Plugin;

class Logger
{
    private $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }

    public function afterDispatch(\Magento\Framework\App\Action\Action $subject, $result)
    {
        $this->logger->info("from plugin");
        $this->logger->info($subject->getRequest()->getFullActionName());

        return $result;
    }
}
