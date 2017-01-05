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
global $rowColumnsArray;

extract(cth_shortcode_atts(array(

   	'id'=>'',
   	'class' => '',
   	'wrapclass'=>'',
   	'columnwidthclass'=>'col-md-12',
   	

), $atts));
$colStyle = self::buildStyle($atts);
$animation_data = self::buildAnimation($atts,'animate');

//$animationData = $animation_data['data'];
$responsiveTxt = self::buildResponsive($atts);


$rowColumnsArray[] = array(
	'id'=>$id,
	'class'=>$class,
	'wrapclass'=>$wrapclass,
	'columnwidthclass'=>$columnwidthclass,
	'responsivetext'=>$responsiveTxt,

	'columnstyle'=> $colStyle,

	'animationtrigger'=>$animation_data['trigger'],
	'animationdata'=>$animation_data['data'],
	
	'content'=>$content
);
