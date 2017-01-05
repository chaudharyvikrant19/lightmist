<?php 
/**
 * @package Azura Joomla Pagebuilder
 * @author Cththemes - www.cththemes.com
 * @date: 15-07-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */
defined('_JEXEC') or die;
extract(cth_shortcode_atts(array(
   	'id' => '',
   	'extraclass' => '',
   	'accountid'=>'37304598@N02',
   	'count'=>'6',
   	'viewtype'=>'grid',
   	'layout'=>''
), $atts));

if ($viewtype === 'colorbox') {
	AzuraJs::addStyle('flickr_colorbox','/components/com_azurapagebuilder/assets/plugins/jflickrfeed/colorbox/colorbox.css');
	AzuraJs::addJScript('flickr_colorbox','/components/com_azurapagebuilder/assets/plugins/jflickrfeed/colorbox/jquery.colorbox-min.js');
}else if($viewtype === 'cycle'){
	AzuraJs::addJScript('flickr_cycle','/components/com_azurapagebuilder/assets/plugins/jflickrfeed/cycle/jquery.cycle.all.min.js');
}

AzuraJs::addJScript('flickr','/components/com_azurapagebuilder/assets/plugins/jflickrfeed/jflickrfeed.min.js');

if(!empty($id)) {
	$id = 'id="'.$id.'"';
}
$classes = 'azura_flickr azura_flickr_'.$viewtype;

if(!empty($extraclass)) {
	$classes .= ' '.$extraclass;
}

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$flickrstyle = self::buildStyle($atts);

$flickrWrapperID = uniqid('flickr');

$classes = 'class="'.$classes.'"';

$flickrData = new stdClass;
$flickrData->accountid = $accountid;
$flickrData->count = $count;
$flickrData->viewtype = $viewtype;
$flickrData->wrapperid = $flickrWrapperID;

$flickrData = rawurlencode(json_encode($flickrData));
	
?>

<div <?php echo $classes.' '.$id.' '.$flickrstyle.' '.$animationData;?> data-flickr="<?php echo $flickrData;?>">
	<ul id="<?php echo $flickrWrapperID;?>" class="azura_flickr_wrapper flickr_<?php echo $viewtype;?>"></ul>
</div>

