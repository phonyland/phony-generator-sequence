<?php

declare(strict_types=1);

namespace Phonyland\SequenceGenerator;

use Phonyland\Framework\Generator;

class SequenceGenerator extends Generator
{
    public const NON_ZERO_DIGIT_SIGN = '#';
    public const WITH_ZERO_DIGIT_SIGN = '%';
    public const ASCII_LETTER_UPPERCASE_SIGN = '!';
    public const ASCII_LETTER_LOWERCASE_SIGN = '@';
    public const ASCII_LETTER_SIGN = '?';
    public const HEX_LETTER_UPPERCASE_SIGN = '^';
    public const HEX_LETTER_LOWERCASE_SIGN = '_';
    public const HEX_LETTER_SIGN = '.';
    public const NON_ZERO_DIGIT_OR_UPPERCASE_LETTER_SIGN = '(';
    public const NON_ZERO_DIGIT_OR_LOWERCASE_LETTER_SIGN = ')';
    public const NON_ZERO_DIGIT_OR_LETTER_SIGN = '&';
    public const WITH_ZERO_DIGIT_OR_UPPERCASE_LETTER_SIGN = '+';
    public const WITH_ZERO_DIGIT_OR_LOWERCASE_LETTER_SIGN = '$';
    public const WITH_ZERO_DIGIT_OR_LETTER_SIGN = '*';

    /**
     * Replaces every '%' sign with a non-zero random digit.
     *
     * @param  string  $sequence
     *
     * @return string
     */
    public function numerifyNonZero(string $sequence): string
    {
        return preg_replace_callback(
            pattern: '/\\' . self::NON_ZERO_DIGIT_SIGN . '/',
            callback: fn() => $this->phony->number->digitNonZero(),
            subject: $sequence
        );
    }

    /**
     * Replaces every '#' sign with a with-zero random digit.
     *
     * @param  string  $sequence
     *
     * @return string
     */
    public function numerify(string $sequence): string
    {
        return preg_replace_callback(
            pattern: '/\\' . self::WITH_ZERO_DIGIT_SIGN . '/',
            callback: fn() => $this->phony->number->digit(),
            subject: $sequence
        );
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
            pattern: '/\\' . self::ASCII_LETTER_UPPERCASE_SIGN . '/',
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
            pattern: '/\\' . self::ASCII_LETTER_LOWERCASE_SIGN . '/',
            callback: fn() => $letters[$this->phony->number->integerBetween(0, count($letters) - 1)],
            subject: $sequence
        );
    }

    /**
     * Replaces every:
     * '?' with a letter,
     * '@' sign with a lowercase letter,
     * '!' sign with an uppercase letter.
     *
     * @param  string      $sequence
     * @param  array|null  $lettersUppercase
     * @param  array|null  $lettersLowercase
     *
     * @return string
     */
    public function letterify(
        string $sequence,
        ?array $lettersUppercase = null,
        ?array $lettersLowercase = null
    ): string {
        return (string) Pipe::new($sequence)
            (fn($sequence) => $this->replaceWithRandomSign(self::ASCII_LETTER_SIGN, self::ASCII_LETTER_UPPERCASE_SIGN, self::ASCII_LETTER_LOWERCASE_SIGN, $sequence))
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
            pattern: '/\\' . self::HEX_LETTER_UPPERCASE_SIGN . '/',
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
            pattern: '/\\' . self::HEX_LETTER_LOWERCASE_SIGN . '/',
            callback: fn() => dechex($this->phony->number->digit(16)),
            subject: $sequence
        );
    }

    /**
     * Replaces every:
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
            (fn($sequence) => $this->replaceWithRandomSign(self::HEX_LETTER_SIGN, self::HEX_LETTER_UPPERCASE_SIGN, self::HEX_LETTER_LOWERCASE_SIGN, $sequence))
            (fn($sequence) => $this->hexifyUppercase($sequence))
            (fn($sequence) => $this->hexifyLowercase($sequence));
    }

    /**
     * Replaces every:
     * '*' sign with a with-zero random digit or a letter,
     * '$' sign with a with-zero random digit or a lowercase letter,
     * '+' sign with a with-zero random digit or an uppercase letter,.
     *
     * '&' sign with a non-zero random digit or a letter,
     * ')' sign with a non-zero random digit or a lowercase letter,
     * '(' sign with a non-zero random digit or an uppercase letter,
     *
     * '.' with an uppercase or lowercase hex letter.
     * '_' sign with a lowercase hex letter.
     * '^' sign with an uppercase hex letter.
     *
     * '?' with a letter.
     * '@' sign with a lowercase letter,
     * '!' sign with an uppercase letter,
     *
     * '#' sign with a with-zero random digit,
     * '%' sign with a non-zero random digit.
     *
     * @param  string      $sequence
     * @param  array|null  $lettersUppercase
     * @param  array|null  $lettersLowercase
     *
     * @return string
     */
    public function alphanumerify(
        string $sequence,
        ?array $lettersUppercase = null,
        ?array $lettersLowercase = null
    ): string {
        return (string) Pipe::new($sequence)
            (fn($sequence) => $this->replaceWithRandomSign(self::WITH_ZERO_DIGIT_OR_LETTER_SIGN, self::WITH_ZERO_DIGIT_SIGN, self::ASCII_LETTER_SIGN, $sequence))
            (fn($sequence) => $this->replaceWithRandomSign(self::WITH_ZERO_DIGIT_OR_LOWERCASE_LETTER_SIGN, self::WITH_ZERO_DIGIT_SIGN, self::ASCII_LETTER_LOWERCASE_SIGN, $sequence))
            (fn($sequence) => $this->replaceWithRandomSign(self::WITH_ZERO_DIGIT_OR_UPPERCASE_LETTER_SIGN, self::WITH_ZERO_DIGIT_SIGN, self::ASCII_LETTER_UPPERCASE_SIGN, $sequence))
            (fn($sequence) => $this->replaceWithRandomSign(self::NON_ZERO_DIGIT_OR_LETTER_SIGN, self::NON_ZERO_DIGIT_SIGN, self::ASCII_LETTER_SIGN, $sequence))
            (fn($sequence) => $this->replaceWithRandomSign(self::NON_ZERO_DIGIT_OR_LOWERCASE_LETTER_SIGN, self::NON_ZERO_DIGIT_SIGN, self::ASCII_LETTER_LOWERCASE_SIGN, $sequence))
            (fn($sequence) => $this->replaceWithRandomSign(self::NON_ZERO_DIGIT_OR_UPPERCASE_LETTER_SIGN, self::NON_ZERO_DIGIT_SIGN, self::ASCII_LETTER_UPPERCASE_SIGN, $sequence))
            (fn($sequence) => $this->hexify($sequence))
            (fn($sequence) => $this->letterify($sequence, $lettersUppercase, $lettersLowercase))
            (fn($sequence) => $this->numerifyNonZero($sequence))
            (fn($sequence) => $this->numerify($sequence));
    }

    /**
     * Replaces every occurence of $signToReplace with random $sign1 or $sign2.
     *
     * @param  string  $signToReplace
     * @param  string  $sign1
     * @param  string  $sign2
     * @param  string  $sequence
     *
     * @return string
     */
    private function replaceWithRandomSign(string $signToReplace, string $sign1, string $sign2, string $sequence): string
    {
        return preg_replace_callback(
            pattern: '/\\' . $signToReplace . '/',
            callback: fn() => $this->phony->number->boolean() ? $sign1 : $sign2,
            subject: $sequence,
        );
    }
}
