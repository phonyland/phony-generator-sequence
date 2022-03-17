<?php

it('can replace % signs into non-zero random digits')
    ->expect(🙃()->sequence->digitifyNonZero('%%%'))
    ->toMatch('/^[1-9]{0,3}$/');

it('can replace % signs into non-zero random digits with other strings')
    ->expect(🙃()->sequence->digitifyNonZero('test %%%%%% test'))
    ->toMatch('/^test [1-9]{0,6} test$/');

it('can replace % signs into non-zero random digits with other strings without spaces')
    ->expect(🙃()->sequence->digitifyNonZero('test%%%%%%test'))
    ->toMatch('/^test[1-9]{0,6}test$/');
