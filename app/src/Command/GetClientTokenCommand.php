<?php

namespace App\Command;

use App\Services\SecurityToken;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'generate-client-token', description: 'Generate encrypted client header token')]
class GetClientTokenCommand extends Command
{
    public function __construct(private SecurityToken $securityToken)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Token : '.$this->securityToken->getToken().'</info>');

        return Command::SUCCESS;
    }
}
