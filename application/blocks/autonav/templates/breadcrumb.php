<?php defined('C5_EXECUTE') or die("Access Denied.");

$navItems = $controller->getNavItems(true); // Ignore exclude from nav
$c = Page::getCurrentPage();

if (count($navItems) > 0) {
    
    echo '<nav role="navigation" aria-label="breadcrumb">'; //opens the top-level menu
    echo '<ol class="breadcrumb">';
    echo '<li><i class="fa fa-home"></i> &nbsp; </li>';
    
    foreach ($navItems as $ni) {
        if ($ni->isCurrent) {
            echo '<li class="active">' . $ni->name . '</li>';
        } else {
            echo '<li><a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a> &nbsp; <i class="fa fa-chevron-right"></i> &nbsp; </li>';
        }
    }
    
    echo '</ol>';
    echo '</nav>'; //closes the top-level menu
    
} else if (is_object($c) && $c->isEditMode()) { ?>
    <div class="ccm-edit-mode-disabled-item"><?php echo t('Empty Auto-Nav Block.')?></div>
<?php }