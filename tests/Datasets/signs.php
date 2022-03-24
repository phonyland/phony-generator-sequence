<?php

use Phonyland\SequenceGenerator\SequenceGenerator;

const NON_ZERO_DIGIT_SIGN = [
    'NON_ZERO_DIGIT_SIGN' => [
        '[1-9]{100}', SequenceGenerator::NON_ZERO_DIGIT_SIGN,
    ],
];

const WITH_ZERO_DIGIT_SIGN = [
    'WITH_ZERO_DIGIT_SIGN' => [
        '[0-9]{100}', SequenceGenerator::WITH_ZERO_DIGIT_SIGN,
    ],
];

const ASCII_LETTER_UPPERCASE_SIGN = [
    'ASCII_LETTER_UPPERCASE_SIGN' => [
        '[A-Z]{100}', SequenceGenerator::ASCII_LETTER_UPPERCASE_SIGN,
    ],
];
const ASCII_LETTER_LOWERCASE_SIGN = [
    'ASCII_LETTER_LOWERCASE_SIGN' => [
        '[a-z]{100}', SequenceGenerator::ASCII_LETTER_LOWERCASE_SIGN,
    ],
];
const ASCII_LETTER_SIGN = [
    'ASCII_LETTER_SIGN' => [
        '[a-zA-Z]{100}', SequenceGenerator::ASCII_LETTER_SIGN,
    ],
];

const HEX_LETTER_UPPERCASE_SIGN = [
    'HEX_LETTER_UPPERCASE_SIGN' => [
        '[0-9A-F]{100}', SequenceGenerator::HEX_LETTER_UPPERCASE_SIGN,
    ],
];
const HEX_LETTER_LOWERCASE_SIGN = [
    'HEX_LETTER_LOWERCASE_SIGN' => [
        '[0-9a-f]{100}', SequenceGenerator::HEX_LETTER_LOWERCASE_SIGN,
    ],
];

const HEX_LETTER_SIGN = [
    'HEX_LETTER_SIGN' => [
        '[0-9a-fA-F]{100}', SequenceGenerator::HEX_LETTER_SIGN,
    ],
];

const NON_ZERO_DIGIT_OR_UPPERCASE_LETTER_SIGN = [
    'NON_ZERO_DIGIT_OR_UPPERCASE_LETTER_SIGN' => [
        '[1-9A-Z]{100}', SequenceGenerator::NON_ZERO_DIGIT_OR_UPPERCASE_LETTER_SIGN,
    ],
];
const NON_ZERO_DIGIT_OR_LOWERCASE_LETTER_SIGN = [
    'NON_ZERO_DIGIT_OR_LOWERCASE_LETTER_SIGN' => [
        '[1-9a-z]{100}', SequenceGenerator::NON_ZERO_DIGIT_OR_LOWERCASE_LETTER_SIGN,
    ],
];
const NON_ZERO_DIGIT_OR_LETTER_SIGN = [
    'NON_ZERO_DIGIT_OR_LETTER_SIGN' => [
        '[1-9a-zA-Z]{100}', SequenceGenerator::NON_ZERO_DIGIT_OR_LETTER_SIGN,
    ],
];
const WITH_ZERO_DIGIT_OR_UPPERCASE_LETTER_SIGN = [
    'WITH_ZERO_DIGIT_OR_UPPERCASE_LETTER_SIGN' => [
        '[0-9A-Z]{100}', SequenceGenerator::WITH_ZERO_DIGIT_OR_UPPERCASE_LETTER_SIGN,
    ],
];
const WITH_ZERO_DIGIT_OR_LOWERCASE_LETTER_SIGN = [
    'WITH_ZERO_DIGIT_OR_LOWERCASE_LETTER_SIGN' => [
        '[0-9a-z]{100}', SequenceGenerator::WITH_ZERO_DIGIT_OR_LOWERCASE_LETTER_SIGN,
    ],
];
const WITH_ZERO_DIGIT_OR_LETTER_SIGN = [
    'WITH_ZERO_DIGIT_OR_LETTER_SIGN' => [
        '[0-9a-zA-Z]{100}', SequenceGenerator::WITH_ZERO_DIGIT_OR_LETTER_SIGN,
    ],
];

dataset('digitifyNonZero', [
    ...NON_ZERO_DIGIT_SIGN
]);

dataset('digitify', [
    ...WITH_ZERO_DIGIT_SIGN,
]);

dataset('hexifyUppercase', [
    ...HEX_LETTER_UPPERCASE_SIGN,
]);
dataset('signs', [
    ...NON_ZERO_DIGIT_SIGN,
    ...WITH_ZERO_DIGIT_SIGN,
    ...ASCII_LETTER_UPPERCASE_SIGN,
    ...ASCII_LETTER_LOWERCASE_SIGN,
    ...ASCII_LETTER_SIGN,
    ...HEX_LETTER_UPPERCASE_SIGN,
    ...HEX_LETTER_LOWERCASE_SIGN,
    ...HEX_LETTER_SIGN,
    ...NON_ZERO_DIGIT_OR_UPPERCASE_LETTER_SIGN,
    ...NON_ZERO_DIGIT_OR_LOWERCASE_LETTER_SIGN,
    ...NON_ZERO_DIGIT_OR_LETTER_SIGN,
    ...WITH_ZERO_DIGIT_OR_UPPERCASE_LETTER_SIGN,
    ...WITH_ZERO_DIGIT_OR_LOWERCASE_LETTER_SIGN,
    ...WITH_ZERO_DIGIT_OR_LETTER_SIGN,
]);
