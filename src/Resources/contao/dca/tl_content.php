<?php

use Vendor\LayoutPresetBundle\Dca\LayoutPresetOptions;

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'slotAType';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'slotBType';

$GLOBALS['TL_DCA']['tl_content']['palettes']['layout_preset']
    = '{type_legend},type,headline;'
    . '{layout_legend},layoutPreset,layoutMode,layoutAlign,layoutDivider,layoutStackMobile;'
    . '{slot_a_legend},slotAType;'
    . '{slot_b_legend},slotBType;'
    . '{protected_legend:hide},protected;'
    . '{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_content']['subpalettes']['slotAType_article'] = 'slotAPage,slotAArticle';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['slotAType_module']  = 'slotAModule';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['slotAType_html']    = 'slotAHtml';

$GLOBALS['TL_DCA']['tl_content']['subpalettes']['slotBType_article'] = 'slotBPage,slotBArticle';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['slotBType_module']  = 'slotBModule';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['slotBType_html']    = 'slotBHtml';

$GLOBALS['TL_DCA']['tl_content']['fields']['layoutPreset'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['layoutPreset'],
    'exclude'   => true,
    'inputType' => 'select',
    'options'   => ['about', 'contact', 'spotlight', 'default'],
    'eval'      => [
        'mandatory' => true,
        'chosen'    => true,
        'tl_class'  => 'w50',
    ],
    'sql'       => "varchar(32) NOT NULL default 'default'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['layoutMode'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['layoutMode'],
    'exclude'   => true,
    'inputType' => 'select',
    'options'   => ['left-right', 'right-left', 'top-bottom', 'bottom-top'],
    'eval'      => [
        'mandatory' => true,
        'chosen'    => true,
        'tl_class'  => 'w50',
    ],
    'sql'       => "varchar(32) NOT NULL default 'left-right'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['layoutAlign'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['layoutAlign'],
    'exclude'   => true,
    'inputType' => 'select',
    'options'   => ['start', 'center'],
    'eval'      => [
        'chosen'   => true,
        'tl_class' => 'w50',
    ],
    'sql'       => "varchar(16) NOT NULL default 'start'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['layoutDivider'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['layoutDivider'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => [
        'tl_class' => 'clr w50 m12',
    ],
    'sql'       => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['layoutStackMobile'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['layoutStackMobile'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => [
        'tl_class' => 'w50 m12',
    ],
    'sql'       => "char(1) NOT NULL default '1'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['slotAType'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['slotAType'],
    'exclude'   => true,
    'inputType' => 'select',
    'options'   => ['article', 'module', 'html'],
    'eval'      => [
        'mandatory'      => true,
        'chosen'         => true,
        'submitOnChange' => true,
        'tl_class'       => 'w50 clr',
    ],
    'sql'       => "varchar(16) NOT NULL default 'article'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['slotBType'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['slotBType'],
    'exclude'   => true,
    'inputType' => 'select',
    'options'   => ['article', 'module', 'html'],
    'eval'      => [
        'mandatory'      => true,
        'chosen'         => true,
        'submitOnChange' => true,
        'tl_class'       => 'w50 clr',
    ],
    'sql'       => "varchar(16) NOT NULL default 'article'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['slotAPage'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['slotAPage'],
    'exclude'   => true,
    'inputType' => 'pageTree',
    'eval'      => [
        'mandatory'      => true,
        'fieldType'      => 'radio',
        'submitOnChange' => true,
        'tl_class'       => 'w50 clr',
    ],
    'sql'       => "int(10) unsigned NOT NULL default 0",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['slotAArticle'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['slotAArticle'],
    'exclude'          => true,
    'inputType'        => 'select',
    'options_callback' => [LayoutPresetOptions::class, 'getArticlesForSlotA'],
    'eval'             => [
        'mandatory'          => true,
        'chosen'             => true,
        'includeBlankOption' => true,
        'tl_class'           => 'w50',
    ],
    'sql'              => "int(10) unsigned NOT NULL default 0",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['slotBPage'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['slotBPage'],
    'exclude'   => true,
    'inputType' => 'pageTree',
    'eval'      => [
        'mandatory'      => true,
        'fieldType'      => 'radio',
        'submitOnChange' => true,
        'tl_class'       => 'w50 clr',
    ],
    'sql'       => "int(10) unsigned NOT NULL default 0",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['slotBArticle'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['slotBArticle'],
    'exclude'          => true,
    'inputType'        => 'select',
    'options_callback' => [LayoutPresetOptions::class, 'getArticlesForSlotB'],
    'eval'             => [
        'mandatory'          => true,
        'chosen'             => true,
        'includeBlankOption' => true,
        'tl_class'           => 'w50',
    ],
    'sql'              => "int(10) unsigned NOT NULL default 0",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['slotAModule'] = [
    'label'      => &$GLOBALS['TL_LANG']['tl_content']['slotAModule'],
    'exclude'    => true,
    'inputType'  => 'select',
    'foreignKey' => 'tl_module.name',
    'eval'       => [
        'mandatory' => true,
        'chosen'    => true,
        'tl_class'  => 'w50 clr',
    ],
    'sql'        => "int(10) unsigned NOT NULL default 0",
    'relation'   => ['type' => 'belongsTo', 'load' => 'lazy'],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['slotBModule'] = [
    'label'      => &$GLOBALS['TL_LANG']['tl_content']['slotBModule'],
    'exclude'    => true,
    'inputType'  => 'select',
    'foreignKey' => 'tl_module.name',
    'eval'       => [
        'mandatory' => true,
        'chosen'    => true,
        'tl_class'  => 'w50 clr',
    ],
    'sql'        => "int(10) unsigned NOT NULL default 0",
    'relation'   => ['type' => 'belongsTo', 'load' => 'lazy'],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['slotAHtml'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['slotAHtml'],
    'exclude'   => true,
    'inputType' => 'textarea',
    'eval'      => [
        'allowHtml' => true,
        'rte'       => 'tinyMCE',
        'tl_class'  => 'clr',
    ],
    'sql'       => "mediumtext NULL",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['slotBHtml'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['slotBHtml'],
    'exclude'   => true,
    'inputType' => 'textarea',
    'eval'      => [
        'allowHtml' => true,
        'rte'       => 'tinyMCE',
        'tl_class'  => 'clr',
    ],
    'sql'       => "mediumtext NULL",
];
