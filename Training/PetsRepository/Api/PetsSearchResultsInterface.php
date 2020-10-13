<?php
namespace Training\PetsRepository\Api;

interface PetsSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get items list.
     *
     * @return \Training\PetsRepository\Api\Data\PetsDTOInterface[]
     */
    public function getItems();

    /**
     * Set items list.
     *
     * @param \Training\PetsRepository\Api\Data\PetsDTOInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
