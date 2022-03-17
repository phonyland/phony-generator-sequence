<?php

it('can replace percentage signs into non-zero random digits')
    ->expect(🙃()->sequence->digitifyNonZero('%%%'))
    ->toMatch('/^[\d]{0,3}$/');

it('can replace percentage signs into non-zero random digits with other strings')
    ->expect(🙃()->sequence->digitifyNonZero('test %%%%%% test'))
    ->toMatch('/^test [\d]{0,6} test$/');

it('can replace percentage signs into non-zero random digits with other strings without spaces')
    ->expect(🙃()->sequence->digitifyNonZero('test%%%%%%test'))
    ->toMatch('/^test[\d]{0,6}test$/');
