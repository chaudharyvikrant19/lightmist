<?php
/**
 * @package Hoxa - Responsive Multipurpose Joomla Template
 * @author Cththemes - www.cththemes.com
 * @date: 01-10-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

// no direct access
defined('_JEXEC') or die;
//jimport( 'joomla.application.module.helper' );

$menu = JFactory::getApplication()->getMenu();
$defaultMenu = $menu->getDefault();
$activeMenu = $menu->getActive() ? $menu->getActive() : $menu->getDefault();
$portfoliocols = '3';
$portfolio_style = 'masonry';
if($activeMenu->params->get('portfoliocols')){
	$portfoliocols = $activeMenu->params->get('portfoliocols','3');
}
if($activeMenu->params->get('portfolio_style')){
	$portfolio_style = $activeMenu->params->get('portfolio_style','masonry');
}

require_once JPATH_BASE.'/components/com_azurapagebuilder/helpers/elementparser.php';

function getItemTagsFilter($item, $implode = " "){
	require_once JPATH_BASE.'/components/com_k2/models/item.php';

	$K2ModelItem = new K2ModelItem;

    $tags = array();
	$itemTags = $K2ModelItem->getItemTags($item->id);
	if(count($itemTags)) {
		foreach ($itemTags as $tag) {
            $tagName = str_replace(" ", "-", $tag->name);
            $tags[] = strtolower($tagName);
        }
	}
    $filter = implode($implode, $tags);

    return $filter;
}

function getCats($catid=0){
    $db =  JFactory::getDbo();
    $query=$db->getQuery(true);
    array('a.published=1','a.trash=0');
    if((int)$catid!=0){
        $where ='a.catid='.(int)$catid;
    }
    $query 		->select('a.id')
        ->from('#__k2_items AS a')
        ->where($where)
        ->order('created ASC');
    $db->setQuery($query,0,'All');

    return $db->loadObjectList();
}

function getTagsFilter($catid){

	$items = getCats($catid);

	$catTags = array();

	$allTags = array();

	$tags = array();

	if(count($items)){


		require_once JPATH_BASE.'/components/com_k2/models/item.php';

		$K2ModelItem = new K2ModelItem;

		foreach ($items as $item) {
			$catTags[] = $K2ModelItem->getItemTags($item->id);
		}
		
		if(!empty($catTags)){
			foreach ($catTags as $catTag) {
				if (!empty($catTag)) {
					foreach ($catTag as $tag) {
						$allTags[] = $tag->name;
					}
				}
			}
		}

		$tags = array_unique($allTags);
	}
	return $tags;
}

$catid = $this->category->id;

$tagsFilter = getTagsFilter($catid);
?>
<?php if((isset($this->leading) || isset($this->primary) || isset($this->secondary) || isset($this->links)) && (count($this->leading) || count($this->primary) || count($this->secondary) || count($this->links))): ?>
	<?php if(!empty($this->category->description)) : ?>
		<?php echo $this->category->description;?>
	<?php endif;?>
	<?php if($portfolio_style == 'list'): ?>
		<!-- page-header -->
        <section id="works" class="page-section">
            <div class="container work-section">
                <?php if(isset($tagsFilter)):  ?>
				<div id="options" class="filter-menu">
				    <ul class="option-set nav black nav-pills">
				    	<li class="filter active" data-filter="all"><?php echo JTEXT::_('TPL_MIST_SHOW_ALL_TEXT'); ?></li>
			    		<?php foreach($tagsFilter as $tag): ?>
			    		<li class="filter" data-filter=".<?php echo strtolower(str_replace(" ","-",$tag)); ?>"><?php echo $tag; ?></li>
			      		<?php endforeach;  ?>
			    	</ul>
			    </div>
			    <?php endif;?>

                <div id="mix-container" class="portfolio-grid grid-list">
                	<?php if(isset($this->leading) && count($this->leading)): ?>
					<!-- Leading items -->
						<?php foreach($this->leading as $item): ?>

							<?php
								// Load category_item.php by default
								$this->item=$item;
								echo $this->loadTemplate('item');
							?>
						<?php endforeach; ?>
					<?php endif; ?>

					<?php if(isset($this->primary) && count($this->primary)): ?>
					<!-- Primary items -->
						<?php foreach($this->primary as $item): ?>

							<?php
								// Load category_item.php by default
								$this->item=$item;
								echo $this->loadTemplate('item');
							?>
						<?php endforeach; ?>
					<?php endif; ?>

					<?php if(isset($this->secondary) && count($this->secondary)): ?>
					<!-- Secondary items -->
						<?php foreach($this->secondary as $item): ?>
						
						
							<?php
								// Load category_item.php by default
								$this->item=$item;
								echo $this->loadTemplate('item');
							?>

						<?php endforeach; ?>
					<?php endif; ?>
                    
                </div>
                <!-- Mix Container -->
                <?php if($this->pagination->getPagesLinks()): ?>
				    <?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
				<?php endif; ?>
            </div>
        </section>
        <!-- works -->
	<?php else: ?>
		<?php if($portfolio_style == 'masonry_full_width' or $portfolio_style == 'masonry_wide_gutter'): ?>
		<section id="works" class="page-section">
		<?php endif; ?>
		<div class="mixed-grid<?php if($portfolio_style == 'masonry_gutter' or $portfolio_style == 'masonry_wide_gutter') echo ' pad'; ?>">
			<!-- Filter //-->
			<?php if(isset($tagsFilter)):  ?>
			<div class="filter-menu">
			    <ul class="nav black works-filters text-center" id="filters">
			    	<li class="filter active" data-filter=".all"><?php echo JTEXT::_('TPL_MIST_SHOW_ALL_TEXT'); ?></li>
		    		<?php foreach($tagsFilter as $tag): ?>
		    		<li class="filter" data-filter=".<?php echo strtolower(str_replace(" ","-",$tag)); ?>"><?php echo $tag; ?></li>
		      		<?php endforeach;  ?>
		    	</ul>
		    </div>
		    <?php endif;?>

			<div class="clearfix"></div>
	        <div class="masonry-grid grid-col-<?php echo $portfoliocols; ?>">
	            <div class="grid-sizer"></div>

				<?php if(isset($this->leading) && count($this->leading)): ?>
				<!-- Leading items -->
					<?php foreach($this->leading as $item): ?>

						<?php
							// Load category_item.php by default
							$this->item=$item;
							echo $this->loadTemplate('item');
						?>
					<?php endforeach; ?>
				<?php endif; ?>

				<?php if(isset($this->primary) && count($this->primary)): ?>
				<!-- Primary items -->
					<?php foreach($this->primary as $item): ?>

						<?php
							// Load category_item.php by default
							$this->item=$item;
							echo $this->loadTemplate('item');
						?>
					<?php endforeach; ?>
				<?php endif; ?>

				<?php if(isset($this->secondary) && count($this->secondary)): ?>
				<!-- Secondary items -->
					<?php foreach($this->secondary as $item): ?>
					
					
						<?php
							// Load category_item.php by default
							$this->item=$item;
							echo $this->loadTemplate('item');
						?>

					<?php endforeach; ?>
				<?php endif; ?> 

			</div>
		</div>

		<?php if($this->pagination->getPagesLinks()): ?>
		    <?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
		<?php endif; ?>
		<?php if($portfolio_style == 'masonry_full_width' or $portfolio_style == 'masonry_wide_gutter'): ?>
		</section>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>
