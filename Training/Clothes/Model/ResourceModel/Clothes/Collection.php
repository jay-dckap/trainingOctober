<?php
namespace Training\Clothes\Model\ResourceModel\Clothes;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Training\Clothes\Model\Clothes::class,
            \Training\Clothes\Model\ResourceModel\Clothes::class
        );
    }
}
