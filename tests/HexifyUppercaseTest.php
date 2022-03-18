<?php

it('can replace ^ signs into uppercase hex letters')
    ->expect(🙃()->sequence->hexifyUppercase('^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^'))
    ->toMatch('/^[0-9A-F]{50}$/');

it('can replace ^ signs into uppercase hex letters with other strings')
    ->expect(🙃()->sequence->hexifyUppercase('test ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ test'))
    ->toMatch('/^test [0-9A-F]{50} test$/');

it('can replace ^ signs into uppercase hex letters with other strings without spaces')
    ->expect(🙃()->sequence->hexifyUppercase('test^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^test'))
    ->toMatch('/^test[0-9A-F]{50}test$/');
