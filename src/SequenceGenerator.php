<?php

declare(strict_types=1);

namespace Phonyland\SequenceGenerator;

use Phonyland\Framework\Generator;

class SequenceGenerator extends Generator
{
    public function digit(string $sequence): string
    {
        return preg_replace_callback('/#/', fn () => $this->phony->number->digit(), $sequence);
    }
}
