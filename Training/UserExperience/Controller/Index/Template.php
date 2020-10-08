<?php
namespace Training\UserExperience\Controller\Index;


use Magento\Framework\App\Action\Context;

class Template extends \Magento\Framework\App\Action\Action
{
    private $pageFactory;

    private $rawFactory;

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
        $page = $this->pageFactory->create();
        $block = $page->getLayout()->createBlock(\Magento\Framework\View\Element\Template::class, "custom.template.block");
        $block->setTemplate("Training_UserExperience::hello.phtml");

        print_r($block->toHtml());
        exit;
    }

}
