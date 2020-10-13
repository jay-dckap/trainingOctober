<?php
namespace Training\Repository\Controller\Index;


use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\App\Action\Context;

class Products extends \Magento\Framework\App\Action\Action
{
    private $productRepository;

    private $searchCriteriaBuilder;

    private $sortOrderBuilder;

    public function __construct(
        Context $context,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrderBuilder $sortOrderBuilder,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
        parent::__construct($context);
    }

    public function execute()
    {
        $sortOrder = $this->sortOrderBuilder->setField("created_at")->setDescendingDirection()->create();
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter("name", "%hoodie%", "like")
            ->setPageSize(20)
            ->addSortOrder($sortOrder)
            ->create();
        $searchResults = $this->productRepository->getList($searchCriteria);
        var_dump($searchResults->getTotalCount());

        foreach ($searchResults->getItems() as $item) {
            var_dump($item->getName());
        }

        exit;
    }

}
