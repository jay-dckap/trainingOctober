<?php
namespace Training\UserExperience\Controller\Index;


use Magento\Framework\App\Action\Context;

Class Checkout extends \Magento\Framework\App\Action\Action
{
    private $pageFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }

}
