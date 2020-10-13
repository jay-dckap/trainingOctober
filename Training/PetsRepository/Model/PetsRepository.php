<?php
namespace Training\PetsRepository\Model;

use Training\PetsRepository\Api\PetsRepositoryInterface;
use Training\PetsRepository\Api\PetsSearchResultsInterface;

class PetsRepository implements PetsRepositoryInterface
{
    private $petsModelFactory;

    private $petsResource;

    private $collectionFactory;

    private $petsDTOFactory;

    private $dataObjectHelper;

    private $searchResultsFactory;

    private $collectionProcessor;

    public function __construct(
        \Training\Pets\Model\PetsFactory $petsModelFactory,
        \Training\Pets\Model\ResourceModel\Pets $petsResource,
        \Training\Pets\Model\ResourceModel\Pets\CollectionFactory $collectionFactory,
        \Training\PetsRepository\Api\Data\PetsDTOInterfaceFactory $petsDTOFactory,
        \Training\PetsRepository\Api\PetsSearchResultsInterfaceFactory $searchResultsFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
        \Magento\Framework\Api\SearchCriteria\CollectionProcessor $collectionProcessor
    )
    {
        $this->petsModelFactory = $petsModelFactory;
        $this->petsResource = $petsResource;
        $this->collectionFactory = $collectionFactory;
        $this->petsDTOFactory = $petsDTOFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function getById($id)
    {
        $petsModel = $this->petsModelFactory->create();
        $this->petsResource->load($petsModel, $id);

        return $this->modeltoDTO($petsModel);
    }

    public function save($pets)
    {
        $petsModel = $this->petsModelFactory->create();
        if ($pets->getPetId()) {
            $this->petsResource->load($petsModel, $pets->getPetId());
        }

        $petsModel->setPetName($pets->getPetName());
        $petsModel->setPetType($pets->getPetType());
        $petsModel->setCustomerId($pets->getCustomerId());

        $this->petsResource->save($petsModel);
        $pets->setPetId($petsModel->getPetId());

        return $pets;
    }

    public function deleteById($id)
    {
        $petsModel = $this->petsModelFactory->create();
        $this->petsResource->load($petsModel, $id);

        try {
            $this->petsResource->delete($petsModel);
            $retVal = true;
        } catch (\Exception $e) {
            $retVal = false;
        }

        return $retVal;
    }

    public function getList($searchCriteria)
    {
        /** @var \Training\PetsRepository\Api\PetsSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();

        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $items = [];
        foreach ($collection as $petsModel) {
            $items[] = $this->modeltoDTO($petsModel);
        }

        $searchResults->setItems($items);
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    private function modeltoDTO($model)
    {
        $petsDTO = $this->petsDTOFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $petsDTO,
            $model->getData(),
            \Training\PetsRepository\Api\Data\PetsDTOInterface::class
        );

        return $petsDTO;
    }

}
