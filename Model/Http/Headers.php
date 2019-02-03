<?php
/**
 * Headers.php
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License, which
 * is bundled with this package in the file LICENSE.txt.
 *
 * It is also available on the Internet at the following URL:
 * https://docs.auroraextensions.com/magento/extensions/2.x/magentocroncloudfunctions/LICENSE.txt
 *
 * @package       AuroraExtensions_MagentoCronCloudFunctions
 * @copyright     Copyright (C) 2019 Aurora Extensions <support@auroraextensions.com>
 * @license       MIT License
 */

namespace AuroraExtensions\MagentoCronCloudFunctions\Model\Http;

use Zend\Http\Headers as HttpHeaders;

class Headers implements HeadersInterface
{
    /** @property HttpHeaders $httpHeaders */
    protected $httpHeaders;

    /** @property array $defaultHeaders */
    public static $defaultHeaders = [
        'Accept'       => 'application/json',
        'Content-Type' => 'application/json',
    ];

    /**
     * @param HttpHeaders $httpHeaders
     * @return void
     */
    public function __construct(HttpHeaders $httpHeaders) {
        $this->httpHeaders = $httpHeaders;
    }

    /**
     * Return Zend\Http\Headers instance.
     *
     * @return HttpHeaders
     */
    public function getHttpHeaders(): HttpHeaders
    {
        return $this->httpHeaders;
    }

    /**
     * Set HTTP headers.
     *
     * @param array $headers
     * @param $this
     */
    public function addHttpHeaders(array $headers = [])
    {
        $this->httpHeaders->addHeaders($headers);

        return $this;
    }
}
