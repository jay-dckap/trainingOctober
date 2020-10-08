<?php
namespace Training\UserExperience\Controller\Index;


use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    private $pageFactory;

    private $rawFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Controller\Result\RawFactory $rawFactory
    )
    {
        $this->pageFactory = $pageFactory;
        $this->rawFactory = $rawFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $page = $this->pageFactory->create();
        $block = $page->getLayout()->createBlock(\Magento\Framework\View\Element\Text::class, "custom.text.block");
        $block->setText("hello world");

        $raw = $this->rawFactory->create();
        $raw->setContents($block->toHtml());
        return $raw;
    }

}
