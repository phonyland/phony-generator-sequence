<?php

it('can replace # signs into with-zero random digits', function (string $expression, string $sign) {
    $sequence = str_repeat($sign, 100);
    expect(🙃()->sequence->numerify($sequence))
        ->toMatch("/^$expression\$/");
})->with('numerify');

it('can replace # signs into with-zero random digits with other strings', function (string $expression, string $sign) {
    $sequence = 'test '.str_repeat($sign, 100).' test';
    expect(🙃()->sequence->numerify($sequence))
        ->toMatch("/^test $expression test\$/");
})->with('numerify');

it('can replace # signs into with-zero random digits with other strings without spaces', function (string $expression, string $sign) {
    $sequence = 'test'.str_repeat($sign, 100).'test';
    expect(🙃()->sequence->numerify($sequence))
        ->toMatch("/^test{$expression}test\$/");
})->with('numerify');