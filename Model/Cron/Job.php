<?php
/**
 * Job.php
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

namespace AuroraExtensions\MageCronCloudFunctions\Model\Cron;

use Zend\Http\Request as HttpRequest;

class Job implements JobInterface
{
    /** @property string $jobCode */
    protected $jobCode;

    /** @property string $httpMethod */
    protected $httpMethod;

    /**
     * @param string $jobCode
     * @param string|null $httpMethod
     * @return void
     */
    public function __construct($jobCode, $httpMethod = null)
    {
        $this->jobCode = $jobCode;
        $this->httpMethod = $httpMethod ?? HttpRequest::METHOD_POST;
    }

    /**
     * Get job code identifier.
     *
     * @return string
     */
    public function getJobCode()
    {
        return $this->jobCode;
    }

    /**
     * Get HTTP method used for trigger.
     *
     * @return string
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }
}
