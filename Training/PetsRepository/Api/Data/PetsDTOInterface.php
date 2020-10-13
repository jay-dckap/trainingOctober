<?php
namespace Training\PetsRepository\Api\Data;

interface PetsDTOInterface
{
    /**
     * @return int
     */
    public function getPetId();

    /**
     * @return string
     */
    public function getPetName();

    /**
     * @return int
     */
    public function getCustomerId();

    /**
     * @return string
     */
    public function getPetType();

    /**
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * @return mixed
     */
    public function getUpdatedAt();

    /**
     * @param int $id
     * @return \Training\PetsRepository\Api\Data\PetsDTOInterface
     */
    public function setPetId($id);

    /**
     * @param string $name
     * @return \Training\PetsRepository\Api\Data\PetsDTOInterface
     */
    public function setPetName($name);

    /**
     * @param int $customerId
     * @return \Training\PetsRepository\Api\Data\PetsDTOInterface
     */
    public function setCustomerId($customerId);

    /**
     * @param string $type
     * @return \Training\PetsRepository\Api\Data\PetsDTOInterface
     */
    public function setPetType($type);
}
