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
    'img' => '',
    'width'=>'',
    'height'=>'',
    'title'=>'',
    'titlelink'=>'',
    'price'=>'',
    'option1'=>'',
    'option2'=>'',
    'option3'=>'',
    'layout'=>''
), $atts));

$classes = "work";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

$mistrealestateproductstyle = self::buildStyle($atts);

if(!empty($class)){
    $classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';

$col = 'col-md-4';
$count = 0;

if(!empty($option1))
	$count += 1; 
if(!empty($option2))
	$count += 1; 
if(!empty($option3))
	$count += 1; 
if($count == 1)
	$col = 'col-md-12';
elseif($count == 2)
	$col = 'col-md-6';
elseif($count == 3)
	$col = 'col-md-4';

?>

<div <?php echo $classes;?><?php echo $animationData;?>>
    <?php if(!empty($img)): ?>
    <img src="<?php echo JURI::root(true).'/'.$img; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="" /> 
	<?php endif; ?>
    <span class="shadow"></span>
    <div class="bg-hover"></div>
    <div class="work-title text-center">
        <a href="<?php echo $titlelink; ?>"><h3 class="title"><?php echo $title; ?></h3></a>
        <?php if(!empty($price)): ?>
        <a href="#" class="btn btn-default"><?php echo $price; ?></a>
    	<?php endif; ?>
    </div>
</div>
<?php if(!empty($option1) or !empty($option2) or !empty($option3) ): ?>
<div class="">
	<?php if(!empty($option1)): ?>
    <div class="<?php echo $col; ?> bg-gray border"><?php echo $option1; ?></div>
	<?php endif; 
	if(!empty($option2)): ?>
    <div class="<?php echo $col; ?> bg-gray border"><?php echo $option2; ?></div>
    <?php endif; 
	if(!empty($option3)): ?>
    <div class="<?php echo $col; ?> bg-gray border"><?php echo $option3; ?></div>
	<?php endif; ?>
</div>
<?php endif; ?>