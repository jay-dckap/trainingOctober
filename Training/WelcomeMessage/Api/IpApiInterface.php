<?php
namespace Training\WelcomeMessage\Api;

interface IpApiInterface
{
    /**
     * @param string $ipAddress
     * @return mixed
     */
    public function lookup($ipAddress);
}
