<?php

it('can replace _ signs into lowercase hex letters')
    ->expect(🙃()->sequence->hexifyLowercase('__________________________________________________'))
    ->toMatch('/^[0-9a-f]{50}$/');

it('can replace _ signs into lowercase hex letters with other strings')
    ->expect(🙃()->sequence->hexifyLowercase('test __________________________________________________ test'))
    ->toMatch('/^test [0-9a-f]{50} test$/');

it('can replace _ signs into lowercase hex letters with other strings without spaces')
    ->expect(🙃()->sequence->hexifyLowercase('test__________________________________________________test'))
    ->toMatch('/^test[0-9a-f]{50}test$/');
