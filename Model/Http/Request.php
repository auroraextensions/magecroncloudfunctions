<?php
/**
 * Request.php
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

use AuroraExtensions\MagentoCronCloudFunctions\Helper\Cron as CronHelper;
use AuroraExtensions\MagentoCronCloudFunctions\Helper\Dict;
use AuroraExtensions\MagentoCronCloudFunctions\Model\Cron\JobInterface;

use Zend\Http\Client as HttpClient;
use Zend\Http\Headers as HttpHeaders;
use Zend\Http\Request as HttpRequest;
use Zend\Http\Response as HttpResponse;
use Zend\Stdlib\Parameters;

class Request
{
    /** @property CronHelper $cronHelper */
    protected $cronHelper;

    /** @property JobInterface $cronJob */
    protected $cronJob;

    /** @property HttpClient $httpClient */
    protected $httpClient;

    /** @property HttpHeaders $httpHeaders */
    protected $httpHeaders;

    /** @property HttpRequest $httpRequest */
    protected $httpRequest;

    /**
     * @param CronHelper $cronHelper
     * @param JobInterface $cronJob
     * @param HttpClient $httpClient
     * @param HttpHeaders $httpHeaders
     * @param HttpRequest $request
     */
    public function __construct(
        CronHelper $cronHelper,
        JobInterface $cronJob,
        HttpClient $httpClient,
        HttpHeaders $httpHeaders,
        HttpRequest $httpRequest
    ) {
        $this->cronHelper = $cronHelper;
        $this->cronJob = $cronJob;
        $this->httpClient = $httpClient;
        $this->httpHeaders = $httpHeaders;
        $this->httpRequest = $httpRequest;
    }

    /**
     * Trigger Cloud Functions HTTP endpoint.
     *
     * @return void
     * @throws LocalizedException
     */
    public function execute()
    {
        /** @var string $endpointUrl */
        $endpointUrl = $this->cronHelper->getEndpointUrl($this->cronJob->getJobCode());

        $this->httpHeaders->addHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);

        $this->httpRequest->setHeaders($this->httpHeaders);
        $this->httpRequest->setUri($endpointUrl);
        $this->httpRequest->setMethod(HttpRequest::METHOD_POST);

        $this->httpClient->setOptions([
            'adapter' => 'Zend\Http\Client\Adapter\Curl',
            'timeout' => 30,
        ]);

        $this->httpClient->send($this->httpRequest);
    }
}
