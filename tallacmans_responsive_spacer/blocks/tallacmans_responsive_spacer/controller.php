<?php

namespace Concrete\Package\TallacmansResponsiveSpacer\Block\TallacmansResponsiveSpacer;

defined('C5_EXECUTE') or exit('Access Denied.');

use Concrete\Core\Block\BlockController;
use Concrete\Core\Error\ErrorList\ErrorList;

class Controller extends BlockController
{
    protected $btFieldsRequired = ['Hbase', 'hUnits'];

    protected $btTable = 'btTallacmansResponsiveSpacer';

    protected $btInterfaceWidth = 500;

    protected $btInterfaceHeight = 750;

    protected $btIgnorePageThemeGridFrameworkContainer = false;

    protected $btCacheBlockRecord = true;

    protected $btCacheBlockOutput = true;

    protected $btCacheBlockOutputOnPost = true;

    protected $btCacheBlockOutputForRegisteredUsers = false;

    protected $btDefaultSet = 'basic';

    /** Allowed CSS unit values */
    protected $allowedUnits = ['px', 'rem', 'vw', 'vh', '%', 'em'];

    /** Breakpoint definitions: field, unit field, min-width */
    protected $breakpoints = [
        ['field' => 'smScreen',  'unitField' => 'smUnits',  'min' => 576],
        ['field' => 'mdScreen',  'unitField' => 'mdUnits',  'min' => 768],
        ['field' => 'lgScreen',  'unitField' => 'lgUnits',  'min' => 992],
        ['field' => 'xlScreen',  'unitField' => 'xlUnits',  'min' => 1200],
        ['field' => 'xxlScreen', 'unitField' => 'xxlUnits', 'min' => 1400],
    ];

    // ---------------------------------------------------------------
    // Block metadata
    // ---------------------------------------------------------------

    public function getBlockTypeDescription()
    {
        return t('Set different vertical spacing depending on the screen size.');
    }

    public function getBlockTypeName()
    {
        return t('Tallacmans Responsive Spacer');
    }

    // ---------------------------------------------------------------
    // Helpers
    // ---------------------------------------------------------------

    /**
     * Validate and return a safe CSS unit string.
     * Falls back to the supplied $default (or 'px') for legacy NULL rows.
     */
    protected function sanitizeUnit(?string $unit, string $default = 'px'): string
    {
        $unit = trim((string) $unit);
        return in_array($unit, $this->allowedUnits, true) ? $unit : $default;
    }

    /**
     * Parse a numeric height value, allowing up to 2 decimal places
     * (needed for rem, e.g. 1.5rem).  Returns '' for blank/invalid.
     */
    protected function parseHeight(string $raw): string
    {
        $raw = trim(str_replace(',', '.', $raw));
        if ($raw === '') {
            return '';
        }
        $n = floatval($raw);
        // Keep up to 2 decimal places; strip trailing zeros
        return rtrim(rtrim(number_format($n, 2, '.', ''), '0'), '.');
    }

    // ---------------------------------------------------------------
    // CSS generation
    // ---------------------------------------------------------------

    protected function generateStyles(): string
    {
        $id  = (int) $this->bID;
        $sel = "#tallacmans-responsive-spacer-{$id}";
        $css = '';

        // Base (xs / all screens)
        if ((string) $this->Hbase !== '') {
            $u    = $this->sanitizeUnit($this->hUnits);
            $val  = h($this->Hbase);
            $css .= "{$sel}{height:{$val}{$u}}\n";
        }

        // Responsive breakpoints — fall back to hUnits for legacy NULL rows
        $fallbackUnit = $this->sanitizeUnit($this->hUnits);

        foreach ($this->breakpoints as $bp) {
            $val = (string) $this->{$bp['field']};
            if ($val !== '') {
                $u    = $this->sanitizeUnit($this->{$bp['unitField']}, $fallbackUnit);
                $min  = (int) $bp['min'];
                $css .= "@media(min-width:{$min}px){{$sel}{height:" . h($val) . "{$u}}}\n";
            }
        }

        return $css;
    }

