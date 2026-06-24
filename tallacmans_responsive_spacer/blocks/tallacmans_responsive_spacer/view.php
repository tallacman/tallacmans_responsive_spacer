<?php
defined('C5_EXECUTE') or exit('Access Denied.');

use Concrete\Core\Page\Page;

$c = Page::getCurrentPage();
?>

<div id="tallacmans-responsive-spacer-<?php echo (int) $bID; ?>" class="tallacmans-responsive-spacer">

<?php if ($c->isEditMode()) { ?>
    <div class="tallacmans-responsive-spacer__edit-label">
        <span><?php echo t('Responsive Spacer'); ?></span>
    </div>
<?php } ?>

</div>
