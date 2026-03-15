<?php

namespace Vendor\LayoutPresetBundle\Dca;

use Contao\Backend;
use Contao\DataContainer;
use Contao\Database;

class LayoutPresetOptions extends Backend
{
    public function getArticlesForSlotA(DataContainer $dc): array
    {
        return $this->getArticlesByPageField($dc, 'slotAPage');
    }

    public function getArticlesForSlotB(DataContainer $dc): array
    {
        return $this->getArticlesByPageField($dc, 'slotBPage');
    }

    protected function getArticlesByPageField(DataContainer $dc, string $field): array
    {
        if (!$dc->activeRecord || !$dc->activeRecord->{$field}) {
            return [];
        }

        $stmt = Database::getInstance()
            ->prepare('SELECT id, title, inColumn FROM tl_article WHERE pid=? ORDER BY sorting')
            ->execute((int) $dc->activeRecord->{$field});

        $options = [];

        while ($stmt->next()) {
            $label = $stmt->title;

            if ($stmt->inColumn) {
                $label .= ' [' . $stmt->inColumn . ']';
            }

            $options[(int) $stmt->id] = $label;
        }

        return $options;
    }
}
