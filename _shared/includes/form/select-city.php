<?php use Ms\Site;
global $APPLICATION;
$arCities = Site::getCitiesInForms() ?: [];
?>

<?php if(is_array($arCities) && !empty($arCities)):?>
    <div class="input-block">
        <label class="input-block__label">Город <sup>*</sup></label>
        <select class="input-block__select" name="city" data-required="">
            <option value="">---Выберите город---</option>
            <?php foreach($arCities as $city):?>
                <option value="<?=$city?>"><?=$city?></option>
            <?php endforeach?>
        </select>
    </div>
<?php endif?>