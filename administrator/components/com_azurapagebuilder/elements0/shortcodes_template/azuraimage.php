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
		'id'=>'',
	   'alignment' => 'left',
	   'extraclass'=>'',
       'style'=>'',
       'bordercolor'=>'grey',
       'usepretty'=>'0',
       'largeimage'=>'',
       'imagelink'=>'',
       'src'=>'',
       'layout'=>''
 ), $atts));

$classes = "azura_image";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$imagestyle = self::buildStyle($atts);


if(!empty($extraclass)){
	$classes .= ' '.$extraclass;
}
$classes .= ' azura_align_'.$alignment;

$classes = 'class="'.$classes.'"';
 
if(!empty($id)){
	$id = 'id="'.$id.'"';
}
        
?>
<img <?php echo $id.' '.$classes.' '.$imagestyle.' '.$animationData;?>  alt="" src="<?php echo JURI::root(true).'/'.$src;?>">


		