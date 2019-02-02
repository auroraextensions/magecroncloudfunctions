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

class Request extends AbstractRequest implements RequestInterface
{
    /**
     * Trigger Cloud Functions HTTP endpoint.
     *
     * @return void
     * @throws LocalizedException
     */
    public function execute()
    {
        /** @var string $httpEndpoint */
        $httpEndpoint = $this->cronHelper->getEndpointUrl($this->cronJob->getJobCode());

        if ($this->hasData('headers')) {
            $this->setHeaders($this->getData('headers'));
        } else {
            $this->setHeaders(Headers::$defaultHeaders);
        }

        $this->setMethod($this->cronJob->getHttpMethod());
        $this->setUri($httpEndpoint);

        if ($this->hasData('options')) {
            $this->transport->setOptions($this->getData('options'));
        } else {
            $this->transport->setOptions(Transport::$defaultOptions);
        }

        $this->transport->send($this);
    }
}
