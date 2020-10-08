<?php
namespace Training\ActionClasses\Controller\Type;

use Magento\Framework\App\Action\Context;

class Forward extends \Magento\Framework\App\Action\Action
{
    private $forwardFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory
    )
    {
        $this->forwardFactory = $forwardFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $forward = $this->forwardFactory->create();
        $forward->setModule("catalog")->setController("product")->setParams(["id"=>1])->forward("view");
        return $forward;
    }

}
