<?php if($curPage !== '/'):?>
</div> <?php /*container*/?>
</div> <?php /*page*/?>
<?php endif?>
<?php $APPLICATION->IncludeFile('/includes/metakom/footer.php')?>

<script src="<?=CUtil::GetAdditionalFileURL('/local/js/main.js')?>"></script>
<script src="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . '/js/script.js')?>"></script>
</body>
</html>