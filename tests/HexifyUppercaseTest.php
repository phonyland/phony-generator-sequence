<?php

it('can replace ^ signs into uppercase hex letters', function (string $expression, string $sign) {
    $sequence = str_repeat($sign, 100);
    expect(🙃()->sequence->hexifyUppercase($sequence))
        ->toMatch("/^$expression\$/");
})->with('hexifyUppercase');

it('can replace ^ signs into uppercase hex letters with other strings', function (string $expression, string $sign) {
    $sequence = 'test '.str_repeat($sign, 100).' test';
    expect(🙃()->sequence->hexifyUppercase($sequence))
        ->toMatch("/^test $expression test\$/");
})->with('hexifyUppercase');

it('can replace ^ signs into uppercase hex letters with other strings without spaces', function (string $expression, string $sign) {
    $sequence = 'test'.str_repeat($sign, 100).'test';
    expect(🙃()->sequence->hexifyUppercase($sequence))
        ->toMatch("/^test{$expression}test\$/");
})->with('hexifyUppercase');
