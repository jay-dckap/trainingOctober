<?php
namespace Training\Pets\Controller\Index;

use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    private $petsFactory;

    private $petsResource;

    private $collectionFactory;

    public function __construct(
        Context $context,
        \Training\Pets\Model\PetsFactory $petsFactory,
        \Training\Pets\Model\ResourceModel\Pets $petsResource,
        \Training\Pets\Model\ResourceModel\Pets\CollectionFactory $collectionFactory
    ) {
        $this->petsFactory = $petsFactory;
        $this->petsResource = $petsResource;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam("id");

        if ($id) {
            // Loading the data
            $petsModel = $this->petsFactory->create();
            $this->petsResource->load($petsModel, $id);

            // Saving the data
//            $petsModel->setPetName("Pet AA");
//            $this->petsResource->save($petsModel);
            var_dump($petsModel->getData());
        } else {
            $collection = $this->collectionFactory->create();
            $collection->addFieldToFilter("pet_type", ["eq" => "Cat"]);
            foreach ($collection as $petsModel) {
                var_dump($petsModel->getPetName());
                var_dump($petsModel->getCustomerName());
            }
        }

        exit;
    }
}
