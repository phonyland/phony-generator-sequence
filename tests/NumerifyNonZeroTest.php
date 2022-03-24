<?php

it('can replace % signs into non-zero random digits', function (string $expression, string $sign) {
    $sequence = str_repeat($sign, 100);
    expect(🙃()->sequence->numerifyNonZero($sequence))
        ->toMatch("/^$expression\$/");
})->with('numerifyNonZero');

it('can replace % signs into non-zero random digits with other strings', function (string $expression, string $sign) {
    $sequence = 'test '.str_repeat($sign, 100).' test';
    expect(🙃()->sequence->numerifyNonZero($sequence))
        ->toMatch("/^test $expression test\$/");
})->with('numerifyNonZero');

it('can replace % signs into non-zero random digits with other strings without spaces', function (string $expression, string $sign) {
    $sequence = 'test'.str_repeat($sign, 100).'test';
    expect(🙃()->sequence->numerifyNonZero($sequence))
        ->toMatch("/^test{$expression}test\$/");
})->with('numerifyNonZero');