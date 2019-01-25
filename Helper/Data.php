<?php
/**
 * Data.php
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License, which
 * is bundled with this package in the file LICENSE.txt.
 *
 * It is also available on the Internet at the following URL:
 * https://docs.auroraextensions.com/magento/extensions/2.x/magentocroncloudfunctions/LICENSE.txt
 *
 * @package        AuroraExtensions_MagentoCronCloudFunctions
 * @copyright      Copyright (C) 2019 Aurora Extensions <support@auroraextensions.com>
 * @license        MIT License
 */

namespace AuroraExtensions\MagentoCronCloudFunctions\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Data extends AbstractHelper
{
    /**
     * Check if module is enabled or not.
     *
     * @param string $scope
     * @return bool
     */
    public function isEnabled($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->isSetFlag(
            Dict::XML_PATH_FIELD_GENERAL_ENABLE_MODULE,
            $scope
        );
    }

    /**
     * Get GCP project name.
     *
     * @param string $scope
     * @return string
     */
    public function getGoogleCloudProjectName($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            Dict::XML_PATH_FIELD_GENERAL_GCP_PROJECT_NAME,
            $scope
        );
    }

    /**
     * Get Cloud Functions region.
     *
     * @param string $scope
     * @return string
     */
    public function getCloudFunctionsRegion($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            Dict::XML_PATH_FIELD_GENERAL_CLOUD_FUNC_REGION,
            $scope
        );
    }

    /**
     * Get authentication token set by administrator.
     *
     * @param string $scope
     * @return string
     */
    public function getAuthToken($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            Dict::XML_PATH_FIELD_GENERAL_AUTH_TOKEN,
            $scope
        );
    }
}
