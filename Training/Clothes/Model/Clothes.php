<?php
namespace Training\Clothes\Model;

use Magento\Framework\Model\AbstractModel;

class Clothes extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Training\Clothes\Model\ResourceModel\Clothes::class);
    }
}
