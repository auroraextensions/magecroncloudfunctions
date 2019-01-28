<?php
/**
 * RequestTest.php
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

namespace AuroraExtensions\MagentoCronCloudFunctions\Test\Unit\Model\Http;

use AuroraExtensions\MagentoCronCloudFunctions\Helper\Cron as CronHelper;
use AuroraExtensions\MagentoCronCloudFunctions\Helper\Dict;
use AuroraExtensions\MagentoCronCloudFunctions\Model\Cron\JobInterface;
use AuroraExtensions\MagentoCronCloudFunctions\Model\Http\Request;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;
use Zend\Http\Client as HttpClient;
use Zend\Http\Headers as HttpHeaders;
use Zend\Http\Request as HttpRequest;
use Zend\Http\Response as HttpResponse;

class RequestTest extends TestCase
{
    /** @property PHPUnit_Framework_MockObject_MockObject $cronHelperMock */
    protected $cronHelperMock;

    /** @property PHPUnit_Framework_MockObject_MockObject $cronHelperMock */
    protected $cronJobMock;

    /** @property PHPUnit_Framework_MockObject_MockObject $httpClientMock */
    protected $httpClientMock;

    /** @property PHPUnit_Framework_MockObject_MockObject $httpHeadersMock */
    protected $httpHeadersMock;

    /** @property PHPUnit_Framework_MockObject_MockObject $httpRequestMock */
    protected $httpRequestMock;

    /** @property Request $model */
    protected $model;

    protected function setUp()
    {
        $this->cronHelperMock = $this->createMock(CronHelper::class);
        $this->cronJobMock = $this->createMock(JobInterface::class);
        $this->httpClientMock = $this->createMock(HttpClient::class);
        $this->httpHeadersMock = $this->createMock(HttpHeaders::class);
        $this->httpRequestMock = $this->createMock(HttpRequest::class);

        $this->model = new Request(
            $this->cronHelperMock,
            $this->cronJobMock,
            $this->httpClientMock,
            $this->httpHeadersMock,
            $this->httpRequestMock
        );
    }

    public function testExecute()
    {
        $this->cronHelperMock->expects($this->once())
            ->method('getEndpointUrl')
            ->with('visitor_log_clean')
            ->willReturn('https://us-central1-project.cloudfunctions.net/visitor_log_clean');

        $this->model->execute();
    }
}
