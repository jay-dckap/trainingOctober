<?php
namespace Training\UserExperience\Block;

use Magento\Framework\View\Element\Template;

class Custom extends \Magento\Framework\View\Element\Template
{
    private $visitorLocation;

    public function __construct(
        Template\Context $context,
        \Training\WelcomeMessage\Api\VisitorLocationInterface $visitorLocation,
        array $data = []
    )
    {
        $this->visitorLocation = $visitorLocation;
        parent::__construct($context, $data);
    }

    public function getMessage()
    {
        $areas = $this->visitorLocation->getAreas();
        return "Welcome from " . $areas->getCountry() . " - " . $areas->getRegion();
    }
}
