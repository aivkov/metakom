<?php
use Ms\Site;
$arCities = Site::getCities();?>
<?php if(is_array($arCities) && !empty($arCities)):?>
    <?php if(count($arCities) == 1):?>
        <div class="header__city">
            <img src="/local/img/icons/pin-2.svg" alt="">

            <div class="header__city-city">
                <?=$arCities[0]?>
            </div>
        </div>
    <?php endif?>
<?php endif?>
