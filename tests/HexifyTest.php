<?php

declare(strict_types=1);

it('can replace ^ signs, _ signs and . signs into uppercase, lowercase and uppercase or lowercase letters', function (string $expression, string $sign) {
    $sequence = str_repeat($sign, 100);
    expect(🙃()->sequence->hexify($sequence))
        ->toMatch("/^$expression\$/");
})->with('hexify');

it('can replace ^ signs, _ signs and . signs into uppercase, lowercase and uppercase or lowercase letters with other strings', function (string $expression, string $sign) {
    $sequence = 'test ' . str_repeat($sign, 100) . ' test';
    expect(🙃()->sequence->hexify($sequence))
        ->toMatch("/^test $expression test\$/");
})->with('hexify');

it('can replace ^ signs, _ signs and . signs into uppercase, lowercase and uppercase or lowercase letters with other strings without spaces', function (string $expression, string $sign) {
    $sequence = 'test' . str_repeat($sign, 100) . 'test';
    expect(🙃()->sequence->hexify($sequence))
        ->toMatch("/^test{$expression}test\$/");
})->with('hexify');
