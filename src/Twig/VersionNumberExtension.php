<?php

/*
 * This file is part of the bk2k/packagebuilder.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * VersionNumberExtension.
 **/
class VersionNumberExtension extends AbstractExtension
{
    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new TwigFilter(
                'version',
                [
                    $this,
                    'versionFilter'
                ]
            )
        ];
    }

    /**
     * @return int
     */
    public function versionFilter($version, $positions = 3)
    {
        $versionString = str_pad((int) $version, 9, '0', STR_PAD_LEFT);
        $parts = [
            substr($versionString, 0, 3),
            substr($versionString, 3, 3),
            substr($versionString, 6, 3)
        ];

        switch ($positions) {
            case 1:
                return (int)$parts[0];
            case 2:
                return (int)$parts[0] . '.' . (int)$parts[1];
            default:
                return (int)$parts[0] . '.' . (int)$parts[1] . '.' . (int)$parts[2];
        }
    }
}
