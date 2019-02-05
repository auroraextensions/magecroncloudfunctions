<?php
/**
 * HeadersInterface.php
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

namespace AuroraExtensions\MageCronCloudFunctions\Model\Http;

use Zend\Http\Headers as HttpHeaders;

interface HeadersInterface
{
    /**
     * @param array $headers
     * @return $this
     */
    public function addHttpHeaders(array $headers);

    /**
     * @return Zend\Http\Headers
     */
    public function getHttpHeaders(): HttpHeaders;
}
