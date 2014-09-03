<?php

namespace SOverflowed\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Goutte\Client;

class LoginCommand extends Command
{
  protected $userConfig = array(
				'email' => 'johndoe@example.com',
				'password' => 'foobar1234')
				);
  
  protected function configure()
  {
        $this
	  ->setName('stackoverflow:login')
	  ->setDescription('Stack Overflow login from console')
	  ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {

    //Goutte Client instance extends Symfony\Component\BrowserKit\Client
    $client = new Client();

    $output->writeln("Visiting stackoverflow.com...");
    $crawler = $client->request('GET', 'http://stackoverflow.com/users/login');
    
    $output->writeln('Logging in..');

    $form = $crawler->filter('#se-login-form')->form();

    $crawler = $client->submit(
			       $form,
			       array(
				     'email' => $userConfig['email'],
				     'password' => $userConfig['password'])
			       );
    $errors = $crawler->filter('.message-error');
    if(!empty($errors)){
      $errors->each(function ($node) {
	$output->writeln($node->text());
      });
    }
    $output->writeln('<info>Success</info>');
  }
}
