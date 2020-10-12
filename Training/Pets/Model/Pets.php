<?php
namespace Training\Pets\Model;

use Magento\Framework\Model\AbstractModel;

class Pets extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Training\Pets\Model\ResourceModel\Pets::class);
    }
}
