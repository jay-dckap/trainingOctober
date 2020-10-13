<?php
namespace Training\Attributes\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class RecyclableAttribute implements DataPatchInterface
{
    private $setup;

    private $eavSetupFactory;

    public function __construct(
        ModuleDataSetupInterface $setup,
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
    )
    {
        $this->setup = $setup;
        $this->eavSetupFactory = $eavSetupFactory;
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

        /** @var \Magento\Eav\Setup\EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(["setup" => $this->setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            "is_recyclable",
            [
                "scope" => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                "type" => "int",
                "input" => "select",
                "label" => "Is Recyclable",
                "required" => true,
                "visible" => true,
                "source" => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                "group" => "general",
                "visible_on_front" => true,
                "used_in_product_listing" => true,
                "sort_order" => 50,
                "user_defined" => true,
                "apply_to"=> "simple"
            ]
        );

        $this->setup->endSetup();
    }

}
