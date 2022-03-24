<?php

it('can replace @ signs into with random lowercase letters', function (string $expression, string $sign) {
    $sequence = str_repeat($sign, 100);
    expect(🙃()->sequence->hexifyLowercase($sequence))
        ->toMatch("/^$expression\$/");
})->with('hexifyLowercase');

it('can replace @ signs into with random lowercase letters with other strings', function (string $expression, string $sign) {
    $sequence = 'test '.str_repeat($sign, 100).' test';
    expect(🙃()->sequence->hexifyLowercase($sequence))
        ->toMatch("/^test $expression test\$/");
})->with('hexifyLowercase');

it('can replace @ signs into with random lowercase letters with other strings without spaces', function (string $expression, string $sign) {
    $sequence = 'test'.str_repeat($sign, 100).'test';
    expect(🙃()->sequence->hexifyLowercase($sequence))
        ->toMatch("/^test{$expression}test\$/");
})->with('hexifyLowercase');
