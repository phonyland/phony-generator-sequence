<?php

it('can numerify hash signs')
    ->expect(🙃()->sequence->digitify('###'))
    ->toMatch('/^[\d]{0,3}$/');

it('can digitify hash signs together with strings')
    ->expect(🙃()->sequence->digitify('test ###### test'))
    ->toMatch('/^test [\d]{0,6} test$/');

it('can digitify hash signs together with strings without spaces')
    ->expect(🙃()->sequence->digitify('test######test'))
    ->toMatch('/^test[\d]{0,6}test$/');
