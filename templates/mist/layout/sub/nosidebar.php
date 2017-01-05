<?php 

defined('_JEXEC') or die;

?>
<!-- Intro start //-->

<section class="page-section">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                
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