<?php
namespace Training\HelloWorld\Block;

class Footer extends \Magento\Theme\Block\Html\Footer
{
    public function getCopyright()
    {
        return parent::getCopyright() . " - Hello World";
    }

}
