<?php
namespace Training\WelcomeMessage\Model;

use Training\WelcomeMessage\Api\IpApiInterface;

class IpApiCacher implements IpApiInterface
{
    private $cache;

    private $ipApi;

    public function __construct(
        \Magento\Framework\Config\CacheInterface $cache,
        \Training\WelcomeMessage\Api\IpApiInterface $ipApi
    )
    {
        $this->cache = $cache;
        $this->ipApi = $ipApi;
    }

    public function lookup($ipAddress)
    {
        $identifier = "training_" . $ipAddress;
        $cachedData = $this->cache->load($identifier);

        if($cachedData) {
            echo "HIT";
            $data = $cachedData;
        } else {
            echo "MISS";
            $data = $this->ipApi->lookup($ipAddress);
            $this->cache->save($data, $identifier);
        }

        return $data;
    }

}
