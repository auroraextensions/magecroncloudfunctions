<?php
/**
 * AbstractRequest.php
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

use AuroraExtensions\MageCronCloudFunctions\Helper\Cron as CronHelper;
use AuroraExtensions\MageCronCloudFunctions\Helper\Dict;
use AuroraExtensions\MageCronCloudFunctions\Model\Cron\JobInterface;

use Magento\Framework\DataObject;
use Zend\Http\Request as HttpRequest;

abstract class AbstractRequest extends DataObject implements RequestInterface
{
    /** @property CronHelper $cronHelper */
    protected $cronHelper;

    /** @property JobInterface $cronJob */
    protected $cronJob;

    /** @property HeadersInterface $headers */
    protected $headers;

    /** @property HttpRequest $request */
    protected $request;

    /** @property TransportInterface $transport */
    protected $transport;

    /**
     * @param CronHelper $cronHelper
     * @param JobInterface $cronJob
     * @param HeadersInterface $httpHeaders
     * @param RequestInterface $httpRequest
     * @param TransportInterface $transport
     */
    public function __construct(
        CronHelper $cronHelper,
        JobInterface $cronJob,
        HeadersInterface $headers,
        HttpRequest $request,
        TransportInterface $transport,
        array $data = []
    ) {
        $this->cronHelper = $cronHelper;
        $this->cronJob = $cronJob;
        $this->headers = $headers;
        $this->request = $request;
        $this->transport = $transport;

        parent::__construct($data);
    }

    /**
     * Get Zend HTTP request object.
     *
     * @return HttpRequest
     */
    public function getHttpRequest()
    {
        return $this->request;
    }

    /**
     * Set HTTP headers for request.
     *
     * @param array $headers
     * @return $this
     */
    public function setHeaders(array $headers = [])
    {
        $this->headers->addHttpHeaders($headers);
        $this->request->setHeaders($this->headers->getHttpHeaders());

        return $this;
    }

    /**
     * Set HTTP method for request.
     *
     * @param string $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->request->setMethod($method);

        return $this;
    }

    /**
     * Set HTTP endpoint URI.
     *
     * @param string $uri
     * @return $this
     */
    public function setUri($uri)
    {
        $this->request->setUri($uri);

        return $this;
    }

    /**
     * Execute request action.
     *
     * @return void
     */
    abstract public function execute();
}
