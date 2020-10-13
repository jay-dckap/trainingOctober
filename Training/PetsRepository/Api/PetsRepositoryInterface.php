<?php
namespace Training\PetsRepository\Api;

interface PetsRepositoryInterface
{
    /**
     * @param int $id
     * @return \Training\PetsRepository\Api\Data\PetsDTOInterface
     */
    public function getById($id);

    /**
     * @param \Training\PetsRepository\Api\Data\PetsDTOInterface $pets
     * @return \Training\PetsRepository\Api\Data\PetsDTOInterface
     */
    public function save($pets);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById($id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Training\PetsRepository\Api\PetsSearchResultsInterface
     */
    public function getList($searchCriteria);
}
