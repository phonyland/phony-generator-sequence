<?php

it('can numerify hash signs')
    ->expect(🙃()->sequence->numerify('###'))
    ->toMatch('/^[\d]{0,3}$/');

it('can numerify hash signs together with strings')
    ->expect(🙃()->sequence->numerify('test ###### test'))
    ->toMatch('/^test [\d]{0,6} test$/');

it('can numerify hash signs together with strings without spaces')
    ->expect(🙃()->sequence->numerify('test######test'))
    ->toMatch('/^test[\d]{0,6}test$/');
