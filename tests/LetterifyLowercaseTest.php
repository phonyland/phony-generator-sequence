<?php

declare(strict_types=1);

it('can replace @ signs into with random lowercase letters', function (string $expression, string $sign) {
    $sequence = str_repeat($sign, 100);
    expect(🙃()->sequence->letterifyLowercase($sequence))
        ->toMatch("/^$expression\$/");
})->with('letterifyLowercase');

it('can replace @ signs into with random lowercase letters with other strings', function (string $expression, string $sign) {
    $sequence = 'test ' . str_repeat($sign, 100) . ' test';
    expect(🙃()->sequence->letterifyLowercase($sequence))
        ->toMatch("/^test $expression test\$/");
})->with('letterifyLowercase');

it('can replace @ signs into with random lowercase letters with other strings without spaces', function (string $expression, string $sign) {
    $sequence = 'test' . str_repeat($sign, 100) . 'test';
    expect(🙃()->sequence->letterifyLowercase($sequence))
        ->toMatch("/^test{$expression}test\$/");
})->with('letterifyLowercase');