    // ---------------------------------------------------------------
    // Lifecycle hooks
    // ---------------------------------------------------------------

    public function onStart()
    {
        $this->set('app', $this->app);
    }

    public function view()
    {
        $this->addHeaderItem('<style>' . $this->generateStyles() . '</style>');
    }

    public function add()
    {
        $this->addEdit();
        $this->set('hUnits', 'vw');
        $this->set('Hbase', '5');
        $this->set('smScreen', '');
        $this->set('smUnits', 'vw');
        $this->set('mdScreen', '');
        $this->set('mdUnits', 'vw');
        $this->set('lgScreen', '');
        $this->set('lgUnits', 'vw');
        $this->set('xlScreen', '');
        $this->set('xlUnits', 'vw');
        $this->set('xxlScreen', '');
        $this->set('xxlUnits', 'vw');
    }

    public function edit()
    {
        $this->set('Hbase', $this->Hbase);
        $this->set('hUnits', $this->hUnits    ?: 'vw');
        $this->set('smScreen', $this->smScreen);
        $this->set('smUnits', $this->smUnits   ?: 'vw');
        $this->set('mdScreen', $this->mdScreen);
        $this->set('mdUnits', $this->mdUnits   ?: 'vw');
        $this->set('lgScreen', $this->lgScreen);
        $this->set('lgUnits', $this->lgUnits   ?: 'vw');
        $this->set('xlScreen', $this->xlScreen);
        $this->set('xlUnits', $this->xlUnits   ?: 'vw');
        $this->set('xxlScreen', $this->xxlScreen);
        $this->set('xxlUnits', $this->xxlUnits  ?: 'vw');
        $this->addEdit();
    }

    protected function addEdit()
    {
        $this->set('hUnits_options', array_combine($this->allowedUnits, $this->allowedUnits));
        $this->set('btFieldsRequired', $this->btFieldsRequired);
    }

    // ---------------------------------------------------------------
    // Save
    // ---------------------------------------------------------------

    public function save($args)
    {
        // Numeric height fields — allow 2 decimal places for rem etc.
        $heightFields = ['Hbase', 'smScreen', 'mdScreen', 'lgScreen', 'xlScreen', 'xxlScreen'];
        foreach ($heightFields as $f) {
            $args[$f] = $this->parseHeight($args[$f] ?? '');
        }

        // Unit fields — whitelist
        $unitFields = ['hUnits', 'smUnits', 'mdUnits', 'lgUnits', 'xlUnits', 'xxlUnits'];
        foreach ($unitFields as $u) {
            $args[$u] = $this->sanitizeUnit($args[$u] ?? '');
        }

        parent::save($args);
    }

    // ---------------------------------------------------------------
    // Validate
    // ---------------------------------------------------------------

    public function validate($args)
    {
        $e = $this->app->make(ErrorList::class);

        $checks = [
            'Hbase'     => t('Base Height'),
            'smScreen'  => t('Height on Phones (≥576px)'),
            'mdScreen'  => t('Height on Tablets (≥768px)'),
            'lgScreen'  => t('Height on Desktop (≥992px)'),
            'xlScreen'  => t('Height on XL Screens (≥1200px)'),
            'xxlScreen' => t('Height on XXL Screens (≥1400px)'),
        ];

        foreach ($checks as $field => $label) {
            $raw = trim($args[$field] ?? '');

            if ($raw !== '') {
                $num = floatval(str_replace(',', '.', $raw));

                if ($field === 'Hbase' && $num < 0.01) {
                    $e->add(t('The %s field must be greater than zero.', $label));
                }
                if ($num > 9999) {
                    $e->add(t('The %s field has a maximum of %s.', $label, 9999));
                }
            } elseif (in_array($field, $this->btFieldsRequired, true)) {
                $e->add(t('The %s field is required.', $label));
            }
        }

        return $e;
    }
}
