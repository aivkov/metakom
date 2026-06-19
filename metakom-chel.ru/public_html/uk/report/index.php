<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД в Челябинске");
$APPLICATION->SetPageProperty("keywords", "Метаком Сервис, обслуживание, монтаж и ремонт домофонов, систем видеонаблюдения, СКУД в Челябинске");
$APPLICATION->SetPageProperty("title", "ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД в Челябинске");
$APPLICATION->SetTitle("Отчет по доходам и расходам");


CModule::IncludeModule("fileman");
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/fileman/classes/general/medialib.php");
CMedialib::Init();

$collections = CMedialibCollection::GetList([
    'arFilter' => ['PARENT_ID' => 3, 'ACTIVE' => 'Y', '!DESCRIPTION' => 'del'],
    'arOrder' => ['NAME' => 'ASC']
]);

foreach($collections as $key => $collection) {
    if(str_starts_with($collection['DESCRIPTION'], 'del')) {
        unset($collections[$key]);
    }
}
$collections = array_values($collections);

\Ms\Tools::extractKeys($collections);

$collectionIds = array_column($collections, 'ID');

$mediaItems = CMedialibItem::GetList([
    "types" => ["all"],
    "arCollections" => $collectionIds
]);

$years = [];
foreach ($mediaItems as $item) {
    $year = preg_replace('/[^\d]/', '', $item['DESCRIPTION']);
    $years[] = $year;
    $collectionId = $item['COLLECTION_ID'];
    $collections[$collectionId]['ITEMS'][$year] = $item;
}

$years = array_unique($years);
sort($years);


?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?php $APPLICATION->ShowTitle(false) ?></h1>
            <div class="table-block">
                <table class="table">
                    <tr>
                        <th class="nowrap">г. Челябинск</th>
                        <?php foreach ($years as $year): ?>
                            <th><?= $year ?></th>
                        <?PHP endforeach ?>
                    </tr>
                    <?php foreach ($collections as $collection): ?>
                        <tr>
                            <td class="nowrap"><?= $collection['NAME'] ?></td>
                            <?php foreach ($years as $year): ?>
                                <td class="center">
                                    <?php if ($item = $collection['ITEMS'][$year]): ?>
                                        <a href="<?= $item['PATH'] ?>">
                                            <img src="/local/img/icons/download.svg" alt="" style="width: 20px;">
                                        </a>
                                    <?php endif ?>
                                </td>
                            <?PHP endforeach ?>
                        </tr>
                    <?php endforeach ?>
                </table>

            </div>
        </div>
    </div>


<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>