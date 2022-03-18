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
     * @param  string      $sequence
     * @param  array|null  $letters
     *
     * @return string
     */
    public function letterifyUppercase(
        string $sequence,
        array $letters = null,
    ): string {
        $letters = $letters ?? [
                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U',
                'V', 'W', 'X', 'Y', 'Z',
            ];

        return preg_replace_callback(
            pattern: '/\!/',
            callback: fn() => $letters[$this->phony->number->integerBetween(0, count($letters) - 1)],
            subject: $sequence
        );
    }

    /**
     * Replaces every '@' sign with a lowercase letter.
     *
     * @param  string      $sequence
     * @param  array|null  $letters
     *
     * @return string
     */
    public function letterifyLowercase(
        string $sequence,
        array $letters = null,
    ): string {
        $letters = $letters ?? [
                'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u',
                'v', 'w', 'x', 'y', 'z',
            ];

        return preg_replace_callback(
            pattern: '/\@/',
            callback: fn() => $letters[$this->phony->number->integerBetween(0, count($letters) - 1)],
            subject: $sequence
        );
    }

    /**
     * Replaces every
     * '@' sign with a lowercase letter,
     * '!' sign with an uppercase letter,
     * '?' with an uppercase or lowercase letter.
     *
     * @param  string      $sequence
     * @param  array|null  $lettersUppercase
     * @param  array|null  $lettersLowercase
     *
     * @return string
     */
    public function letterify(string $sequence, ?array $lettersUppercase = null, ?array $lettersLowercase = null): string
    {
        return (string) Pipe::new($sequence)
            (fn($sequence) => preg_replace_callback('/\?/', fn() => $this->phony->number->boolean() ? '!' : '@', $sequence))
            (fn($sequence) => $this->letterifyUppercase($sequence, $lettersUppercase))
            (fn($sequence) => $this->letterifyLowercase($sequence, $lettersLowercase));
    }

    /**
     * Replaces every '^' sign with an uppercase hex letter.
     *
     * @param  string  $sequence
     *
     * @return string
     */
    public function hexifyUppercase(string $sequence): string
    {
        return preg_replace_callback(
            pattern: '/\^/',
            callback: fn() => strtoupper(dechex($this->phony->number->digit(16))),
            subject: $sequence
        );
    }

    /**
     * Replaces every '_' sign with a lowercase hex letter.
     *
     * @param  string  $sequence
     *
     * @return string
     */
    public function hexifyLowercase(string $sequence): string
    {
        return preg_replace_callback(
            pattern: '/\_/',
            callback: fn() => dechex($this->phony->number->digit(16)),
            subject: $sequence
        );
    }

    /**
     * Replaces every
     * '^' sign with an uppercase hex letter,
     * '_' sign with a lowercase hex letter,
     * '.' with an uppercase or lowercase hex letter.
     *
     * @param  string  $sequence
     *
     * @return string
     */
    public function hexify(string $sequence): string
    {
        return (string) Pipe::new($sequence)
            (fn($sequence) => preg_replace_callback('/\./', fn() => $this->phony->number->boolean() ? '_' : '^', $sequence))
            (fn($sequence) => $this->hexifyUppercase($sequence))
            (fn($sequence) => $this->hexifyLowercase($sequence));
    }

    // sequencify
    // alphanumerify
}
