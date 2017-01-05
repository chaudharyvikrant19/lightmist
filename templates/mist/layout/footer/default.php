<?php 
defined('_JEXEC') or die;
$footerclass='';
if($footerstyle === '2')
	$footerclass = ' navbar-fixed-bottom ';
else if ($footerstyle === '3')
	$footerclass = ' hidden-footer ';
if($headerstyle === 'vertical_header_1' or $headerstyle === 'vertical_header_2')
	$footerclass .= ' side-nav-wrapper';
?>

<!-- request -->
<footer id="footer" class="<?php echo $footerclass; ?>">
	<?php if ($this->countModules('before-footer')) : ?>
		<jdoc:include type="modules" name="before-footer" style="none" />
	<?php endif; ?>
	<?php if ($this->countModules('footer-1') or $this->countModules('footer-2') or $this->countModules('footer-3') or $this->countModules('footer-4')):  ?>
    <div class="footer-widget<?php if($footerdarklight == 0) echo ' dark-section'; ?>">
        <div class="container">
            <div class="row">
            	<?php if($footercolumns === '4'): ?>
	                <?php if ($this->countModules('footer-1')): ?>
	                <div class="col-xs-12 col-sm-6 <?php echo $bootstrapsize1; ?> widget bottom-xs-pad-20">
	                	<jdoc:include type="modules" name="footer-1" style="mist_footer" />
	                </div>
					<?php endif; ?>
					<?php if ($this->countModules('footer-2')): ?>
					<div class="col-xs-12 col-sm-6 <?php echo $bootstrapsize2; ?> widget bottom-xs-pad-20">
						<jdoc:include type="modules" name="footer-2" style="mist_footer" />
					</div>
					<?php endif; ?>
					<?php if ($this->countModules('footer-3')): ?>
					<div class="col-xs-12 col-sm-6 <?php echo $bootstrapsize3; ?> widget">
						<jdoc:include type="modules" name="footer-3" style="mist_footer" />
					</div>
					<?php endif; ?>
					<?php if ($this->countModules('footer-4')): ?>
					<div class="col-xs-12 col-sm-6 <?php echo $bootstrapsize4; ?> widget newsletter bottom-xs-pad-20">
						<jdoc:include type="modules" name="footer-4" style="mist_footer" />
					</div>
					<?php endif; ?>
				<?php elseif($footercolumns === '3'): ?>
					<?php if ($this->countModules('footer-1')): ?>
					<div class="col-xs-12 col-sm-6 <?php echo $bootstrapsize1; ?> widget bottom-xs-pad-20">
	                	<jdoc:include type="modules" name="footer-1" style="mist_footer" />
	                </div>
					<?php endif; ?>
					<?php if ($this->countModules('footer-2')): ?>
					<div class="col-xs-12 col-sm-6 <?php echo $bootstrapsize2; ?> widget bottom-xs-pad-20">
						<jdoc:include type="modules" name="footer-2" style="mist_footer" />
					</div>
					<?php endif; ?>
					<?php if ($this->countModules('footer-3')): ?>
					<div class="col-xs-12 col-sm-6 <?php echo $bootstrapsize3; ?> widget">
						<jdoc:include type="modules" name="footer-3" style="mist_footer" />
					</div>
					<?php endif; ?>
				<?php elseif ($footercolumns === '2') : ?>
					<?php if ($this->countModules('footer-1')): ?>
					<div class="col-xs-12 col-sm-6 <?php echo $bootstrapsize1; ?> widget bottom-xs-pad-20">
	                	<jdoc:include type="modules" name="footer-1" style="mist_footer" />
	                </div>
					<?php endif; ?>
					<?php if ($this->countModules('footer-2')): ?>
					<div class="col-xs-12 col-sm-6 <?php echo $bootstrapsize2; ?> widget bottom-xs-pad-20">
						<jdoc:include type="modules" name="footer-2" style="mist_footer" />
					</div>
					<?php endif; ?>
				<?php else: ?>
					<?php if ($this->countModules('footer-1')): ?>
					<div class="col-xs-12 col-sm-6 <?php echo $bootstrapsize1; ?> widget bottom-xs-pad-20">
	                	<jdoc:include type="modules" name="footer-1" style="mist_footer" />
	                </div>
					<?php endif; ?>
				<?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if ($this->countModules('footer-copyright')): ?>
    <!-- footer-top -->
    <div class="copyright<?php if($footerdarklight == 0) echo ' dark-section'; ?>">
        <div class="container">
            <div class="row">
				<jdoc:include type="modules" name="footer-copyright" style="none" />
			</div>
        </div>
    </div>
    <!-- footer-bottom -->
	<?php endif; ?>
</footer>
<!-- footer -->

<!-- Scripts -->


<script type="text/javascript" src="<?php echo $template_folder; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/jquery.elevateZoom-3.0.8.min.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/hover-dropdown-menu.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/jquery.hover-dropdown-menu-addon.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/jquery.sticky.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/bootstrapValidator.min.js"></script>

<script type="text/javascript" src="<?php echo $template_folder; ?>/js/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/jquery.appear.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/effect.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/jquery.gridrotator.js"></script> 

<script type="text/javascript" src="<?php echo $template_folder; ?>/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/countdown.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/tweet/carousel.js"></script>
<script type="text/javascript"  src="<?php echo $template_folder; ?>/js/jquery.easypiechart.min.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/tweet/scripts.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/tweet/tweetie.min.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/isotope.min.js"></script> 
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/jquery.mb.YTPlayer.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/jquery.easy-ticker.min.js"></script>
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/socialstream.jquery.js"></script> 
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/imagesLoaded_plugin.js"></script> 
<script type="text/javascript" src="<?php echo $template_folder; ?>/js/custom.js"></script>
<!-- Scripts -->