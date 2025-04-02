<?php
/**
 *
 * @package AdvertsManager
 * @copyright (c) 2025 Illusion
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace illusion\advertsmanager\migrations;

class release_1_0_0 extends \phpbb\db\migration\migration
{
    public function effectively_installed()
    {
        return $this->db_tools->sql_table_exists($this->table_prefix . 'adverts');
    }

    public static function depends_on()
    {
        return array('\phpbb\db\migration\data\v31x\v314');
    }

    public function update_schema()
    {
        return array(
            'add_tables' => array(
                $this->table_prefix . 'adverts' => array(
                    'COLUMNS' => array(
                        'id' => array('UINT', null, 'auto_increment'),
                        'project_name' => array('VCHAR:255', ''),
                        'banner_url' => array('VCHAR:255', ''),
                        'advert_url' => array('VCHAR:255', ''),
                    ),
                    'PRIMARY_KEY' => 'id',
                ),
            ),
        );
    }

    public function revert_schema()
    {
        return array(
            'drop_tables' => array(
                $this->table_prefix . 'adverts',
            ),
        );
    }

    public function update_data()
    {
        return array(
            // Add ACP modules
            array(
                'module.add',
                array(
                    'acp',
                    'ACP_CAT_DOT_MODS',
                    'ACP_ADVERTS_MANAGER'
                )
            ),
            array(
                'module.add',
                array(
                    'acp',
                    'ACP_ADVERTS_MANAGER',
                    array(
                        'module_basename' => '\illusion\advertsmanager\acp\main_module',
                        'modes' => array('settings'),
                    ),
                )
            ),
        );
    }
}