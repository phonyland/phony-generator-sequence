<?php

it('can replace # signs into with-zero random digits')
    ->expect(🙃()->sequence->digitify('##################################################'))
    ->toMatch('/^[\d]{50}$/');

it('can replace # signs into with-zero random digits with other strings')
    ->expect(🙃()->sequence->digitify('test ################################################## test'))
    ->toMatch('/^test [\d]{50} test$/');

it('can replace # signs into with-zero random digits with other strings without spaces')
    ->expect(🙃()->sequence->digitify('test##################################################test'))
    ->toMatch('/^test[\d]{50}test$/');
