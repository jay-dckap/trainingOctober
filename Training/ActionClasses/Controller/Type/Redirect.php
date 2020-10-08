<?php
namespace Training\ActionClasses\Controller\Type;


use Magento\Framework\App\Action\Context;

class Redirect extends \Magento\Framework\App\Action\Action
{
    private $redirectFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory
    )
    {
        $this->redirectFactory = $redirectFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $redirect = $this->redirectFactory->create();

//        $redirect->setUrl("https://www.google.com/");
        $redirect->setPath("catalog/product/view", ["id" => 1]);

        return $redirect;
    }

}
