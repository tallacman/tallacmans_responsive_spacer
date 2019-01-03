<?php defined("C5_EXECUTE") or die("Access Denied."); ?>
<div class="form-group">
  <p>Note: Sizes set for smaller screens cascade to the next highest breakpoint it those settings are left on "None".</p>
</div>

<div class="form-group">
    <?php echo $form->label($view->field('vsScreen'), t("Phones - Portrait Orientation")); ?>
    <?php echo isset($btFieldsRequired) && in_array('vsScreen', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php echo $form->select($view->field('vsScreen'), $vsScreen_options, $vsScreen, []); ?>
</div>

<div class="form-group">
    <?php echo $form->label($view->field('smScreen'), t("Phones - Landscape Orientation")); ?>
    <?php echo isset($btFieldsRequired) && in_array('smScreen', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php echo $form->select($view->field('smScreen'), $smScreen_options, $smScreen, []); ?>
</div>

<div class="form-group">
    <?php echo $form->label($view->field('mdScreen'), t("Tablets")); ?>
    <?php echo isset($btFieldsRequired) && in_array('mdScreen', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php echo $form->select($view->field('mdScreen'), $mdScreen_options, $mdScreen, []); ?>
</div>

<div class="form-group">
    <?php echo $form->label($view->field('dtScreen'), t("Desktops")); ?>
    <?php echo isset($btFieldsRequired) && in_array('dtScreen', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php echo $form->select($view->field('dtScreen'), $dtScreen_options, $dtScreen, []); ?>
</div>

<div class="form-group">
    <?php echo $form->label($view->field('vlScreen'), t("Very Large Screens")); ?>
    <?php echo isset($btFieldsRequired) && in_array('vlScreen', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php echo $form->select($view->field('vlScreen'), $vlScreen_options, $vlScreen, []); ?>
</div>
