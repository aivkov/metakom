<?php
namespace AjaxRequest;


class Dadata extends \CAjaxRequest
{
    private $apiKey    = '9d215dc7239bcca22ce8f7b9002801b5b6fcb9ea';
    private $secretKey = '751f26f13548f76d808aace1dea2fc448acfde3c';
    private $url       = 'http://suggestions.dadata.ru/suggestions/api/4_1/rs/';

    private $methods = [
        'inn' => 'suggest/party',
        'bik' => 'suggest/bank',
        'address' => 'suggest/address',
    ];

    public function get ()
    {
        $params = [ 'query' => $this->arParams['query'] ];
        $this->url .= $this->methods[ $this->arParams['type'] ];
        $this->request( $params );
    }

    private function request ( $params )
    {
        $ch = curl_init( $this->url );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch, CURLOPT_HEADER, false );
        if ($params)
        {
            curl_setopt( $ch, CURLOPT_POST, 1 );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $params ) );
        }

        curl_setopt( $ch, CURLOPT_HTTPHEADER, [
                "Content-Type: application/json",
                "Accept: application/json",
                "Authorization: Token " . $this->apiKey,
                "X-Secret: " . $this->secretKey,
            ]
        );

        $result = curl_exec( $ch );
        curl_close( $ch );

        $this->arResult = json_decode( $result, true );
    }

}
