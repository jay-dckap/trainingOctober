<?php
namespace Training\WelcomeMessage\Model\Data;

use Training\WelcomeMessage\Api\Data\LocationDTOInterface;

class LocationDTO implements LocationDTOInterface
{
    private $country;

    private $region;

    public function __construct($country, $region)
    {
        $this->country = $country;
        $this->region = $region;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getRegion()
    {
        return $this->region;
    }

}
