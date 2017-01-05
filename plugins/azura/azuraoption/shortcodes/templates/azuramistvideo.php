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
<div id="<?php echo $id; ?>">
    <div class="player" data-property="{videoURL:&#39;<?php echo $link; ?>&#39;,containment:&#39;#<?php echo $containment; ?>&#39;,startAt:<?php echo $startat; ?>, mute:<?php echo $mute==='1'?"true":"false"; ?>, autoPlay:<?php echo $autoplay==='1'?"true":"false"; ?>, showControls:<?php echo $showcontrols==='1'?"true":"false"; ?>}"></div>
</div>
<div id="video-controls" style="display: block;">
    <a class="fa fa-pause text-color color-border" id="video-play" href="#"></a>
    <br />
    <h6 class="text-color bold"><?php echo JTEXT::_('TPL_MIST_DEMO_VIDEO'); ?></h6>
</div>

