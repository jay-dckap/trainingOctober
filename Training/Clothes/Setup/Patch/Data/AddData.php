<?php
namespace Training\Clothes\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class AddData implements DataPatchInterface
{
    private $setup;

    public function __construct(
        ModuleDataSetupInterface $setup
    )
    {
        $this->setup = $setup;
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $this->setup->startSetup();

        $data = [
            ["material" => "cotton", "count" => 0],
            ["material" => "wool", "count" => 0],
            ["material" => "linen", "count" => 0],
            ["material" => "viscose", "count" => 0]
        ];
        $this->setup->getConnection()->insertMultiple($this->setup->getTable("clothing_materials"), $data);

        $this->setup->endSetup();
    }

}
