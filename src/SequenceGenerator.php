<?php

declare(strict_types=1);

namespace Phonyland\SequenceGenerator;

use Phonyland\Framework\Generator;

class SequenceGenerator extends Generator
{
    /**
     * Replaces every '#' sign with a with-zero random digit.
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
     * Replaces every '%' sign with a non-zero random digit.
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

    /**
     * Replaces every '#' sign with a with-zero random digit
     * and '%' sign with a non-zero random digit.
     *
     * @param  string  $sequence
     *
     * @return string
     */
    public function numerify(string $sequence): string
    {
        return (string) Pipe::new($sequence)
            (fn($sequence) => $this->digitify($sequence))
            (fn($sequence) => $this->digitifyNonZero($sequence));
    }

    /**
     * Replaces every '!' sign with an uppercase letter.
     *
     * @param  string  $sequence
     * @param  array   $letters
     *
     * @return string
     */
    public function letterifyUppercase(
        string $sequence,
        array $letters = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U',
            'V', 'W', 'X', 'Y', 'Z',
        ]
    ): string {
        return preg_replace_callback(
            pattern: '/\!/',
            callback: fn() => $letters[$this->phony->number->integerBetween(0, count($letters) - 1)],
            subject: $sequence
        );
    }

    /**
     * Replaces every '@' sign with an lowercase letter.
     *
     * @param  string  $sequence
     * @param  array   $letters
     *
     * @return string
     */
    public function letterifyLowercase(
        string $sequence,
        array $letters = [
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u',
            'v', 'w', 'x', 'y', 'z',
        ]
    ): string {
        return preg_replace_callback(
            pattern: '/\@/',
            callback: fn() => $letters[$this->phony->number->integerBetween(0, count($letters) - 1)],
            subject: $sequence
        );
    }
    {
        return preg_replace_callback('/#/', fn () => $this->phony->number->digit(), $sequence);
    }
}
