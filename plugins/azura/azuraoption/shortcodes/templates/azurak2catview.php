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

global $accordionItemsArray;
$classes = 'accrodation';

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

if(!empty($class)){
    $classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
 
if(empty($id)){
    $id = uniqid();
}

if(is_int((int)$defaultactive)){
    $defaultactive = (int)$defaultactive;
}else{
    $defaultactive = 1;
}


?>

<div <?php echo $classes.' '.$bissk2catviewstyle; ?>>
    <?php if(count($items)) : ?>
    <p class="section-subtitle"><?php echo $title1; ?></p>

    <h2 class="section-title"><?php echo $title2; ?></h2>

    <div class="plugin-container riva-sorting project-sorting">

        <!-- Filter //-->

        <div class="filters">

            <span data-value="*" class="active"><?php echo ucfirst(JText::_('TPL_BISS_FILTER_SHOW_ALL_TEXT'));?></span>

            <?php if(isset($tagsFilter) && count($tagsFilter)): 
                foreach($tagsFilter as $key=>$tag): 
            ?>
            <span data-value="<?php echo strtolower(str_replace(" ","-",$tag)); ?>"><?php echo ucfirst($tag); ?></span>
            <?php endforeach; endif;?>

        </div>
        

        <div class="listing">

            <?php foreach ($items as $key => $item) : 
            $extraFields    = json_decode($item->extra_fields);?>

            <!-- Project item start //-->

            <article class="project-item <?php echo ElementParser::getK2ItemTagsFilter($item," ");?>">

                <!-- Post image //-->

                <figure>
                    <?php if(!empty($extraFields[1]->value)): ?>
                    <img src="<?php echo JURI::root(true).$extraFields[1]->value; ?>" alt="">
                    <?php endif; ?>

                    <figcaption>
                        <?php if(!empty($extraFields[1]->value)): ?>
                        <a href="<?php echo JURI::root(true).$extraFields[1]->value; ?>" class="zoom"><i class="fa fa-search"></i></a>
                        <?php endif; ?>
                        <a href="<?php echo ElementParser::getK2ItemLink($item->id,$item->alias,$item->catid,$item->categoryalias); ?>" class="title"><?php echo $item->title; ?></a>

                    </figcaption>           

                </figure>

                <!-- Project image //-->

            </article>

            <!-- Project item end //-->

            <?php endforeach; ?>

        </div>

    </div>
    <?php if(!empty($readallbutton)) :?>
    <p class="margin-top-40"><a href="<?php echo ElementParser::getK2CategoryLink($category);?>" class="biss-btn biss-btn-border-secondary"><?php echo $readallbutton; ?></a></p>
    <?php endif; ?>
    <?php endif; ?>
</div>
