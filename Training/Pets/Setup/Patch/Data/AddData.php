<?php
namespace Training\Pets\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddData implements DataPatchInterface
{
    private $setup;

    public function __construct(ModuleDataSetupInterface $setup)
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
            ["pet_name" => "Pet A", "customer_id" => 1, "mobile_number" => "12345"],
            ["pet_name" => "Pet B", "customer_id" => 1, "mobile_number" => "12345"],
            ["pet_name" => "Pet C", "customer_id" => 1, "mobile_number" => "12345", "pet_type" => "Dog"],
            ["pet_name" => "Pet D", "customer_id" => 1, "mobile_number" => "12345"],
            ["pet_name" => "Pet E", "customer_id" => 1, "mobile_number" => "12345", "pet_type" => "Dog"]
        ];

        $tableName = $this->setup->getTable("training_pets");
        $this->setup->getConnection()->insertMultiple($tableName, $data);

        $this->setup->endSetup();
    }

}
