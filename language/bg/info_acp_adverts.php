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
    'ACP_ADVERTS' => 'Рекламен Мениджър',
    'ACP_ADVERTS_MANAGER' => 'Рекламен Мениджър',
    'ACP_ADVERTS_SETTINGS' => 'Настройки на реклами',

    // Main page
    'ACP_ADVERTS_MANAGER_EXPLAIN' => 'Добре дошли в Рекламния Мениджър. Тук можете да добавяте, редактирате и премахвате реклами от вашия форум.',
    'ADD_NEW_ADVERT' => 'Добави нова реклама',
    'PROJECT_NAME' => 'Име на проекта',
    'PROJECT_NAME_EXPLAIN' => 'Въведете име за идентифициране на тази реклама',
    'BANNER_URL' => 'URL на банера',
    'BANNER_URL_EXPLAIN' => 'Въведете URL адреса на вашия банер',
    'ADVERT_URL' => 'URL на рекламата',
    'ADVERT_URL_EXPLAIN' => 'Въведете URL адреса, към който ще бъдат пренасочени потребителите при кликване върху банера',
    'EXISTING_ADVERTS' => 'Съществуващи реклами',
    'NO_ADVERTS' => 'Няма намерени реклами',

    // Actions
    'SAVE_ADVERT' => 'Запази реклама',
    'RESET' => 'Изчисти формата',
    'DELETE' => 'Изтрий',
    'ACTIVE' => 'Активна',

    // Messages
    'ADVERT_ADDED' => 'Рекламата е добавена успешно',
    'ADVERT_DELETED' => 'Рекламата е изтрита успешно',
    'ADVERT_ERROR' => 'Грешка при обработката на рекламата',
));