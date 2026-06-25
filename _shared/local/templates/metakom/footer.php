<?php
use Ms\Site;
?>

<?php $APPLICATION->IncludeFile('/includes/metakom/footer.php')?>

<script src="<?=CUtil::GetAdditionalFileURL('/local/js/imask.js')?>"></script>
<script src="<?=CUtil::GetAdditionalFileURL('/local/js/dadata.js')?>"></script>
<script src="<?=CUtil::GetAdditionalFileURL('/local/js/main.js')?>"></script>
<script src="<?=CUtil::GetAdditionalFileURL('/local/js/swiper.js')?>"></script>
<script src="<?=CUtil::GetAdditionalFileURL('/local/js/fancybox.js')?>"></script>
<script src="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . '/js/script.js')?>"></script>

<?=Site::getFooterScripts()?>

</body>
</html>


<div class="tubes">
    <table class="table">
        <tr>
            <th>Тип</th>
            <th>Описание</th>
            <th>Внешний вид</th>
            <th>Цена при замене,&nbsp;Р</th>
            <th>Цена доустановки,&nbsp;Р</th>
        </tr>
        <tr>
            <td>ТКП-05</td>
            <td>Стандартная</td>
            <td class="center">
                <a href="/upload/medialibrary/8ee/umi9e2o3c499sn7kbabs6x4mk3u13o3f.png" data-fancybox="gallery">
                    <img src="/upload/medialibrary/8ee/umi9e2o3c499sn7kbabs6x4mk3u13o3f.png" alt="" style="max-width: 200px">
                </a>
            </td>
            <td class="center">950</td>
            <td class="center">1 730</td>
        </tr>
        <tr>
            <td>ТКП-06</td>
            <td>Стандартная, с&nbsp;отключением</td>
            <td class="center">
                <a href="/upload/medialibrary/132/v1al39l38l0275trv6hgmc1swf8ijwht.png" data-fancybox="gallery">
                    <img src="/upload/medialibrary/132/v1al39l38l0275trv6hgmc1swf8ijwht.png" alt="" style="max-width: 200px">
                </a>
            </td>
            <td class="center">1 100</td>
            <td class="center">1 880</td>
        </tr>
        <tr>
            <td>ТКП-12М</td>
            <td>С отключением звука и световой индикацией</td>
            <td class="center">
                <a href="/upload/medialibrary/1e8/4x9cdxpjiltyzmjmux682dj23u2cwjgj.png" data-fancybox="gallery">
                    <img src="/upload/medialibrary/1e8/4x9cdxpjiltyzmjmux682dj23u2cwjgj.png" alt="" style="max-width: 200px">
                </a>
            </td>
            <td class="center">1 250</td>
            <td class="center">2 030</td>
        </tr>
        <tr>
            <td>ТКП-14М</td>
            <td>С отключением, световой индикацией, и регулятором громкости</td>
            <td class="center">
                <a href="/upload/medialibrary/230/f0s02rh2uz5h0gm0mt3fs9mxa0vso2qn.png" data-fancybox="gallery">
                    <img src="/upload/medialibrary/230/f0s02rh2uz5h0gm0mt3fs9mxa0vso2qn.png" alt="" style="max-width: 200px">
                </a>
            </td>
            <td class="center">1 400</td>
            <td class="center">2 180</td>
        </tr>
    </table>
</div>

<style>
    @media (max-width: 700px) {
        .tubes {
            max-width: 720px;
            overflow: auto;
        }
    }
</style>