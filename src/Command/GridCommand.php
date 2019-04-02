<?php
// src/Command/CreateUserCommand.php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\ArrayInput;
use App\Services\GridObject;

class GridCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:get-grid';

    private $gridSize;

    public function __construct(GridObject $gridSize){

        $this->gridSize = $gridSize;

        parent::__construct(null);
    }

    protected function configure()
    {
         $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Creates a new grid.')
            //->addArgument('product', InputArgument::IS_ARRAY | InputArgument::REQUIRED, 'Add Grid dimensions')
            //->addArgument('productId', InputArgument::REQUIRED, 'Product ID')
            //->addArgument('productType', InputArgument::REQUIRED, 'Product Type')
            // the full command description shown when running the command with
            // the "--help" option
            //->setHelp('This command allows you to create a warehouse grid...')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
	 	$command = $this->getApplication()->find('app:calc-grid');

	    $arguments = [
	        'command' => 'app:calc-grid',
	        'productId'    => '5',
            'productType'    => 'bag',
	        
	    ];

	    $greetInput = new ArrayInput($arguments);
	    $returnCode = $command->run($greetInput, $output);
        
        $output->write($this->gridSize->getGrid());

    }
    
}