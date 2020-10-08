<?php
namespace Training\ActionClasses\Controller\Type;


use Magento\Framework\App\Action\Context;

class Json extends \Magento\Framework\App\Action\Action
{
    private $jsonFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
    )
    {
        $this->jsonFactory = $jsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $json = $this->jsonFactory->create();
        $json->setData([1 => "hello world"]);
        return $json;
    }

}
