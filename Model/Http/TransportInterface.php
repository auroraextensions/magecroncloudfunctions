<?php
/**
 * TransportInterface.php
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

interface TransportInterface
{
    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options);

    /**
     * @param RequestInterface $request
     * @return $this
     */
    public function send(RequestInterface $request);
}
