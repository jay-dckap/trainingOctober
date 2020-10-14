<?php
namespace Training\Clothes\Model\Attribute\Backend;

class Tracker extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    private $clothesFactory;

    private $clothesResource;

    public function __construct(
        \Training\Clothes\Model\ClothesFactory $clothesFactory,
        \Training\Clothes\Model\ResourceModel\Clothes $clothesResource
    )
    {
        $this->clothesResource = $clothesResource;
        $this->clothesFactory = $clothesFactory;
    }

    public function beforeSave($object)
    {
        $attrCode = $this->getAttribute()->getAttributeCode();

        $newMaterialId = $object->getData($attrCode);
        $newModel = $this->clothesFactory->create();
        $this->clothesResource->load($newModel, $newMaterialId);
        $newModel->setCount($newModel->getCount() + 1);
        $this->clothesResource->save($newModel);

        $oldMaterialId = $object->getOrigData($attrCode);
        $oldModel = $this->clothesFactory->create();
        $this->clothesResource->load($oldModel, $oldMaterialId);
        if ($oldModel->getCount()) {
            $oldModel->setCount($oldModel->getCount() - 1);
            $this->clothesResource->save($oldModel);
        }

        return $this;
    }
}
