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
    'ACP_ADVERTS_MANAGER' => 'Управление на реклами',
    'ACP_ADVERTS_MANAGER_EXPLAIN' => 'Управлявайте рекламите във вашия форум тук.',
    'ADD_NEW_ADVERT' => 'Добави нова реклама',
    'PROJECT_NAME' => 'Име на проекта',
    'PROJECT_NAME_EXPLAIN' => 'Въведете името на проекта или компанията.',
    'BANNER_URL' => 'URL на банера (468x60)',
    'BANNER_URL_EXPLAIN' => 'Въведете URL на изображението на банера (трябва да бъде 468x60 пиксела).',
    'ADVERT_URL' => 'URL на рекламата',
    'ADVERT_URL_EXPLAIN' => 'Въведете URL, където потребителите ще бъдат пренасочени при кликване върху банера.',
    'EXISTING_ADVERTS' => 'Съществуващи реклами',
    'NO_ADVERTS' => 'Не са намерени реклами.',
    'ADVERT_ADDED' => 'Рекламата е добавена успешно.',
    'ADVERT_DELETED' => 'Рекламата е изтрита успешно.',
));