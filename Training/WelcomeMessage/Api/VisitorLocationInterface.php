<?php
namespace Training\WelcomeMessage\Api;

interface VisitorLocationInterface
{
    /**
     * @return \Training\WelcomeMessage\Api\Data\LocationDTOInterface
     */
    public function getAreas();
}
