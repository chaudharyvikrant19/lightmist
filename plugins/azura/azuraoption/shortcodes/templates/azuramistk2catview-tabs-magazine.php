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

function getK2Cat($catid=0){
    $db =  JFactory::getDbo();
    $query=$db->getQuery(true);
    //$where = array('a.id=1');
    if((int)$catid!=0){
        $where ='a.id='.(int)$catid;
    }
    $query      ->select('a.id,a.name,a.alias,a.description')
        ->from('#__k2_categories AS a')
        ->where($where)
        ->order('a.ordering ASC');
    $db->setQuery($query,0,1);

    return $db->loadObject();
}

$catname = getK2Cat($category)->name;

?>

<div class="tabs">
    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#head" aria-expanded="true">
            <span class="open-sub"></span>
            <i class="fa icon-compose"></i><?php echo ' '.$catname; ?></a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="head" class="tab-pane fade active in">
            <div data-ride="carousel" class="carousel slide" id="carousel-example-generic">
                <div class="row">
                    <div class="col-md-8">
                    <!-- Wrapper for slides -->

                    <div class="owl-carousel pagination-1 light-switch pordetail" data-pagination="true" data-items="1" data-autoplay="true" data-navigation="false">
                        <?php if(count($items)) : ?>
                        <?php foreach ($items as $key => $item) :
                        $extraFields    = json_decode($item->extra_fields); 
                        if(!empty($extraFields[1]->value)): ?>
                        <div class="item">
                            <img width="700" height="319" title="" alt="" src="<?php echo JURI::root(true).$extraFields[1]->value; ?>" />
                            
                            <div class="carousel-caption top-margin-80 top-pad-60">
                                <p class="bg-black white"><a style="font-size:17px;" href="<?php echo $item->link;?>"><?php echo $item->title;?></a></p>
                            </div>
                        </div>
                            <?php endif;?>
                        <?php endforeach; ?>
                        <?php endif;?>
                    </div>

                    <!-- Controls -->
                    <a data-slide="prev" role="button" href="#carousel-example-generic" class="left carousel-control no-bg">
                    <span aria-hidden="true" class="fa fa-angle-left fa-2x"></span> 
                    <span class="sr-only"><?php echo JText::_('TPL_MIST_PREV_TEXT'); ?></span></a> 
                    <a data-slide="next" role="button" href="#carousel-example-generic" class="right carousel-control no-bg">
                    <span aria-hidden="true" class="fa fa-angle-right fa-2x"></span> 
                    <span class="sr-only"><?php echo JText::_('TPL_MIST_NEXT_TEXT'); ?></span></a></div>
                    <div class="col-md-4">
                        <ul class="list-group widget">
                            <?php if(count($items)) : ?>
                            <?php foreach ($items as $key => $item) :
                            $extraFields    = json_decode($item->extra_fields);?>
                            <li class="list-group-item"><a href="<?php echo $item->link;?>"><?php echo $item->title;?></a></li>
                            <?php endforeach; ?>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>