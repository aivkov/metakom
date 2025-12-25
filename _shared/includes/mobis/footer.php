<footer class="footer">
    <div class="container">
        <div class="footer__main">
            <div class="footer__left">
                <div class="footer__logo logo">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" alt="Мобис">
                </div>
            </div>
            <div class="footer__menu">
                <div class="footer__title extrafont">Системы безопасности</div>
                <?php $APPLICATION->IncludeFile('/includes/mobis/menu/footer.php')?>
            </div>
            <div class="footer__social">
                <div class="footer__title extrafont">Мы в соцсетях</div>
                <?php $APPLICATION->IncludeFile('/includes/mobis/social.php')?>
            </div>

        </div>
        <div class="footer__copy">
            &copy; Сайт является информационным ресурсом Мобис
        </div>
    </div>

</footer>
