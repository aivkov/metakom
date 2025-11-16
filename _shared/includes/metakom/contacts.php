<?php
use Ms\Tools;
use Ms\Site;
$addresses = Site::getAddresses();
?>
<div class="contacts">
    <?php $APPLICATION->IncludeFile('/includes/metakom/contacts-address.php')?>
    <?php foreach($addresses as $key => $address):?>
        <div class="tab-block <?php if(!$key):?> is-active<?php endif?>"
             data-tab-block="contacts" data-tab-block-id="contact-<?=$key + 1?>">
            <div class="contacts__main">
                <div class="contacts__map">
                    <iframe src="<?=Site::getMap($key)?>" width="100%" height="100%" frameborder="0"></iframe>
                </div>
                <div class="contacts__info">
                    <div class="contacts__contacts">
                        <?php if($phones = Site::getPhones($key)):?>
                            <div class="contacts__item contact">
                                <div class="contact__img">
                                    <img src="/local/img/icons/phone.svg" alt="">
                                </div>
                                <div>
                                    <div class="contact__title">Телефон<?php if(count($phones) > 1):?>ы<?php endif?></div>
                                    <?php foreach($phones as $phone):?>
                                        <div class="contact__contact">
                                            <a href="tel:<?=Tools::phoneToTel($phone)?>"><?=$phone?></a>
                                        </div>

                                    <?php endforeach?>
                                </div>
                            </div>
                        <?php endif?>

                        <?php if($emails = Site::getEmails($key)):?>
                            <div class="contacts__item contact">
                                <div class="contact__img">
                                    <img src="/local/img/icons/email.svg" alt="">
                                </div>
                                <div>
                                    <div class="contact__title">Почта</div>
                                    <?php foreach($emails as $email):?>
                                        <div class="contact__contact">
                                            <a href="mailto:<?=$email?>"><?=$email?></a>
                                        </div>
                                    <?php endforeach?>
                                </div>
                            </div>
                        <?php endif?>

                        <?php if($schedule = Site::getSchedule($key)):?>
                            <div class="contacts__item contact">
                                <div class="contact__img">
                                    <img src="/local/img/icons/clock.svg" alt="">
                                </div>
                                <div>
                                    <div class="contact__title">График работы</div>
                                    <?php foreach($schedule as $scheduleItem):?>
                                        <div class="contact__contact"><?=$scheduleItem?></div>
                                    <?php endforeach?>
                                </div>
                            </div>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach?>
</div>