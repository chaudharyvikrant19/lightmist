<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php 
	switch ($typephoto) {
		case 'flickr': ?>
		<div class="widget my-feeds">
            <div class="social-feed <?php if(empty($moduleclass_sfx)) { echo 'flickr-feed' ;} else echo $moduleclass_sfx.'_spec'; ?>"></div>
        </div>
		<script type="text/javascript">
		jQuery(function($){
			if( $(".my-feeds").length != 0 ) {
				/* ================ FLICKR FEED ================ */
				$(<?php if(!empty($moduleclass_sfx)) echo '".'.$moduleclass_sfx.'_spec"'; else echo '".flickr-feed"'; ?>).socialstream({
					socialnetwork: 'flickr',
					limit: <?php echo $flickrlimit; ?>,
					username: '<?php echo $flickruser; ?>'
				})
			}
		});
		</script>
		<?php break;

		case 'pinterest': ?>
		<div class="widget my-feeds">
            <div class="social-feed <?php if(empty($moduleclass_sfx)) { echo 'pinterest-feed' ;} else echo $moduleclass_sfx.'_spec'; ?>"></div>
        </div>
		<script type="text/javascript">
		jQuery(function($){
			if( $(".my-feeds").length != 0 ) {
				/* ================ FLICKR FEED ================ */
				$(<?php if(!empty($moduleclass_sfx)) echo '".'.$moduleclass_sfx.'_spec"'; else echo '".pinterest-feed"'; ?>).socialstream({
					socialnetwork: 'pinterest',
					limit: <?php echo $pinterestlimit; ?>,
					username: '<?php echo $pinterestuser; ?>'
				})
			}
		});
		</script>
		<?php break;

		case 'instagram': ?>
		<div class="widget my-feeds">
            <div class="social-feed <?php if(empty($moduleclass_sfx)) { echo 'instagram-feed' ;} else echo $moduleclass_sfx.'_spec'; ?>"></div>
        </div>
		<script type="text/javascript">
		jQuery(function($){
			if( $(".my-feeds").length != 0 ) {
				/* ================ FLICKR FEED ================ */
				$(<?php if(!empty($moduleclass_sfx)) echo '".'.$moduleclass_sfx.'_spec"'; else echo '".instagram-feed"'; ?>).socialstream({
					socialnetwork: 'instagram',
					limit: <?php echo $instagramlimit; ?>,
					username: '<?php echo $instagramuser; ?>'
				})
			}
		});
		</script>
		<?php break;

		case 'dribbble': ?>
		<div class="widget my-feeds">
            <div class="social-feed <?php if(empty($moduleclass_sfx)) { echo 'dribbble-feed' ;} else echo $moduleclass_sfx.'_spec'; ?>"></div>
        </div>
		<script type="text/javascript">
		jQuery(function($){
			if( $(".my-feeds").length != 0 ) {
				/* ================ FLICKR FEED ================ */
				$(<?php if(!empty($moduleclass_sfx)) echo '".'.$moduleclass_sfx.'_spec"'; else echo '".dribbble-feed"'; ?>).socialstream({
					socialnetwork: 'dribbble',
					limit: <?php echo $dribbblelimit; ?>,
					username: '<?php echo $dribbbleuser; ?>'
				})
			}
		});
		</script>
		<?php break;

		case 'picasa': ?>
		<div class="widget my-feeds">
            <div class="social-feed <?php if(empty($moduleclass_sfx)) { echo 'picasa-feed' ;} else echo $moduleclass_sfx.'_spec'; ?>"></div>
        </div>
		<script type="text/javascript">
		jQuery(function($){
			if( $(".my-feeds").length != 0 ) {
				/* ================ FLICKR FEED ================ */
				$(<?php if(!empty($moduleclass_sfx)) echo '".'.$moduleclass_sfx.'_spec"'; else echo '".picasa-feed"'; ?>).socialstream({
					socialnetwork: 'picasa',
					limit: <?php echo $picasalimit; ?>,
					username: '<?php echo $picasauser; ?>'
				})
			}
		});
		</script>
		<?php break;

		case 'youtube': ?>
		<div class="widget my-feeds">
            <div class="social-feed <?php if(empty($moduleclass_sfx)) { echo 'youtube-feed' ;} else echo $moduleclass_sfx.'_spec'; ?>"></div>
        </div>
		<script type="text/javascript">
		jQuery(function($){
			if( $(".my-feeds").length != 0 ) {
				/* ================ FLICKR FEED ================ */
				$(<?php if(!empty($moduleclass_sfx)) echo '".'.$moduleclass_sfx.'_spec"'; else echo '".youtube-feed"'; ?>).socialstream({
					socialnetwork: 'youtube',
					limit: <?php echo $youtubelimit; ?>,
					username: '<?php echo $youtubeuser; ?>'
				})
			}
		});
		</script>
		<?php break;
		
		default:
			# code...
			break;
	}

?>
