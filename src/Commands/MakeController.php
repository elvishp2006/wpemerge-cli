<?php

namespace WPEmerge\Cli\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WPEmerge\Cli\Templates\Controller;

class MakeController extends Command {
	/**
	 * {@inheritDoc}
	 */
	protected function configure() {
		$this
			->setName( 'make:controller' )
			->setDescription( 'Creates a controller class file.' )
			->setHelp( 'Creates a controller class file.' )
			->addArgument( 'name', InputArgument::REQUIRED, 'Desired class name in CamelCase.' );
	}

	/**
	 * {@inheritDoc}
	 */
	protected function execute( InputInterface $input, OutputInterface $output ) {
		$template = new Controller();
		$filepath = $template->create( $input->getArgument( 'name' ), getcwd() );

		$output->writeln( 'Controller created successfully:' );
		$output->writeln( '<info>' . $filepath . '</info>' );
	}
}
