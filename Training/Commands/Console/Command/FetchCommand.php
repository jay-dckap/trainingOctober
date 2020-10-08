<?php
namespace Training\Commands\Console\Command;

use Magento\Framework\Serialize\SerializerInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FetchCommand extends \Symfony\Component\Console\Command\Command
{
    private $ipApi;

    private $serializer;

    public function __construct(
        \Training\WelcomeMessage\Api\IpApiInterface $ipApi,
        SerializerInterface $serializer,
        string $name = null
    )
    {
        $this->ipApi = $ipApi;
        $this->serializer = $serializer;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName("training:ip:fetch")
            ->setDescription("Check training status")
            ->addArgument("address", \Symfony\Component\Console\Input\InputArgument::REQUIRED, "IP Address");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $ipAddress = $input->getArgument("address");
        $data = $this->ipApi->lookup($ipAddress);

        $jsonData = $this->serializer->unserialize($data);
        $output->writeln("Country: " . $jsonData["country"]);
        $output->writeln("Region: " . $jsonData["regionName"]);

        $output->writeln("Done.");
    }


}
