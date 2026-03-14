<?php

namespace Vendor\LayoutPresetBundle\ContentElement;

use Contao\ArticleModel;
use Contao\ContentElement;
use Contao\ContentModel;
use Contao\Controller;
use Contao\ModuleModel;
use Contao\StringUtil;

class LayoutPresetElement extends ContentElement
{
    protected $strTemplate = 'layout_preset';

    protected function compile(): void
    {
        $this->Template->layoutPreset      = (string) $this->layoutPreset;
        $this->Template->layoutMode        = (string) $this->layoutMode;
        $this->Template->layoutAlign       = (string) $this->layoutAlign;
        $this->Template->layoutDivider     = (bool) $this->layoutDivider;
        $this->Template->layoutStackMobile = (bool) $this->layoutStackMobile;

        $areaA = $this->resolveSlot(
            (string) $this->slotAType,
            (int) $this->slotAArticle,
            (int) $this->slotAModule,
            (string) $this->slotAHtml
        );

        $areaB = $this->resolveSlot(
            (string) $this->slotBType,
            (int) $this->slotBArticle,
            (int) $this->slotBModule,
            (string) $this->slotBHtml
        );

        $this->Template->areaA = $areaA;
        $this->Template->areaB = $areaB;

        $this->Template->hasAreaA = trim((string) $areaA) !== '';
        $this->Template->hasAreaB = trim((string) $areaB) !== '';

        $this->Template->renderFirst = \in_array($this->layoutMode, ['right-left', 'bottom-top'], true)
            ? 'B'
            : 'A';
    }

    protected function resolveSlot(string $type, int $articleId, int $moduleId, string $html): string
    {
        switch ($type) {
            case 'article':
                return $this->renderArticle($articleId);

            case 'module':
                return $this->renderModule($moduleId);

            case 'html':
                return StringUtil::decodeEntities($html);
        }

        return '';
    }

    protected function renderArticle(int $articleId): string
    {
        if ($articleId <= 0) {
            return '';
        }

        $article = ArticleModel::findByPk($articleId);

        if (null === $article) {
            return '';
        }

        $elements = ContentModel::findPublishedByPidAndTable($article->id, 'tl_article');
        $buffer = '';

        if (null !== $elements) {
            while ($elements->next()) {
                $buffer .= $this->getContentElement($elements->id);
            }
        }

        return $buffer;
    }

    protected function renderModule(int $moduleId): string
    {
        if ($moduleId <= 0) {
            return '';
        }

        $module = ModuleModel::findByPk($moduleId);

        if (null === $module) {
            return '';
        }

        return Controller::getFrontendModule($moduleId);
    }
}
