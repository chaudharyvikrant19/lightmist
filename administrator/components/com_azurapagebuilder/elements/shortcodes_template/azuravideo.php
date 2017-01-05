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
    'class'=>'',
    'autoplay'=>'0',
    'loop'=>'0',
    'width'=>'',
    'height'=>'',
    'fitvids'=>'0',
    'layout' => ''
), $atts));

if($fitvids === '1'){
    if(JFactory::getApplication()->isSite()){
        AzuraJs::addJScript('fitvids','/components/com_azurapagebuilder/assets/plugins/FitVids/jquery.fitvids.js');
    }
}

$video = parse_url($content);

switch($video['host']) {
    case 'youtu.be':
        $vid = trim($video['path'],'/');
        $src = 'https://www.youtube.com/embed/' . $vid;
    break;
    
    case 'www.youtube.com':
    case 'youtube.com':
        parse_str($video['query'], $query);
        $vid = $query['v'];
        $src = 'https://www.youtube.com/embed/' . $vid;
    break;
    
    case 'vimeo.com':
    case 'www.vimeo.com':
        $vid = trim($video['path'],'/');
        $src = "http://player.vimeo.com/video/{$vid}";
}

$classes = 'azura_video';

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$videostyle = self::buildStyle($atts);

if(!empty($class)){
    $classes = ' '.$class;
}

if($fitvids === '1'){
    $classes .= ' azura_video_fitvids';
}elseif($fitvids === '2'){
	$classes .= ' azura_video_responsive';
}

$classes = 'class="'.$classes.'"';
 
if(!empty($id)){
    $id = 'id="'.$id.'"';
}
?>
<?php
if($fitvids === '1'|| $fitvids === '2') :?>
<div <?php echo $id.' '.$classes.' '.$videostyle.' '.$animationData;?> >
    <iframe  src="<?php echo $src;?>?autoplay=<?php echo $autoplay;?>&amp;loop=<?php echo $loop;?>" ></iframe>
</div>
<?php else: ?>
    <iframe <?php echo $classes;?> src="<?php echo $src;?>?autoplay=<?php echo $autoplay;?>&amp;loop=<?php echo $loop;?>" width="<?php echo $width;?>" height="<?php echo $height;?>"></iframe>
<?php endif;?>