<?php defined("C5_EXECUTE") or die("Access Denied."); ?>

<div class="tallacmans-responsive-spacer <?php echo $vsScreen_options[$vsScreen]; ?> <?php echo $smScreen_options[$smScreen]; ?> <?php echo $mdScreen_options[$mdScreen]; ?> <?php echo $dtScreen_options[$dtScreen]; ?> <?php echo $vlScreen_options[$vlScreen]; ?>">
</div>


<style media="screen">
  @media (min-width: 0) {
    .tallacmans-responsive-spacer{
      height: <?php echo $vsScreen_options[$vsScreen]; ?>;
    }
  }
 @media (min-width: 576px) {
   .tallacmans-responsive-spacer{
     height: <?php echo $smScreen_options[$smScreen]; ?>;
   }
 }
 @media (min-width: 768px) {
   .tallacmans-responsive-spacer{
     height: <?php echo $mdScreen_options[$mdScreen]; ?>;
   }
 }
 @media (min-width: 992px) {
   .tallacmans-responsive-spacer{
     height: <?php echo $lgScreen_options[$lgScreen]; ?>;
   }
 }
 @media (min-width: 1200px) {
   .tallacmans-responsive-spacer{
     height: <?php echo $vlScreen_options[$vlScreen]; ?>;
   }
 }
</style>

<?php
$c = Page::getCurrentPage(); //  copied this code from another source. but Im not disabling because it works in edit mode.
if ($c->isEditMode()) {
    ?>
    <div class="ccm-edit-mode-disabled-item" style="<?php echo isset($width) ? "width: $width;" : '' ?><?php echo isset($height) ? "height: $height;" : '' ?>">
        <div style="padding: 5px 0px 5px 0px"><?php echo t('Responsive Spacer - edit mode') ?></div>
    </div>
<?php } ?>
