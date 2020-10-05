<?php
namespace Training\WelcomeMessage\Model;

use Training\WelcomeMessage\Api\VisitorLocationInterface;

class VisitorLocation implements VisitorLocationInterface
{
    private $remoteAddress;

    public function __construct(
        \Magento\Framework\HTTP\PhpEnvironment\RemoteAddress $remoteAddress
    )
    {
        $this->remoteAddress = $remoteAddress;
    }

    public function getAreas()
    {
        $address = $this->remoteAddress->getRemoteAddress();
        return $address;
    }

}
