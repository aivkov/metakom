<?php
/** @var array $arParams */

use Ms\Tools;

$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . '/css/pagination.css'));

$nav = $arParams['NAV_RESULT'];?>

<?php if ($nav->NavPageCount > 1): ?>
    <div class="pagination">
        <?php /*<?php if ($nav->NavPageNomer < $nav->NavPageCount): ?>
            <button class="btn btn--secondary-blue pagination__more"
                    data-ajax-id="<?=$arParams['BX_AJAX_ID']?>"
                    data-current-page="<?=$nav->NavPageNomer?>"
                    data-show-more="<?=$nav->NavNum?>"
                    data-count-page="<?=$nav->NavPageCount?>">
                Показать еще
            </button>
        <?php endif ?>
 */?>
        <?php $count = 1 ?>
        <div class="pagination__list ">

            <?php if ($nav->NavPageNomer > 1): ?>
                <?php $url = Tools::getNavPaginationPath( $nav, $nav->NavPageNomer - 1 ) ?>
                <a href="<?=$url?>" class="btn">
                    «
                </a>
            <?php endif ?>

            <?php if ($nav->NavPageNomer - $count > 1): ?>
                <?php $url = Tools::getNavPaginationPath( $nav, 1 ) ?>
                <a href="<?=$url?>" class="btn
							<?php if ($nav->NavPageNomer == 1): ?> is-active<?php endif ?>">1</a>
            <?php endif ?>

            <?php if ($nav->NavPageNomer - $count > 2): ?>
                <?php
                $page = floor( $nav->NavPageNomer / 2 );
                $url = Tools::getNavPaginationPath( $nav, $page );
                ?>
                <a href="<?=$url?>" class="pagination__dotted">...</a>
            <?php endif ?>

            <?php for ($page = $nav->NavPageNomer - $count; $page <= $nav->NavPageNomer + $count; $page++): ?>
                <?php if ($page < 1 || $page > $nav->NavPageCount)
                {
                    continue;
                }
                $url = Tools::getNavPaginationPath( $nav, $page ) ?>
                <a href="<?=$url?>" class="btn
							<?php if ($nav->NavPageNomer == $page): ?> is-active<?php endif ?>"><?=$page?></a>
            <?php endfor ?>

            <?php if ($nav->NavPageNomer + $count < $nav->NavPageCount - 1): ?>
                <?php
                $page = floor( ( $nav->NavPageCount + $nav->NavPageNomer + $count ) / 2 );
                $url = Tools::getNavPaginationPath( $nav, $page );
                ?>
                <a href="<?=$url?>" class="pagination__dotted">...</a>
            <?php endif ?>

            <?php if ($nav->NavPageNomer + $count < $nav->NavPageCount): ?>
                <?php $url = Tools::getNavPaginationPath( $nav, $nav->NavPageCount ) ?>
                <a href="<?=$url?>" class="btn
							<?php if ($nav->NavPageNomer == $nav->NavPageCount): ?> is-active<?php endif ?>"><?=$nav->NavPageCount?></a>
            <?php endif ?>

            <?php if ($nav->NavPageNomer < $nav->NavPageCount): ?>
                <?php $url = Tools::getNavPaginationPath( $nav, $nav->NavPageNomer + 1 ) ?>
                <a href="<?=$url?>" class="btn">
                    »
                </a>
            <?php endif ?>
        </div>
    </div>
<?php endif ?>
