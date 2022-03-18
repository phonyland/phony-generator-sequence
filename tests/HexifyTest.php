<?php

it('can replace ^ signs, _ signs and . signs into uppercase, lowercase and uppercase or lowercase letters')
    ->expect(🙃()->sequence->hexify('^^^^^^^^^^^^^^^^^^^^^^^^^_________________________.........................'))
    ->toMatch('/^[0-9A-Z]{25}[0-9a-z]{25}[0-9a-zA-z]{25}$/');

it('can replace ^ signs, _ signs and . signs into uppercase, lowercase and uppercase or lowercase letters with other strings')
    ->expect(🙃()->sequence->hexify('test ^^^^^^^^^^^^^^^^^^^^^^^^^_________________________......................... test'))
    ->toMatch('/^test [0-9A-Z]{25}[0-9a-z]{25}[0-9a-zA-z]{25} test$/');

it('can replace ^ signs, _ signs and . signs into uppercase, lowercase and uppercase or lowercase letters with other strings without spaces')
    ->expect(🙃()->sequence->hexify('test^^^^^^^^^^^^^^^^^^^^^^^^^_________________________.........................test'))
    ->toMatch('/^test[0-9A-Z]{25}[0-9a-z]{25}[0-9a-zA-z]{25}test$/');
