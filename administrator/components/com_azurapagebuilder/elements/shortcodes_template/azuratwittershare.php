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
   	// 'id' => '',
	'url'=>'',
   	'screenname' => '',
   	'related' => '',
   	'count' => 'horizontal',
   	'extraclass'=>'',
   	'layout'=>''
), $atts));


$classes = "azura_twitter twitter-share-button";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$twittersharestyle = self::buildStyle($atts);

if(!empty($extraclass)){
	$classes .= ' '.$extraclass;
}

$classes = 'class="'.$classes.'"';

// if(empty($url)){
// 	$url = JURI::root();
// }

// if(!empty($width)){
// 	$width = '&amp;width='.(int)$width;
// }

// if(!empty($height)){
// 	$height = '&amp;height='.(int)$height;
// }
?>

<div <?php echo $classes.' '.$twittersharestyle.' '.$animationData;?>>
	<a  class="twitter-share-button" href="http://twitter.com/share"
	<?php if(!empty($url)) :?>
	data-url="<?php echo $url;?>"
	<?php endif; 
	if(!empty($screenname)) :?>
	data-via="<?php echo $screenname;?>"
	<?php endif;
	if(!empty($content)) :?>
	data-text="<?php echo $content;?>"
	<?php endif;
	if(!empty($related)) :?>
	data-related="<?php echo $related;?>"
	<?php endif; ?>
	 data-count="<?php echo $count;?>"
	 >
	 <?php echo JText::_('COM_AZURAPAGEBUILDER_TWEET_TEXT');?></a>
	 <script type="text/javascript">
window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
</script>
	 <!--<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>-->
</div>