<?php
namespace Training\WelcomeMessage\Api\Data;


interface LocationDTOInterface
{
    /**
     * @return string
     */
    public function getCountry();

    /**
     * @return string
     */
    public function getRegion();
}
