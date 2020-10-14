<?php
namespace Training\Clothes\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class ClothingMaterial implements DataPatchInterface
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

        $eavSetup = $this->eavSetupFactory->create(["setup" => $this->setup]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            "clothing_material",
            [
                "scope" => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                "type" => "int",
                "input" => "select",
                "label" => "Clothing Material",
                "required" => false,
                "visible" => true,
                "source" => \Training\Clothes\Model\Attribute\Source\Materials::class,
                "backend" => \Training\Clothes\Model\Attribute\Backend\Tracker::class,
                "group" => "general",
                "visible_on_front" => true,
                "used_in_product_listing" => true,
                "sort_order" => 50,
                "user_defined" => true,
                "apply_to"=> "simple",
                "is_filterable" => true,
                "is_searchable" => true
            ]
        );

        $this->setup->endSetup();
    }

}
