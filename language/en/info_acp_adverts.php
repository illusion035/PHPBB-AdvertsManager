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

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
    'ACP_ADVERTS' => 'Advertisement Manager',
    'ACP_ADVERTS_MANAGER' => 'Advertisement Manager',
    'ACP_ADVERTS_SETTINGS' => 'Advertisement Settings',

    // Main page
    'ACP_ADVERTS_MANAGER_EXPLAIN' => 'Welcome to the Advertisement Manager. Here you can add, edit, and remove advertisements from your forum.',
    'ADD_NEW_ADVERT' => 'Add New Advertisement',
    'PROJECT_NAME' => 'Project Name',
    'PROJECT_NAME_EXPLAIN' => 'Enter a name to identify this advertisement',
    'BANNER_URL' => 'Banner URL',
    'BANNER_URL_EXPLAIN' => 'Enter the URL of your banner image',
    'ADVERT_URL' => 'Advertisement URL',
    'ADVERT_URL_EXPLAIN' => 'Enter the destination URL when users click the banner',
    'EXISTING_ADVERTS' => 'Existing Advertisements',
    'NO_ADVERTS' => 'No advertisements found',

    // Actions
    'SAVE_ADVERT' => 'Save Advertisement',
    'RESET' => 'Reset Form',
    'DELETE' => 'Delete',
    'ACTIVE' => 'Active',

    // Messages
    'ADVERT_ADDED' => 'Advertisement has been added successfully',
    'ADVERT_DELETED' => 'Advertisement has been deleted successfully',
    'ADVERT_ERROR' => 'Error processing advertisement request',
));