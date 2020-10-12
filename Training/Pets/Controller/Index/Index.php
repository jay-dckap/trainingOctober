<?php
namespace Training\Pets\Controller\Index;


use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    private $petsFactory;

    private $petsResource;

    public function __construct(
        Context $context,
        \Training\Pets\Model\PetsFactory $petsFactory,
        \Training\Pets\Model\ResourceModel\Pets $petsResource
    )
    {
        $this->petsFactory = $petsFactory;
        $this->petsResource = $petsResource;
        parent::__construct($context);
    }

    public function execute()
    {
        $petsModel = $this->petsFactory->create();
        $this->petsResource->load($petsModel, 1);

        $petsModel->setPetName("Pet AA");

        $this->petsResource->save($petsModel);
        var_dump($petsModel->getData());
        exit;

    }

}
