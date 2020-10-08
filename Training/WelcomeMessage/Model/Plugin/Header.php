<?php
namespace Training\WelcomeMessage\Model\Plugin;

class Header
{
    public function afterGetWelcome(\Magento\Theme\Block\Html\Header $subject, $result)
    {
        return "From Plugin - welcome";
    }
}
