<?php
use Ms\Site;
$arCities = Site::getCities();
$arCities = array_unique($arCities);
?>
<?php if(is_array($arCities) && !empty($arCities)):?>
    <?php if(count($arCities) == 1):?>
        <div class="header__city">
            <img src="/local/img/icons/pin-2.svg" alt="">

            <div class="header__city-city">
                <?=$arCities[array_key_first($arCities)]?>
            </div>
        </div>
    <?php else:?>
        <div class="header__city header__city--select js-city-block">
            <img src="/local/img/icons/pin-2.svg" alt="">

            <div class="header__city-city js-toggle-city-popup">
                <?=$arCities[array_key_first($arCities)]?>
            </div>
            <div class="header__city-popup js-city-popup">
                <?php foreach($arCities as $id => $city):?>
                    <div class="header__city-popup-item js-select-city tab <?php if($id == array_key_first($arCities)):?> is-active<?php endif?>"
                         data-tab="contacts"
                         data-tab-id="contacts-<?=$id?>"><?=$city?></div>
                <?php endforeach?>
            </div>
        </div>
    <?php endif?>
<?php endif?>
