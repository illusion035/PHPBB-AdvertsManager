<?php
/**
 *
 * @package AdvertsManager
 * @copyright (c) 2025 Illusion
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace illusion\advertsmanager;

class ext extends \phpbb\extension\base
{
    public function is_enableable()
    {
        $config = $this->container->get('config');
        return version_compare($config['version'], '3.2.0', '>=');
    }
}