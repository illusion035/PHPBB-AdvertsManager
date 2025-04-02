<?php
/**
 *
 * @package AdvertsManager
 * @copyright (c) 2025 Illusion
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace illusion\advertsmanager\acp;

class main_info
{
    public function module()
    {
        return array(
            'filename' => '\illusion\advertsmanager\acp\main_module',
            'title' => 'ACP_ADVERTS',
            'modes' => array(
                'settings' => array(
                    'title' => 'ACP_ADVERTS_MANAGER',
                    'auth' => 'ext_illusion/advertsmanager && acl_a_board',
                    'cat' => array('ACP_ADVERTS')
                ),
            ),
        );
    }
}