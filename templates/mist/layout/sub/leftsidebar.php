<?php 

defined('_JEXEC') or die;

?>
<!-- Intro start //-->

<section class="page-section">

    <div class="container">

        <div class="row">

            <!-- Sidebar start //-->

            <div class="col-lg-3 col-md-3 sidebar">

                <?php if($this->countModules('sidebar')) :?>
                    <jdoc:include type="modules" name="sidebar"  style="widget" />
                <?php endif;?>
                <?php if($this->countModules('position-7')) :?>
                    <jdoc:include type="modules" name="position-7" style="well" />
                <?php endif;?>

            </div>

            <!-- Sidebar end //-->

            <div class="clearfix hidden-md hidden-lg"></div>

            <div class="col-lg-9 col-md-9">

                <?php if ($this->countModules('position-1')) : ?>
                    <jdoc:include type="modules" name="position-1" style="none" />
                <?php endif;?>
                <?php if ($this->countModules('position-2')) : ?>
                    <jdoc:include type="modules" name="position-2" style="none" />
                <?php endif;?>

                <jdoc:include type="modules" name="position-3" style="xhtml" />
                <jdoc:include type="component" />

            </div>

        </div>

    </div>

</section>

<!-- Intro end //-->