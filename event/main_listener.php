<?php
/**
 *
 * @package AdvertsManager
 * @copyright (c) 2025 Illusion
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace illusion\advertsmanager\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use phpbb\db\driver\driver_interface;
use phpbb\template\template;
use phpbb\user;
use phpbb\config\config;
use illusion\advertsmanager\inc\constants;

class main_listener implements EventSubscriberInterface
{
    /** @var driver_interface */
    protected $db;

    /** @var template */
    protected $template;

    /** @var user */
    protected $user;

    /** @var config */
    protected $config;

    /** @var string */
    protected $table_prefix;

    /**
     * Constructor
     *
     * @param driver_interface $db
     * @param template $template
     * @param user $user
     * @param config $config
     * @param string $table_prefix
     */
    public function __construct(driver_interface $db, template $template, user $user, config $config, $table_prefix)
    {
        $this->db = $db;
        $this->template = $template;
        $this->user = $user;
        $this->config = $config;
        $this->table_prefix = $table_prefix;
    }

    /**
     * Assign functions defined in this class to event listeners in the core
     *
     * @return array
     */
    static public function getSubscribedEvents()
    {
        return array(
            'core.page_header_after' => 'display_advertisements',
        );
    }

    /**
     * Display random advertisements
     *
     * @return null
     */
    public function display_advertisements()
    {
        try {
            // Debug: Print table name
            $table_name = $this->table_prefix . constants::ADVERTS_TABLE;
            $this->template->assign_vars(array(
                'DEBUG_TABLE' => $table_name,
                'DEBUG_PREFIX' => $this->table_prefix,
                'DEBUG_ERROR' => '',
            ));

            // Check if table exists
            $sql = "SHOW TABLES LIKE '" . $this->db->sql_escape($table_name) . "'";
            $result = $this->db->sql_query($sql);
            $table_exists = (bool) $this->db->sql_fetchrow($result);
            $this->db->sql_freeresult($result);

            if (!$table_exists) {
                throw new \RuntimeException('Table does not exist: ' . $table_name);
            }

            // Get random advertisements
            $sql = 'SELECT * FROM ' . $table_name . ' ORDER BY RAND() LIMIT 2';
            $result = $this->db->sql_query($sql);

            $adverts = array();
            while ($row = $this->db->sql_fetchrow($result)) {
                $adverts[] = array(
                    'PROJECT_NAME' => $row['project_name'],
                    'BANNER_URL' => $row['banner_url'],
                    'ADVERT_URL' => $row['advert_url'],
                );
            }
            $this->db->sql_freeresult($result);

            // Debug: Print number of adverts found
            $this->template->assign_var('DEBUG_COUNT', count($adverts));

            // First assign if we have any adverts
            $this->template->assign_var('HAS_ADVERTS', !empty($adverts));

            // Then assign each advert
            foreach ($adverts as $advert) {
                $this->template->assign_block_vars('advert_row', array(
                    'PROJECT_NAME' => $advert['PROJECT_NAME'],
                    'BANNER_URL' => $advert['BANNER_URL'],
                    'ADVERT_URL' => $advert['ADVERT_URL'],
                ));
            }
        } catch (\Exception $e) {
            // Log the error and show debug info
            $this->template->assign_vars(array(
                'DEBUG_ERROR' => $e->getMessage(),
                'HAS_ADVERTS' => false,
                'DEBUG_COUNT' => 0,
            ));
        }
    }
}