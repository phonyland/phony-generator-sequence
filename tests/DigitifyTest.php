<?php

it('can replace hash signs into random digits')
    ->expect(🙃()->sequence->digitify('###'))
    ->toMatch('/^[\d]{0,3}$/');

it('can replace hash signs into random digits with other strings')
    ->expect(🙃()->sequence->digitify('test ###### test'))
    ->toMatch('/^test [\d]{0,6} test$/');

it('can replace hash signs into random digits with other strings without spaces')
    ->expect(🙃()->sequence->digitify('test######test'))
    ->toMatch('/^test[\d]{0,6}test$/');
