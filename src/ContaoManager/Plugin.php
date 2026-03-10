<?php

namespace Vendor\LayoutPresetBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Vendor\LayoutPresetBundle\LayoutPresetBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(LayoutPresetBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
