<?php

namespace Brain\Games\Cli;

//use Cli\Out;
//  require_once __DIR__ . '/../vendor/autoload.php';


//  use function cli\line;
//  use function cli\prompt;

//  line('Welcome to the Brain Game!');
//  $name = prompt('May I have your name?');
//  line("Hello, %!", $name);
function greet()
{
    \cli\line('Welcome to the Brain Game!');
    $name = \cli\prompt('May I have your name? ');
    \cli\line("Hello, %s!", $name);
}
