<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<div id="nsr_main">
<main>

    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sidebar">
                <?php
                $a = new Area('Sidebar');
                $a->display($c);
                ?>
            </div>
            <div class="col-md-8 col-sm-offset-1 col-content">
                <?php
                $a = new Area('Main');
                $a->setAreaGridMaximumColumns(12);
                $a->display($c);
                ?>
            </div>
        </div>
    </div>

</main>

</div>

<?php  $this->inc('elements/footer.php'); ?>
