<?php

it('can replace # signs into with-zero random digits', function (string $expression, string $sign) {
    $sequence = str_repeat($sign, 100);
    expect(🙃()->sequence->digitify($sequence))
        ->toMatch("/^$expression\$/");
})->with('digitify');

it('can replace # signs into with-zero random digits with other strings', function (string $expression, string $sign) {
    $sequence = 'test '.str_repeat($sign, 100).' test';
    expect(🙃()->sequence->digitify($sequence))
        ->toMatch("/^test $expression test\$/");
})->with('digitify');

it('can replace # signs into with-zero random digits with other strings without spaces', function (string $expression, string $sign) {
    $sequence = 'test'.str_repeat($sign, 100).'test';
    expect(🙃()->sequence->digitify($sequence))
        ->toMatch("/^test{$expression}test\$/");
})->with('digitify');