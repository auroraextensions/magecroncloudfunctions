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
 * https://docs.auroraextensions.com/magento/extensions/2.x/magentocroncloudfunctions/LICENSE.txt
 *
 * @package       AuroraExtensions_MagentoCronCloudFunctions
 * @copyright     Copyright (C) 2019 Aurora Extensions <support@auroraextensions.com>
 * @license       MIT License
 */

namespace AuroraExtensions\MagentoCronCloudFunctions\Model\Cron;

class Job implements JobInterface
{
    /** @property string $jobCode */
    protected $jobCode;

    /**
     * @param string $jobCode
     * @return void
     */
    public function __construct($jobCode)
    {
        $this->jobCode = $jobCode;
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
}
