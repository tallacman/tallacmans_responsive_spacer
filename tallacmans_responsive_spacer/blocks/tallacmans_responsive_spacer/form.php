<?php defined('C5_EXECUTE') or exit('Access Denied.'); ?>

<style>
.trs-form .trs-row {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 4px;
}
.trs-form .trs-row .trs-input {
    flex: 1 1 80px;
    min-width: 60px;
}
.trs-form .trs-row .trs-unit {
    flex: 0 0 90px;
    width: 90px;
}
.trs-form .trs-label {
    font-weight: 600;
    margin-bottom: 4px;
    display: block;
}
.trs-form .trs-breakpoint {
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 6px;
    padding: 12px 14px;
    margin-bottom: 10px;
}
.trs-form .trs-breakpoint.trs-base {
    border-color: #0d6efd;
    background: #eef4ff;
}
.trs-form .trs-badge {
    display: inline-block;
    font-size: 11px;
    font-weight: 600;
    background: #6c757d;
    color: #fff;
    border-radius: 4px;
    padding: 1px 6px;
    margin-left: 6px;
    vertical-align: middle;
}
.trs-form .trs-badge.trs-badge-primary {
    background: #0d6efd;
}
.trs-form small.text-muted {
    font-size: 12px;
    display: block;
    margin-top: 2px;
}
</style>

<div class="trs-form">

    <?php
    $breakpoints = [
        [
            'field'      => 'Hbase',
            'unitField'  => 'hUnits',
            'label'      => t('Base Height'),
            'badge'      => '< 576px',
            'badgeClass' => 'trs-badge-primary',
            'hint'       => t('Required. Applied on all screens unless overridden below.'),
            'required'   => true,
            'rowClass'   => 'trs-base',
        ],
        [
            'field'      => 'smScreen',
            'unitField'  => 'smUnits',
            'label'      => t('Small — Phones'),
            'badge'      => '≥ 576px',
            'hint'       => t('Optional. Leave blank to inherit from base.'),
            'required'   => false,
            'rowClass'   => '',
        ],
        [
            'field'      => 'mdScreen',
            'unitField'  => 'mdUnits',
            'label'      => t('Medium — Tablets'),
            'badge'      => '≥ 768px',
            'hint'       => t('Optional. Leave blank to inherit from smaller breakpoint.'),
            'required'   => false,
            'rowClass'   => '',
        ],
        [
            'field'      => 'lgScreen',
            'unitField'  => 'lgUnits',
            'label'      => t('Large — Desktop'),
            'badge'      => '≥ 992px',
            'hint'       => null,
            'required'   => false,
            'rowClass'   => '',
        ],
        [
            'field'      => 'xlScreen',
            'unitField'  => 'xlUnits',
            'label'      => t('Extra Large'),
            'badge'      => '≥ 1200px',
            'hint'       => null,
            'required'   => false,
            'rowClass'   => '',
        ],
        [
            'field'      => 'xxlScreen',
            'unitField'  => 'xxlUnits',
            'label'      => t('Extra Extra Large'),
            'badge'      => '≥ 1400px',
            'hint'       => null,
            'required'   => false,
            'rowClass'   => '',
        ],
    ];
    ?>

    <?php foreach ($breakpoints as $bp) : ?>
    <div class="trs-breakpoint <?php echo $bp['rowClass']; ?>">

        <label class="trs-label">
            <?php echo $bp['label']; ?>
            <span class="trs-badge <?php echo $bp['badgeClass'] ?? ''; ?>">
                <?php echo $bp['badge']; ?>
            </span>
            <?php if ($bp['required']) : ?>
                <span class="text-danger" title="<?php echo t('Required'); ?>"> *</span>
            <?php endif; ?>
        </label>

        <div class="trs-row">
            <?php echo $form->text(
                $view->field($bp['field']),
                ${$bp['field']} ?? '',
                [
                    'type'        => 'number',
                    'class'       => 'form-control trs-input',
                    'placeholder' => $bp['required'] ? t('e.g. 5') : t('blank = inherit'),
                    'min'         => $bp['required'] ? '0.01' : '0',
                    'max'         => '9999',
                    'step'        => '0.01',
                ]
            ); ?>
            <?php echo $form->select(
                $view->field($bp['unitField']),
                $hUnits_options,
                ${$bp['unitField']} ?? 'vw',
                ['class' => 'form-select trs-unit']
            ); ?>
        </div>

        <?php if (!empty($bp['hint'])) : ?>
            <small class="text-muted"><?php echo $bp['hint']; ?></small>
        <?php endif; ?>

    </div>
    <?php endforeach; ?>

</div>
