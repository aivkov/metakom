<?php
namespace AjaxRequest;


class Review extends \CAjaxRequest
{
    private $fileTypes = ['image/jpeg', 'image/png'];
    public function add() {
        if(!$this->validate()) {
            return;
        }
        return $this->addReview();
    }

    private function validate() {
        if(!$this->checkFile()) {
            return false;
        }

        if(!$this->arParams['name']) {
            $this->arResult = ['status' => 'error', 'message' => 'Не заполнено поле «Имя»'];
            return false;
        }

        if(!$this->arParams['message']) {
            $this->arResult = ['status' => 'error', 'message' => 'Не заполнено поле «Текст отзыва»'];
            return false;
        }
        return true;
    }

    private function checkFile() {
        $arFile = $_FILES['photo'];
        if(!$this->hasFile()) {
            return true;
        }

        if($arFile['size'] > 2 * 1024 * 1025) {
            $this->arResult = ['status' => 'error', 'message' => 'Превышен максимальный размер файла'];
            return false;
        }

        if(!in_array($arFile['type'], $this->fileTypes)) {
            $this->arResult = ['status' => 'error', 'message' => 'Неверный тип файла'];
            return false;
        }
        return true;
    }

    private function hasFile() {
        $arFile = $_FILES['photo'];
        if(isset($arFile) && $arFile['size']) {
            return true;
        }
        return false;
    }

    private function addReview() {
        $arFields = [
            'IBLOCK_ID' => $this->arParams['iblockId'],
            'NAME' => $this->arParams['name'],
            'ACTIVE' => 'N',
            'PREVIEW_TEXT' => $this->arParams['message'],
        ];
        if($this->arParams['sectionCode']) {
            $arSection = \CIBlockSection::GetList(
                [],
                [
                    'IBLOCK_ID' => $this->arParams['iblockId'],
                    'CODE' => $this->arParams['sectionCode']
                ]
            )->Fetch();

            if($arSection) {
                $arFields['IBLOCK_SECTION_ID'] = $arSection['ID'];
            }

        }

        if($this->hasFile()) {
            $arFields['PREVIEW_PICTURE'] = $_FILES['photo'];
        }
        $el = new \CIBlockElement;
        if($id = $el->Add($arFields)) {
            $this->arResult = [
                'status' => 'success',
                'message' => 'Ваш отзыв успешно сохранен и будет добавлен после проверки модератором',
                'id' => $id
            ];

        } else {
            $this->arResult = [
                'status' => 'error',
                'message' => 'Ошибка добавления отзыва. Повторите попытку позже'
            ];
            $this->arResult['eeeeeeeee'] = $el->LAST_ERROR;
        }


        $this->arResult['fields'] = $arFields;
    }
}