<?php

/*
 * This file is part of the `src-run/cocoa-word-stop-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

require __DIR__.'/.bldr/_helpers/php-cs-fixer/config.php';

$options = [
    'project' => 'src-run/cocoa-word-stop-library',
    'author'  => 'Rob Frawley 2nd <rmf@src.run>',
    'location' => __DIR__,
];

return (new SR\PhpCsFixer\Config($options ?? []))->create();
