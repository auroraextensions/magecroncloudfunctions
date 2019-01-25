<?php
/**
 * Dict.php
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

namespace AuroraExtensions\MagentoCronCloudFunctions\Helper;

class Dict
{
    /** @constant GCF_BASE_URI */
    const GCF_BASE_URI = '.cloudfunctions.net';
    const GCP_DEFAULT_REGION = 'us-central1';

    /** @constant XML_PATH_FIELD_GENERAL_ENABLE_MODULE */
    /** @constant XML_PATH_FIELD_GENERAL_GCP_PROJECT_NAME */
    /** @constant XML_PATH_FIELD_GENERAL_CLOUD_FUNC_REGION */
    /** @constant XML_PATH_FIELD_GENERAL_AUTH_TOKEN */
    const XML_PATH_FIELD_GENERAL_ENABLE_MODULE = 'magentocroncloudfunctions/general/enable_module';
    const XML_PATH_FIELD_GENERAL_GCP_PROJECT_NAME = 'magentocroncloudfunctions/general/gcp_project';
    const XML_PATH_FIELD_GENERAL_CLOUD_FUNC_REGION = 'magentocroncloudfunctions/general/cloud_functions_region';
    const XML_PATH_FIELD_GENERAL_AUTH_TOKEN = 'magentocroncloudfunctions/general/auth_token';
}
