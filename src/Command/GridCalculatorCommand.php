<?php

// src/Command/CreateUserCommand.php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\ArrayInput;
use App\Services\GridObject;
use App\Services\MailManager;

class GridCalculatorCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:calc-grid';

    private $mailer;

    private $distance;

    public function __construct(MailManager $mailer, GridObject $distance){
        $this->mailer = $mailer;
        $this->distance = $distance;
        parent::__construct(null);
    }

    protected function configure()
    {
         $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Gives the sum of manhattan distance.')
            ->addArgument('productId', InputArgument::REQUIRED, 'Product ID')
            ->addArgument('productType', InputArgument::REQUIRED, 'Product Type')
            ->addArgument('posX', InputArgument::REQUIRED, 'X Coordinates')
            ->addArgument('posY', InputArgument::REQUIRED, 'Y Coordinates')
            // the full command description shown when running the command with
            // the "--help" option
            //->setHelp('This command allows you to create a warehouse grid...')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Distance Calculator',
            '============',
            '',
        ]);
        
        $productId = $input->getArgument('productId');
        $productType = $input->getArgument('productType');

        $this->mailer->notifyOfNewProduct($productId, $productType);

        /*

        Example: pass coordinates as a string

            $x = 1132; 
            $y = 5653;            

        */

        $stringX = $input->getArgument('posX');
        $x = str_split($stringX);
        $stringY = $input->getArgument('posY');        
        $y = str_split($stringY);        
        $n = count($x); 

        $total = $this->distance->distanceSum($x, $y, $n);
        //$output->writeln($text);
        $output->writeln('Success!');

       
        $output->writeln($input->getArgument('productId'));
        $output->writeln($input->getArgument('productType'));
        $output->writeln($total);
        
    }


    
}