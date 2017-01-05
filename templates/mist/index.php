<?php
/**
 * @package Mist - Multi-Purpose HTML5 Responsive Joomla Template
 * @author Cththemes - www.cththemes.com
 * @date: 01-10-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

// Getting params from template
$params = &JFactory::getApplication()->getTemplate(true)->params;
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$title = $doc->getTitle();
$this->language = $doc->language;
$menu = $app->getMenu();
$defaultMenu = $menu->getDefault();
$activeMenu = $menu->getActive()? $menu->getActive() : $defaultMenu;
$template_folder = JURI::root(true).'/templates/'.$this->template;

$input = $app->input;
// $loadMooTools = $params->get('loadMooTools','0');
// if($loadMooTools == '0'){
//     unset($doc->_scripts[JURI::root(true)."/media/system/js/mootools-core.js"]);
// }
unset($doc->_scripts[JURI::root(true)."/components/com_azurapagebuilder/assets/js/azp-elements.min.js"]);

$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');//echo'<pre>';var_dump($itemid);
$sitename = $app->getCfg('sitename');


$favicon          = $params->get('favicon');
$logoImage        = $params->get('logoImage');
$bgmenu           = $params->get('bgmenu');
$logoText         = $params->get('logoText');
$logoType         = $params->get('logoType');
$logoWidth        = $params->get('logoWidth');
$logoHeight       = $params->get('logoHeight');
$showmenuicon     = $params->get('showmenuicon');

$darklight           = $params->get('darklight','light');
$layoutstyle         = $params->get('layoutstyle','rightsidebar');
$hideComponentErea   = $params->get('hideComponentErea','0');
$bodylayout          = $params->get('bodylayout','wide');
$bodybackgroundimage = $params->get('bodybackgroundimage','');
$bodybackgroundcolor = $params->get('bodybackgroundcolor','');

// Google fonts
$useDifferentFont = $params->get('useDifferentFont','0');
$bodyfont = $params->get('bodyfont','Arimo:300,400,700,400italic,700italic');
$bodyfontvariants = $params->get('bodyfontvariants',array());
$bodyfontfamily = $params->get('bodyfontfamily',"'Arimo:300,400,700,400italic,700italic', sans-serif;");
$headingfont = $params->get('headingfont','Oswald:400,300,700');
$headingfontvariants = $params->get('headingfontvariants',array());
$headingfontfamily = $params->get('headingfontfamily',"'Oswald:400,300,700', sans-serif;");


if(count($bodyfontvariants)){
    $bodyfont .= ':'.implode(",", $bodyfontvariants);
}
if(count($headingfontvariants)){
    $headingfont .= ':'.implode(",", $headingfontvariants);
}

// Color Presets				
$preset = $params->get('preset','color');
$overrideColor = $params->get('overrideColor','0');
$textColor = substr($params->get('textColor', '#ffc400'),1);
$borderColor = substr($params->get('borderColor', '#ffc400'),1);
$backgroundColor = substr($params->get('backgroundColor', '#ffc400'),1);

// custom style and script
$customStyleLinks = array();
$customScriptLinks = array();

$themePath = JPATH_THEMES.'/'.$this->template;
$themeLink = JURI::root(true).'/templates/'.$this->template;

$customCssLinks = array();
$cusCssLinks = $params->get('customcsslinks');
if(!empty($cusCssLinks)){
    $customCssLinks = explode(",", $cusCssLinks);
}

if(!empty($customCssLinks)){

    foreach ($customCssLinks as $css) {
        if(file_exists($themePath.$css)){
            $customStyleLinks[] = $themeLink.$css;
        }elseif(file_exists($themePath.'/css/'.$css)){
            $customStyleLinks[] = $themeLink.'/css/'.$css;
        }elseif(file_exists($themePath.'/stylesheet/'.$css)){
            $customStyleLinks[] = $themeLink.'/stylesheet/'.$css;
        }
        
    }
}

$customJsLinks = array();
$cusJsLinks = $params->get('customjslinks');
if(!empty($cusJsLinks)){
    $customJsLinks = explode(",", $cusJsLinks);
}

if(!empty($customJsLinks)){

    foreach ($customJsLinks as $js) {
        if(file_exists($themePath.$js)){
            $customScriptLinks[] = $themeLink.$js;
        }elseif(file_exists($themePath.'/js/'.$js)){
            $customScriptLinks[] = $themeLink.'/js/'.$js;
        }elseif(file_exists($themePath.'/script/'.$js)){
            $customScriptLinks[] = $themeLink.'/script/'.$js;
        }
        
    }
}
?>

<?php require_once dirname(__FILE__).'/layout/header.php'; ?>

<?php if ($this->countModules('position-4')) : ?>
	<jdoc:include type="modules" name="position-4" style="none" />
<?php endif;?>

<?php if ($this->countModules('position-5')) : ?>
	<jdoc:include type="modules" name="position-5" style="none" />
<?php endif;?>

<?php if ($this->countModules('position-6')) : ?>
	<jdoc:include type="modules" name="position-6" style="none" />
<?php endif;?>
<!-- Component erea -->
<?php if($hideComponentErea !=='1') {
	require_once dirname(__FILE__).'/layout/component.php';
} ?>

<?php if ($this->countModules('position-9')) : ?>
	<jdoc:include type="modules" name="position-9" style="none" />
<?php endif;?>

<?php require_once dirname(__FILE__).'/layout/footer.php'; ?>