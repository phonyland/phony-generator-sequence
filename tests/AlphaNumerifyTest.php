<?php

it('can alpha numerify sequence characters', function (string $expression, string $sign) {
    expect(🙃()->sequence->alphanumerify(str_repeat($sign, 100)))
        ->toMatch("/^$expression\$/");
})->with('signs');

it('can alpha numerify sequence characters with other strings', function (string $expression, string $sign) {
    expect(🙃()->sequence->alphanumerify('test ' . str_repeat($sign, 100) . ' test'))
        ->toMatch("/^test $expression test\$/");
})->with('signs');

it('can alpha numerify sequence characters with other strings without spaces', function (string $expression, string $sign) {
    expect(🙃()->sequence->alphanumerify('test' . str_repeat($sign, 100) . 'test'))
        ->toMatch("/^test{$expression}test\$/");
})->with('signs');
