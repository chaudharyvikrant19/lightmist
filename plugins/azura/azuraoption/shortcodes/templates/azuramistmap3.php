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

?>
<div class="map-section">
    <div class="map-canvas"
        data-zoom="<?php echo $zoom; ?>"
        data-lat="<?php echo $gmaplat; ?>"
        data-lng="<?php echo $gmaplog; ?>"            
        data-type="<?php echo $mapType; ?>"
        data-hue="<?php echo $hue; ?>"
        data-title="<?php echo $title; ?>"
        data-draggable="<?php echo $draggable=='1'?'true':'false'; ?>"
        data-content="<?php echo $content; ?>"                         
        style="height:<?php echo $height; ?>px">
    </div>
</div>