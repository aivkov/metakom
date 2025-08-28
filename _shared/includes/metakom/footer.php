<footer class="footer">
    <div class="footer__container container">
        <div class="footer__top">
            <a href="/" class="footer__logo logo">
                <img src="/local/img/logo.png" alt="Метаком-сервис">
            </a>
            <?php $APPLICATION->IncludeFile('/includes/metakom/menu/footer.php')?>

            <?php $APPLICATION->IncludeFile('/includes/metakom/social.php')?>
        </div>
        <div class="footer__copy">
            © <?=date('Y')?> Сайт является информационным ресурсом Метаком сервис
        </div>
    </div>
</footer>