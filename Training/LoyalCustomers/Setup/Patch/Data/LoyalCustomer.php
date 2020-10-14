<?php
namespace Training\LoyalCustomers\Setup\Patch\Data;

use Magento\Customer\Model\ResourceModel\Attribute;
use Magento\Eav\Model\Config;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class LoyalCustomer implements DataPatchInterface
{
    private $setup;

    private $eavSetupFactory;

    private $eavConfig;

    private $attributeResource;

    public function __construct(
        ModuleDataSetupInterface $setup,
        \Magento\Eav\Model\Config $eavConfig,
        \Magento\Customer\Model\ResourceModel\Attribute $attributeResource,
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
    )
    {
        $this->setup = $setup;
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
        $this->attributeResource = $attributeResource;
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

        $eavSetup = $this->eavSetupFactory->create(["setup" => $this->setup]);
        $eavSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            "loyal_customer",
            [
                "type" => "int",
                "input" => "select",
                "source" => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                "label" => "Loyal Customer",
                "required" => false,
                "system" => 0,
                "default" => 0,
                "user_defined" => true,
                "group" => "General"
            ]
        );

        $attribute = $this->eavConfig->getAttribute(\Magento\Customer\Model\Customer::ENTITY, "loyal_customer");
        $attribute->setData("used_in_forms", ["adminhtml_customer"]);
        $this->attributeResource->save($attribute);

        $this->setup->endSetup();
    }

}
