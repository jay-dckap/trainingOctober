<?php
namespace Training\UrlRewrite\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Generate extends \Symfony\Component\Console\Command\Command
{
    private $generator;

    public function __construct(
        \Training\UrlRewrite\Model\Generator $generator,
        string $name = null
    )
    {
        $this->generator = $generator;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName("training:url:rewrite")
            ->setDescription("Url rewrites")
            ->addArgument("type", \Symfony\Component\Console\Input\InputArgument::REQUIRED, "Type of Result Object");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Creating URL rewrite ...");

        $type = $input->getArgument("type");
        $this->generator->generate($type);

        $output->writeln("Created.");
    }

}
