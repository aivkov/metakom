<?php
use Ms\Site;
?>

<?php if($socials = Site::getSocial()):?>
    <div class="social">
        <?php foreach($socials as $social):?>
            <a href="<?=$social['link']?>" target="_blank">
                <img src="/local/img/mobis/social/<?=$social['icon']?>" alt="">
            </a>
        <?php endforeach?>
    </div>
<?php endif?>