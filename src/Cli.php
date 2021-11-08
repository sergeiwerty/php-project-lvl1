<?php

namespace Brain\Games\Cli;

use function cli\line as line;
use function cli\prompt as prompt;

function greet(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name? ');
    line("Hello, %s!", $name);
}
