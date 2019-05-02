<?php

namespace App\Command;

use App\Messenger\Admin\CreateNewAdminCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

class CreateAdminCommand extends Command
{
    protected static $defaultName = 'TheChoosenPoint:create:admin';
    /**
     * @var MessageBusInterface
     */
    private $bus;
    public function __construct(MessageBusInterface $bus)
    {
        parent::__construct();
        $this->bus = $bus;
    }
    protected function configure(): void
    {
        $this
            ->setDescription('Creates a new admin user.')
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')
            ->addArgument('password', InputArgument::REQUIRED, 'User password');
    }
    protected function execute(InputInterface $input, OutputInterface $output): ?int
    {
        $io = new SymfonyStyle($input, $output);
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');
        try {
            if (!is_string($username)) {
                throw new \InvalidArgumentException('Invalid username');
            }
            $message = new CreateNewAdminCommand($username, $password);
            $this->bus->dispatch($message);
            $io->success('User created');
        } catch (\Throwable $e) {
            $io->error($e->getMessage());
            return $e->getCode();
        }
        return 0;
    }
}
