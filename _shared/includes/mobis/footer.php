<?php use Ms\Site;?>

<footer class="footer">
    <div class="container">
        <div class="footer__main">
            <div class="footer__left">
                <a href="/" class="footer__logo logo">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" alt="Мобис">
                </a>
            </div>
            <div class="footer__menu">
                <div class="footer__title extrafont">Системы безопасности</div>
                <?php $APPLICATION->IncludeFile('/includes/mobis/menu/footer.php')?>
            </div>


            <?php if($socials = Site::getSocial()):?>
                <div class="footer__social">
                    <div class="footer__title extrafont">Мы в соцсетях</div>
                    <?php $APPLICATION->IncludeFile('/includes/mobis/social.php')?>
                </div>
            <?php endif?>

        </div>
        <div class="footer__copy">
            &copy; Сайт является информационным ресурсом <?=Site::getSiteName()?>
        </div>
    </div>

</footer>
