<?php
namespace Training\PetsAdmin\Controller\Adminhtml\Index;


use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;

class Index extends \Magento\Backend\App\Action
{
    private $pageFactory;

    private $scopeConfig;

    private $encryptor;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Encryption\EncryptorInterface $encryptor,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->pageFactory = $pageFactory;
        $this->scopeConfig = $scopeConfig;
        $this->encryptor = $encryptor;
        parent::__construct($context);
    }

    public function execute()
    {

//        print_r($this->scopeConfig->getValue("pets/general/test"));
//        print_r($this->scopeConfig->getValue("pets/general/code"));

        $password = $this->scopeConfig->getValue("pets/general/password");
        print_r($this->encryptor->decrypt($password));


        exit;

//        return $this->pageFactory->create();
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed("Training_PetsAdmin::welcome");
    }

}
