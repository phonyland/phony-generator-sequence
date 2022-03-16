<?php

it('can generate sequences from digit signs')
    ->expect(🙃()->sequence->digit('###'))
    ->toMatch('/^[\d]{0,3}$/');

it('can generate sequences from digit signs with strings')
    ->expect(🙃()->sequence->digit('test ###### test'))
    ->toMatch('/^test [\d]{0,6} test$/');

it('can generate sequences from digit signs with strings without spaces')
    ->expect(🙃()->sequence->digit('test######test'))
    ->toMatch('/^test[\d]{0,6}test$/');