<?php

it('can replace ! signs, @ signs and ? signs into uppercase, lowercase and uppercase or lowercase letters')
    ->expect(🙃()->sequence->letterify('!!!!!!!!!!!!!!!!!!!!!!!!!@@@@@@@@@@@@@@@@@@@@@@@@@?????????????????????????'))
    ->toMatch('/^[A-Z]{25}[a-z]{25}[a-zA-z]{25}$/');

it('can replace ! signs, @ signs and ? signs into uppercase, lowercase and uppercase or lowercase letters with other strings')
    ->expect(🙃()->sequence->letterify('test !!!!!!!!!!!!!!!!!!!!!!!!!@@@@@@@@@@@@@@@@@@@@@@@@@????????????????????????? test'))
    ->toMatch('/^test [A-Z]{25}[a-z]{25}[a-zA-z]{25} test$/');

it('can replace ! signs, @ signs and ? signs into uppercase, lowercase and uppercase or lowercase letters with other strings without spaces')
    ->expect(🙃()->sequence->letterify('test!!!!!!!!!!!!!!!!!!!!!!!!!@@@@@@@@@@@@@@@@@@@@@@@@@?????????????????????????test'))
    ->toMatch('/^test[A-Z]{25}[a-z]{25}[a-zA-z]{25}test$/');
