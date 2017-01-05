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

$animation_data = self::buildAnimation($atts,'animate');

$classes = $animation_data['trigger'];
$animationData = $animation_data['data'];

$htmlstyle = self::buildStyle($atts);

 
?>
<?php if(empty($htmlstyle)&& empty($classes)&&empty($animationData)):?>
	<?php echo ElementParser::do_shortcode($content);?>
<?php else :?>
<div <?php echo $classes.' '.$htmlstyle.' '.$animationData;?>>
  	<?php echo ElementParser::do_shortcode($content);?>
</div>
<?php endif;?>
