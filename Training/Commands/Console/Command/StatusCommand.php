<?php
namespace Training\Commands\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StatusCommand extends \Symfony\Component\Console\Command\Command
{
    protected function configure()
    {
        $this->setName("training:status")
            ->setDescription("Check training status")
            ->addArgument("name", \Symfony\Component\Console\Input\InputArgument::OPTIONAL, "Your name")
            ->addOption("force", "-f", \Symfony\Component\Console\Input\InputOption::VALUE_NONE, "Force the user");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument("name");
        $forced = $input->getOption("force");

        if ($name) {
            $output->writeln("Welcome " . $name);
        }

        if ($forced) {
            $output->writeln("Forced.");
        }

        $output->writeln("Status Checked.");
    }


}
