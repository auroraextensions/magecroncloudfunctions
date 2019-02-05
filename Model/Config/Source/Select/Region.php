<?php
/**
 * Region.php
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License, which
 * is bundled with this package in the file LICENSE.txt.
 *
 * It is also available on the Internet at the following URL:
 * https://docs.auroraextensions.com/magento/extensions/2.x/magecroncloudfunctions/LICENSE.txt
 *
 * @package       AuroraExtensions_MageCronCloudFunctions
 * @copyright     Copyright (C) 2019 Aurora Extensions <support@auroraextensions.com>
 * @license       MIT License
 */

namespace AuroraExtensions\MageCronCloudFunctions\Model\Config\Source\Select;

class Region
{
    /** @property array $options */
    protected static $options = [];

    /** @property array $regions */
    protected static $regions = [
        'asia-east1',
        'asia-northeast1',
        'asia-south1',
        'asia-southeast1',
        'australia-southeast1',
        'europe-north1',
        'europe-west1',
        'europe-west2',
        'europe-west3',
        'europe-west4',
        'northamerica-northeast1',
        'southamerica-east1',
        'us-central1',
        'us-east1',
        'us-east4',
        'us-west1',
        'us-west2',
    ];

    /**
     * @return void
     */
    public function __construct()
    {
        \array_walk(self::$regions, [$this, 'setOption']);
    }

    /**
     * Set option key/value array on self::$options.
     *
     * @param int|string $value
     * @return void
     */
    protected function setOption($value)
    {
        self::$options[] = [
            'label' => __($value),
            'value' => $value,
        ];
    }

    /**
     * Get formatted options.
     *
     * @return array
     */
    public function toOptionArray()
    {
        return self::$options;
    }
}
