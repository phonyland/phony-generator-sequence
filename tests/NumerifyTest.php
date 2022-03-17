<?php

it('can replace hash signs and percentage signs into with-zero digits and non-zero digits')
    ->expect(🙃()->sequence->numerify('#########################%%%%%%%%%%%%%%%%%%%%%%%%%'))
    ->toMatch('/^[0-9]{25}[1-9]{25}$/');

it('can replace hash signs and percentage signs into with-zero digits and non-zero digits with other strings')
    ->expect(🙃()->sequence->numerify('test #########################%%%%%%%%%%%%%%%%%%%%%%%%% test'))
    ->toMatch('/^test [0-9]{25}[1-9]{25} test$/');

it('can replace hash signs and percentage signs into with-zero digits and non-zero digits with other strings without spaces')
    ->expect(🙃()->sequence->numerify('test#########################%%%%%%%%%%%%%%%%%%%%%%%%%test'))
    ->toMatch('/^test[0-9]{25}[1-9]{25}test$/');
