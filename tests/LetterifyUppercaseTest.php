<?php

it('can replace ! signs into with random uppercase letters', function (string $expression, string $sign) {
    $sequence = str_repeat($sign, 100);
    expect(🙃()->sequence->letterifyUppercase($sequence))
        ->toMatch("/^$expression\$/");
})->with('letterifyUppercase');

it('can replace ! signs into with random uppercase letters with other strings', function (string $expression, string $sign) {
    $sequence = 'test '.str_repeat($sign, 100).' test';
    expect(🙃()->sequence->letterifyUppercase($sequence))
        ->toMatch("/^test $expression test\$/");
})->with('letterifyUppercase');

it('can replace ! signs into with random uppercase letters with other strings without spaces', function (string $expression, string $sign) {
    $sequence = 'test'.str_repeat($sign, 100).'test';
    expect(🙃()->sequence->letterifyUppercase($sequence))
        ->toMatch("/^test{$expression}test\$/");
})->with('letterifyUppercase');