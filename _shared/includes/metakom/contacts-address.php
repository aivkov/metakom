<?php
use Ms\Site;
$addresses = Site::getAddresses(); ?>

<?php if(is_array($addresses) && !empty($addresses)):?>
    <?php if(count($addresses) == 1):?>
        <div class="contacts__address">
            <img src="/local/img/icons/pin-2.svg" alt="">
            <div class="contacts__address-address"><?=$addresses[0]?></div>
        </div>
    <?php else: ?>
        <?php foreach ($addresses as $key => $address):?>
            <a href="javascript:void(0)" class="contacts__address tab <?php if(!$key):?> is-active<?php endif?>"
               data-tab="contacts" data-tab-id="contact-<?=$key + 1?>">
                <img src="/local/img/icons/pin-2.svg" alt="">
                <div class="contacts__address-address"><?=$address?></div>
            </a>
        <?php endforeach?>
    <?php endif?>
<?php endif?>
