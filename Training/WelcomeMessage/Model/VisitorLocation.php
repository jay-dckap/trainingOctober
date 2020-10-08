<?php
namespace Training\WelcomeMessage\Model;

use Training\WelcomeMessage\Api\VisitorLocationInterface;

class VisitorLocation implements VisitorLocationInterface
{
    private $remoteAddress;

    private $ipApi;

    private $serializer;

    private $locationDTOFactory;

    public function __construct(
        \Magento\Framework\HTTP\PhpEnvironment\RemoteAddress $remoteAddress,
        \Training\WelcomeMessage\Api\IpApiInterface $ipApi,
        \Magento\Framework\Serialize\SerializerInterface $serializer,
        \Training\WelcomeMessage\Api\Data\LocationDTOInterfaceFactory $locationDTOFactory
    )
    {
        $this->remoteAddress = $remoteAddress;
        $this->serializer = $serializer;
        $this->ipApi = $ipApi;
        $this->locationDTOFactory = $locationDTOFactory;
    }

    public function getAreas()
    {
        $data = $this->ipApi->lookup($this->getAddress());
        $jsonData = $this->serializer->unserialize($data);

        return $this->locationDTOFactory->create([
            "country" => $jsonData["countryCode"],
            "region" => $jsonData["region"]
        ]);
    }

    private function getAddress()
    {
        $address = $this->remoteAddress->getRemoteAddress();
        return $address === "192.168.144.1" ? "8.8.8.8" : $address;
    }

}
