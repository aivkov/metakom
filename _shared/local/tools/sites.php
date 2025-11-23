<?php
$files = scandir('./../../../');
$arSites = [];
foreach($files as $file) {
    $tail = substr($file, -3);
    if($tail == '.ru') {
        $arSites[] = $file;
    }
}
?>
<div style="max-width: 1200px;margin: 20px auto 0">
<?php foreach($arSites as $site):?>
    <div style="margin-bottom: 8px;">
        <a href="https://<?=$site?>" style="font-size: 20px; text-decoration: none"><?=$site?></a>
    </div>
<?php endforeach?>
</div>