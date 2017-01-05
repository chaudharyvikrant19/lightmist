<?php 
defined('_JEXEC') or die;
?>
</div>
<?php require_once dirname(__FILE__).'/footer/default.php'; ?>
<!-- <script src="components/com_virtuemart/assets/js/vmsite.js" type="text/javascript" ></script> -->
<?php if(!empty($customScriptLinks)) {
	echo '<!-- Template style js links -->';
	foreach ($customScriptLinks as $link) {
		echo '<script type="text/javascript" src="'.$link.'"></script>';
	}

} ?>

<!-- <script type="text/javascript" src="<?php echo $template_folder; ?>/js/custom.js" ></script> -->

</body>
</html>
