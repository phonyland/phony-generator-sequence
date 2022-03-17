<?php

it('can replace @ signs into with random lowercase letters')
    ->expect(🙃()->sequence->letterifyLowercase('@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@'))
    ->toMatch('/^[a-z]{50}$/');

it('can replace @ signs into with random lowercase letters with other strings')
    ->expect(🙃()->sequence->letterifyLowercase('test @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ test'))
    ->toMatch('/^test [a-z]{50} test$/');

it('can replace @ signs into with random lowercase letters with other strings without spaces')
    ->expect(🙃()->sequence->letterifyLowercase('test@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@test'))
    ->toMatch('/^test[a-z]{50}test$/');
