<?php

declare(strict_types=1);

namespace Phonyland\SequenceGenerator;

use Phonyland\Framework\Generator;

class SequenceGenerator extends Generator
{
    public function digit(string $sequence): string
    /**
     * Replaces every hash sign ('#') with a random digit.
     *
     * @param  string  $sequence
     *
     * @return string
     */
    public function digitify(string $sequence): string
    {
        return preg_replace_callback(
            pattern: '/\#/',
            callback: fn() => $this->phony->number->digit(),
            subject: $sequence
        );
    }

    /**
     * Replaces every percentage sign ('%') with a non-zero random digit.
     *
     * @param  string  $sequence
     *
     * @return string
     */
    public function digitifyNonZero(string $sequence): string
    {
        return preg_replace_callback(
            pattern: '/%/',
            callback: fn() => $this->phony->number->digitNonZero(),
            subject: $sequence
        );
    }

    public function numerify(string $sequence): string
    {
        $randomDigitFn = fn () => $this->phony->number->digit();

        return preg_replace_callback(
            pattern: '/#/',
            callback: $randomDigitFn,
            subject: $sequence
        );
    }
    {
        return preg_replace_callback('/#/', fn () => $this->phony->number->digit(), $sequence);
    }
}
