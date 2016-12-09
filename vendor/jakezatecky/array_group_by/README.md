# array_group_by

[![Packagist](https://img.shields.io/packagist/v/jakezatecky/array_group_by.svg)](https://packagist.org/packages/jakezatecky/array_group_by)
[![Build Status](https://travis-ci.org/jakezatecky/array_group_by.svg?branch=master)](https://travis-ci.org/jakezatecky/array_group_by)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/jakezatecky/array_group_by/master/LICENSE.txt)

`array_group_by` is a function that groups an array by a key or set of keys
shared between all array members.

# Usage

Example input:

``` php
$records = [
    [
        'state'  => 'IN',
        'city'   => 'Indianapolis',
        'object' => 'School bus',
    ],
    [
        'state'  => 'IN',
        'city'   => 'Indianapolis',
        'object' => 'Manhole',
    ],
    [
        'state'  => 'IN',
        'city'   => 'Plainfield',
        'object' => 'Basketball',
    ],
    [
        'state'  => 'CA',
        'city'   => 'San Diego',
        'object' => 'Light bulb',
    ],
    [
        'state'  => 'CA',
        'city'   => 'Mountain View',
        'object' => 'Space pen',
    ],
];

$grouped = array_group_by($records, 'state', 'city');
```

Example output:

``` text
Array
(
    [IN] => Array
        (
            [Indianapolis] => Array
                (
                    [0] => Array
                        (
                            [state] => IN
                            [city] => Indianapolis
                            [object] => School bus
                        )

                    [1] => Array
                        (
                            [state] => IN
                            [city] => Indianapolis
                            [object] => Manhole
                        )

                )

            [Plainfield] => Array
                (
                    [0] => Array
                        (
                            [state] => IN
                            [city] => Plainfield
                            [object] => Basketball
                        )

                )

        )

    [CA] => Array
        (
            [San Diego] => Array
                (
                    [0] => Array
                        (
                            [state] => CA
                            [city] => San Diego
                            [object] => Light bulb
                        )

                )

            [Mountain View] => Array
                (
                    [0] => Array
                        (
                            [state] => CA
                            [city] => Mountain View
                            [object] => Space pen
                        )

                )

        )
)
```

# Installation

A Composer package is available for this function. Just add the following to
`composer.json`.

``` javascript
{
    "require": {
        "jakezatecky/array_group_by": "~1.0"
    }
}
```

Alternatively, you can just include the `src/array_group_by.php` file.

# License

MIT license.
