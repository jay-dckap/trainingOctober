<?php
namespace Training\ActionClasses\Controller\Type;


use Magento\Framework\App\Action\Context;

class Raw extends \Magento\Framework\App\Action\Action
{
    private $rawFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\RawFactory $rawFactory
    )
    {
        $this->rawFactory = $rawFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $raw = $this->rawFactory->create();
        $raw->setContents("Hello World");
        return $raw;
    }

}
