<?php
/**
 * Cron.php
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

namespace AuroraExtensions\MageCronCloudFunctions\Helper;

class Cron extends Data
{
    /**
     * Get Google Cloud Functions endpoint base URI.
     *
     * @return string
     */
    public function getEndpointBaseUri()
    {
        /** @var string $region */
        $region = $this->getCloudFunctionsRegion() ?: Dict::GCF_DEFAULT_REGION;

        /** @var string $project */
        $project = $this->getGoogleCloudProjectName();

        return 'https://' . $region . '-' . $project . '.' . Dict::GCF_BASE_URI;
    }

    /**
     * Get URL for triggering endpoint via HTTP.
     *
     * @param string $pathname
     * @return string
     */
    public function getEndpointUrl($pathname = '/')
    {
        /* Trim leading slashes from pathname. */
        $pathname = '/' . \ltrim($pathname, '/');

        return $this->getEndpointBaseUri() . $pathname;
    }
}
