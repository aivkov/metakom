<?php
use Ms\Site;

$arSocial = Site::getSocial();?>

<?php if($arSocial):?>
<div class="social">
    <?php foreach($arSocial as $item):?>
        <a href="<?=$item['link']?>" class="social__item">
            <img src="/local/img/social/<?=$item['icon']?>" alt="">
        </a>
    <?php endforeach?>
</div>
<?php endif?>
