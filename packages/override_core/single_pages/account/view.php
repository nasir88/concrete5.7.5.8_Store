<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<script type="text/javascript">
$(function() {
	$('i.icon-question-sign').parent().tooltip();
});
</script>

<div class="row">
    <div class="col-sm-10">


        <?php foreach($pages as $p) { ?>
            <div>
                <a href="<?php echo $p->getCollectionLink()?>"><?php echo h(t($p->getCollectionName()))?></a>
                <?php
                $description = $p->getCollectionDescription();
                if ($description) { ?>
                    <p><?php echo h(t($description))?></p>
                <?php } ?>
            </div>
        <?php } ?>


        <?php
        $profileURL = $profile->getUserPublicProfileURL();
        if ($profileURL) { ?>
            <hr/>
            <div>
                <a href="<?php echo $profileURL?>"><?php echo t("View Public Profile")?></a>
                <p><?php echo t('View your public user profile and the information you are sharing.')?></p>
            </div>


        <?php } ?>

    </div>
</div>
