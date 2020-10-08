<?php
namespace Training\UserExperience\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Custom implements ArgumentInterface
{
    private $visitorLocation;

    public function __construct(
        \Training\WelcomeMessage\Api\VisitorLocationInterface $visitorLocation
    )
    {
        $this->visitorLocation = $visitorLocation;
    }

    public function getMessage()
    {
        $areas = $this->visitorLocation->getAreas();
        return "FROM VM: Welcome from " . $areas->getCountry() . " - " . $areas->getRegion();
    }
}
