<?php
namespace Training\WelcomeMessage\Controller\Index;


use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    private $visitorLocation;

    public function __construct(
        Context $context,
        \Training\WelcomeMessage\Api\VisitorLocationInterface $visitorLocation
    )
    {
        $this->visitorLocation = $visitorLocation;
        parent::__construct($context);
    }

    public function execute()
    {
        $areas = $this->visitorLocation->getAreas();
        var_dump($areas);
        exit;
    }

}
