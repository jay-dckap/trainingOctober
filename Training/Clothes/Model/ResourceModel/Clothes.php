<?php
namespace Training\Clothes\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Clothes extends AbstractDb
{
    protected function _construct()
    {
        $this->_init("clothing_materials", "material_id");
    }

}
