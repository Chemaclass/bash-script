<?php
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Model\Pyramid;
use Generator\PyramidGenerator;

$console = new Application('My Silex Application', 'n/a');
$console->getDefinition()
    ->addOption(
        new InputOption('--env', '-e', InputOption::VALUE_REQUIRED, 
                'The Environment name.', 'dev'));
$console->setDispatcher($app['dispatcher']);
$console->register('pyramid')
    ->setDefinition(
        [
            new InputArgument('height', InputArgument::REQUIRED, 
                    'The height of the Pyramid'),
            new InputArgument('pointTo', InputArgument::OPTIONAL, 
                    'The direction of the Pyramid. '
                    . sprintf("Posible directions: %s, %s, %s, %s.",
                            PyramidGenerator::UP,
                            PyramidGenerator::DOWN,
                            PyramidGenerator::RIGHT,
                            PyramidGenerator::LEFT)
                    , PyramidGenerator::UP)
        ])
    ->setDescription('Render a Pyramid :)')
    ->setCode(
        function (InputInterface $input, OutputInterface $output) use ($app){
            $height = $input->getArgument('height');
            $pointTo = $input->getArgument('pointTo');

            $output->writeln("> height: " . $height);

            $pyramid = new Pyramid($height);
            $pyramidRender = new PyramidGenerator($pyramid, $pointTo);

            $output->writeln($pyramidRender->generateAsString());
        });

return $console;
