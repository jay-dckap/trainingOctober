<?php
namespace Training\Clothes\Model\Attribute\Source;

class Materials extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    private $collectionFactory;

    public function __construct(
        \Training\Clothes\Model\ResourceModel\Clothes\CollectionFactory $collectionFactory
    )
    {
        $this->collectionFactory = $collectionFactory;
    }

    public function getAllOptions()
    {
        if (!$this->_options) {

            $collection = $this->collectionFactory->create();
            foreach ($collection as $item) {
                $this->_options[] = ['label' => $item->getMaterial(), 'value' => $item->getMaterialId()];
            }
        }
        return $this->_options;
    }

}
