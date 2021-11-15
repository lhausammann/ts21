<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\ExpressionLanguage\Lexer;

class LexerCommand extends Command
{

    protected static $defaultName = 'app:lexer';


    protected function configure(): void
    {
        $this->addArgument('lexerString', 'the string to lex');
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $lexer = new Lexer();
        $tokens = $lexer->tokenize($input->getArgument('lexerString'));
        var_dump($tokens);
        return Command::SUCCESS;
    }
}