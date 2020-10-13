<?php
namespace Training\PetsRepository\Model\Data;

use Magento\Framework\Api\AbstractExtensibleObject;
use Training\PetsRepository\Api\Data\PetsDTOInterface;

class PetsDTO extends AbstractExtensibleObject implements PetsDTOInterface
{
    public function getPetId()
    {
        return $this->_get("pet_id");
    }

    public function getPetName()
    {
        return $this->_get("pet_name");
    }

    public function getCustomerId()
    {
        return $this->_get("customer_id");
    }

    public function getPetType()
    {
        return $this->_get("pet_type");
    }

    public function getCreatedAt()
    {
        return $this->_get("created_at");
    }

    public function getUpdatedAt()
    {
        return $this->_get("updated_at");
    }

    public function setPetId($id)
    {
        return $this->setData("pet_id", $id);
    }

    public function setPetName($name)
    {
        return $this->setData("pet_name", $name);
    }

    public function setCustomerId($customerId)
    {
        return $this->setData("customer_id", $customerId);
    }

    public function setPetType($type)
    {
        return $this->setData("pet_type", $type);
    }

}
