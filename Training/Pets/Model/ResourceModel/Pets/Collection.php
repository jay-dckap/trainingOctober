<?php
namespace Training\Pets\Model\ResourceModel\Pets;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Training\Pets\Model\Pets::class,
            \Training\Pets\Model\ResourceModel\Pets::class
        );
    }
}
