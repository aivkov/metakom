<?php
use Ms\Site;
$arLogo = Site::getLogo();
?>

<footer class="footer">
    <div class="footer__container container">
        <div class="footer__top">
            <a href="/" class="footer__logo logo logo--<?=Site::getLid()?>">
                <img src="<?=$arLogo['src']?>" alt="<?=$arLogo['alt']?>">
            </a>
            <?php $APPLICATION->IncludeFile('/includes/metakom/menu/footer.php')?>

            <?php $APPLICATION->IncludeFile('/includes/metakom/social.php')?>
        </div>
        <div class="footer__bottom">
            <div class="footer__copy">
                © <?=date('Y')?> Сайт является информационным ресурсом <?=Site::getSiteName()?>
            </div>
            <div class="footer__disclamer">Вся представленная на сайте информация носит исключительно информационный характер,
                и ни при каких условиях не является публичной офертой, определяемой положениями Статьи 437
                Гражданского кодекса Российской Федерации.</div>
        </div>
    </div>
</footer>

<?php $APPLICATION->IncludeFile('/includes/metakom/menu/mobile.php')?>