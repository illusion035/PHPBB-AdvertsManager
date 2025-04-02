<?php
/**
 *
 * @package AdvertsManager
 * @copyright (c) 2025 Illusion
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

if (!defined('IN_PHPBB')) {
    exit;
}

if (empty($lang) || !is_array($lang)) {
    $lang = array();
}

$lang = array_merge($lang, array(
    'ACP_ADVERTS_MANAGER' => 'Advertisement Manager',
    'ACP_ADVERTS_MANAGER_EXPLAIN' => 'Manage your forum advertisements here.',
    'ADD_NEW_ADVERT' => 'Add New Advertisement',
    'PROJECT_NAME' => 'Project Name',
    'PROJECT_NAME_EXPLAIN' => 'Enter the name of the project or company.',
    'BANNER_URL' => 'Banner URL (468x60)',
    'BANNER_URL_EXPLAIN' => 'Enter the URL of the banner image (must be 468x60 pixels).',
    'ADVERT_URL' => 'Advertisement URL',
    'ADVERT_URL_EXPLAIN' => 'Enter the URL where users will be directed when clicking the banner.',
    'EXISTING_ADVERTS' => 'Existing Advertisements',
    'NO_ADVERTS' => 'No advertisements found.',
    'ADVERT_ADDED' => 'Advertisement has been added successfully.',
    'ADVERT_DELETED' => 'Advertisement has been deleted successfully.',
));