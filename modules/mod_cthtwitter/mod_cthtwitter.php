<?php
defined('_JEXEC') or die;

// Include the syndicate functions only once

require_once __DIR__ . '/helper.php';

$twitter = new modCthTwitterHelper($params);

$data = $twitter->fetch();
$bgimage	 = $params->get('bgimage');
$twittslink	 = $params->get('twittslink');
$twittername	 = $params->get('twittername');

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_cthtwitter', $params->get('layout', 'default'));

