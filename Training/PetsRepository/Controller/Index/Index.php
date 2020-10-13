<?php

namespace Training\PetsRepository\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Training\PetsRepository\Api\PetsRepositoryInterface;

class Index extends Action
{
    private $petsRepository;

    private $petsDTOFactory;

    private $searchCriteriaBuilder;

    public function __construct(
        Context $context,
        PetsRepositoryInterface $petsRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Training\PetsRepository\Api\Data\PetsDTOInterfaceFactory $petsDTOFactory
    ) {
        $this->petsRepository = $petsRepository;
        $this->petsDTOFactory = $petsDTOFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;

        parent::__construct($context);
    }

    public function execute()
    {
//        Read
//        $petsDTO = $this->petsRepository->getById(1);
//        var_dump(get_class($petsDTO));
//        var_dump($petsDTO->getPetName());

//        Update
//        $petsDTO->setPetName($petsDTO->getPetName() . "New");
//        $this->petsRepository->save($petsDTO);

//        Create
//        $petsDTO = $this->petsDTOFactory->create();
//        $petsDTO->setPetName("Pet X")->setCustomerId(1)->setPetType("Dog");
//        $this->petsRepository->save($petsDTO);
//        var_dump($petsDTO->getPetName());

//        Delete
//        $status = $this->petsRepository->deleteById(5);
//        print_r($status);

        $searchCriteria = $this->searchCriteriaBuilder->addFilter("pet_type", "Dog")->create();
        $searchResults = $this->petsRepository->getList($searchCriteria);
        foreach ($searchResults->getItems() as $item) {
            print_r($item->getPetName());
        }

        exit;
    }
}
