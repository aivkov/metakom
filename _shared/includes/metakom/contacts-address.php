<?php
use Ms\Site;
$addresses = Site::getAddresses();?>

<?php if(is_array($addresses) && !empty($addresses)):?>
    <?php if(count($addresses) == 1):?>
        <div class="contacts__address">
            <img src="/local/img/icons/pin-2.svg" alt="">
            <div class="contacts__address-address"><?=$addresses[0]?></div>
        </div>
    <?php endif?>
<?php endif?>
