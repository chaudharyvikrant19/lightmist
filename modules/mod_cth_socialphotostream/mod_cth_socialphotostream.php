<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$typephoto = $params->get('typephoto');

$flickruser = $params->get('flickruser');
$flickrlimit = $params->get('flickrlimit');

$pinterestuser = $params->get('pinterestuser');
$pinterestlimit = $params->get('pinterestlimit');

$instagramuser = $params->get('instagramuser');
$instagramlimit = $params->get('instagramlimit');

$dribbbleuser = $params->get('dribbbleuser');
$dribbblelimit = $params->get('dribbblelimit');

$youtubeuser = $params->get('youtubeuser');
$youtubelimit = $params->get('youtubelimit');

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_cth_socialphotostream', $params->get('layout', 'default'));
