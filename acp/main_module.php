<?php
/**
 *
 * @package AdvertsManager
 * @copyright (c) 2025 Illusion
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace illusion\advertsmanager\acp;

use illusion\advertsmanager\inc\constants;

class main_module
{
    public $u_action;
    public $tpl_name;
    public $page_title;

    public function main($id, $mode)
    {
        global $db, $template, $request, $user, $table_prefix;

        // Load both language files
        $user->add_lang_ext('illusion/advertsmanager', array('info_acp_adverts', 'acp_adverts'));

        $this->tpl_name = 'acp_adverts';
        $this->page_title = $user->lang('ACP_ADVERTS_MANAGER');

        // Add an advertisement
        if ($request->is_set_post('submit')) {
            if (!check_form_key('acp_adverts')) {
                trigger_error('FORM_INVALID', E_USER_WARNING);
            }

            $project_name = $request->variable('project_name', '', true);
            $banner_url = $request->variable('banner_url', '', true);
            $advert_url = $request->variable('advert_url', '', true);

            if (empty($project_name) || empty($banner_url) || empty($advert_url)) {
                trigger_error($user->lang('FORM_INCOMPLETE') . adm_back_link($this->u_action), E_USER_WARNING);
            }

            $sql_ary = array(
                'project_name' => $project_name,
                'banner_url' => $banner_url,
                'advert_url' => $advert_url,
            );

            $sql = 'INSERT INTO ' . $table_prefix . constants::ADVERTS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
            $db->sql_query($sql);

            trigger_error($user->lang('ADVERT_ADDED') . adm_back_link($this->u_action));
        }

        // Delete an advertisement
        if ($request->is_set('action') && $request->variable('action', '') == 'delete') {
            $advert_id = $request->variable('id', 0);

            if ($advert_id) {
                $sql = 'DELETE FROM ' . $table_prefix . constants::ADVERTS_TABLE . '
                        WHERE id = ' . (int) $advert_id;
                $db->sql_query($sql);

                trigger_error($user->lang('ADVERT_DELETED') . adm_back_link($this->u_action));
            }
        }

        // Display existing advertisements
        $sql = 'SELECT *
                FROM ' . $table_prefix . constants::ADVERTS_TABLE . '
                ORDER BY id DESC';
        $result = $db->sql_query($sql);

        while ($row = $db->sql_fetchrow($result)) {
            $template->assign_block_vars('adverts', array(
                'ID' => $row['id'],
                'PROJECT_NAME' => $row['project_name'],
                'BANNER_URL' => $row['banner_url'],
                'ADVERT_URL' => $row['advert_url'],
                'U_DELETE' => $this->u_action . '&amp;action=delete&amp;id=' . $row['id'],
            ));
        }
        $db->sql_freeresult($result);

        add_form_key('acp_adverts');

        $template->assign_vars(array(
            'U_ACTION' => $this->u_action,
        ));
    }
}