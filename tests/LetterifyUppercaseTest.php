<?php

it('can replace ! signs into with random uppercase letters')
    ->expect(🙃()->sequence->letterifyUppercase('!!!'))
    ->toMatch('/^[A-Z]{0,3}$/');

it('can replace ! signs into with random uppercase letters with other strings')
    ->expect(🙃()->sequence->letterifyUppercase('test !!!!!! test'))
    ->toMatch('/^test [A-Z]{0,6} test$/');

it('can replace ! signs into with random uppercase letters with other strings without spaces')
    ->expect(🙃()->sequence->letterifyUppercase('test!!!!!!test'))
    ->toMatch('/^test[A-Z]{0,6}test$/');
