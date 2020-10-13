<?php
namespace Training\PetsAdmin\Model\Backend;

class Jpg extends \Magento\Config\Model\Config\Backend\File
{
    protected function _getAllowedExtensions()
    {
        return ["jpg", "jpeg"];
    }

}
