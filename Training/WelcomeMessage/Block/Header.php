<?php
namespace Training\WelcomeMessage\Block;


class Header extends \Magento\Theme\Block\Html\Header
{
    private $visitorLocation;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Training\WelcomeMessage\Api\VisitorLocationInterface $visitorLocation,
        array $data = [])
    {
        $this->visitorLocation = $visitorLocation;
        parent::__construct($context, $data);
    }

    public function getWelcome()
    {
        $areas = $this->visitorLocation->getAreas();
        return "Welcome from " . $areas->getCountry() . " - " . $areas->getRegion();
    }

}
