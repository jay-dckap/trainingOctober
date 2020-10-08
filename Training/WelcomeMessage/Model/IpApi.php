<?php
namespace Training\WelcomeMessage\Model;

use Training\WelcomeMessage\Api\IpApiInterface;

class IpApi implements IpApiInterface
{
    private $clientFactory;

    public function __construct(
        \Magento\Framework\HTTP\ClientInterfaceFactory $clientFactory
    )
    {
        $this->clientFactory = $clientFactory;
    }

    public function lookup($ipAddress)
    {
        $httpClient = $this->clientFactory->create();

        $httpClient->get("http://ip-api.com/json/" . $ipAddress);
        $data = $httpClient->getBody();

        return $data;
    }

}
