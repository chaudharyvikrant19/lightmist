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
require_once JPATH_SITE.'/components/com_k2/helpers/utilities.php';
extract(cth_shortcode_atts(array(
    'id'=>'',
    'category'=>'',
    'columns'=>'3',
    'limit'=>'All',
    'order'=>'created',
    'orderdir'=>'DESC',
    'extraclass' => '',
    'layout'=>''
), $atts));

if($category == '0' || $category =='') return false;

$items = ElementParser::getK2Items($category, $limit, $order, $orderdir,'','1');

$classes = "owl-carousel navigation-1 opacity text-left";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

$k2catviewstyle = self::buildStyle($atts);

if(!empty($class)){
    $classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
 
if(!empty($id)){
    $id = 'id="'.$id.'"';
}

$dataObj = new stdClass;

$dataObj = rawurlencode(json_encode($dataObj));

?>
<div <?php echo $id . ' ' .$classes.' '.$k2catviewstyle.' '.$animationData;?> data-pagination="false" data-items="4" data-autoplay="true" data-navigation="true">
    <?php if(count($items)) : ?>
        <?php foreach ($items as $key => $item) :
        $extraFields    = json_decode($item->extra_fields);?>
        <!-- Item <?php echo $key; ?> -->
        <div class="<?php echo $columns; ?> col-md-3 icons-hover-color bottom-xs-pad-20">
            <?php if(!empty($extraFields[1]->value)): ?>
            <div class="image">
                <img src="<?php echo JURI::root(true).$extraFields[1]->value; ?>" alt="" title="" width="270" height="270">
            </div>
            <?php endif; ?>
            <div class="description">
                <?php if($item->params->get('catItemTitle')): ?>                                
                <h4 class="post-title"><a href="<?php echo $item->link;?>"><?php echo $item->title;?></a></h4>
                <?php endif;?>                                 
                <p><?php echo strlen(strip_tags($item->introtext))>200 ? substr(strip_tags($item->introtext),0,200).'...': strip_tags($item->introtext);?></p>
            </div>
            <div class="meta">
               <span class="time"><i class="fa fa-calendar"></i><?php echo JHTML::_('date', $item->created, 'M.d.Y'); ?></span>                                
            </div>
        </div>
        <!-- Item <?php echo $key; ?> Ends-->
        <?php endforeach; ?>
    <?php endif;?>
</div>