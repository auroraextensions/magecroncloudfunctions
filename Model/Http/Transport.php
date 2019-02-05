<?php
/**
 * Transport.php
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

use Zend\Http\Client as HttpClient;

class Transport implements TransportInterface
{
    /** @property HttpClient $client */
    protected $client;

    /** @property array $defaultOptions */
    public static $defaultOptions = [
        'adapter' => HttpClient\Adapter\Curl::class,
        'timeout' => 30,
    ];

    /**
     * @param HttpClient $client
     * @return void
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Set HTTP client options.
     *
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options = [])
    {
        $this->client->setOptions($options);

        return $this;
    }

    /**
     * Send HTTP request via specified transport.
     *
     * @param RequestInterface $request
     * @return $this
     * @todo: Consider ResponseInterface, return response object to caller.
     */
    public function send(RequestInterface $request)
    {
        $this->client->send($request->getHttpRequest());

        return $this;
    }
}
