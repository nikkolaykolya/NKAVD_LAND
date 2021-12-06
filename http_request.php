<?php

class HTTPRequester {

    /**
    * @description Make HTTP-GET call
    * @param       $url
    * @param       array $data
    * @return      HTTP-Response body or an empty string if the request fails or is empty
    */
    public static function HTTPGet( $url, array $data ) {
        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_USERAGENT, 'amoCRM-oAuth-client/1.0' );
        curl_setopt( $curl, CURLOPT_URL, $url );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $curl, CURLOPT_HEADER, false );
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 1 );
        curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 2 );

        $response = curl_exec( $curl );
        curl_close( $curl );
        return $response;
        //Инициируем запрос к API и сохраняем ответ в переменную
    }
    /**
    * @description Make HTTP-POST call
    * @param       $url
    * @param       array $data
    * @return      HTTP-Response body or an empty string if the request fails or is empty
    */
    public static function HTTPPost( $url, array $data ) {
        $access_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJhY2JiM2YwYTVlZjE3YWQ3OTFjNTYwOTRjZWU1OTNmMDUxMWIzNDFiZTZjNzY4M2IxMjM1NmM1ZTJlZWU3OWJmZDZiOTdhM2IyNjgyNWFmIn0.eyJhdWQiOiJmZWE0M2RlNi1mYzIwLTQwZjUtOTg5MC1hMzI0NjM1ZWRlNDAiLCJqdGkiOiIyYWNiYjNmMGE1ZWYxN2FkNzkxYzU2MDk0Y2VlNTkzZjA1MTFiMzQxYmU2Yzc2ODNiMTIzNTZjNWUyZWVlNzliZmQ2Yjk3YTNiMjY4MjVhZiIsImlhdCI6MTYzODc5NzgwMywibmJmIjoxNjM4Nzk3ODAzLCJleHAiOjE2Mzg4ODQyMDMsInN1YiI6Ijc2OTEwODYiLCJhY2NvdW50X2lkIjoyOTg1NTAwMiwic2NvcGVzIjpbInB1c2hfbm90aWZpY2F0aW9ucyIsImNybSIsIm5vdGlmaWNhdGlvbnMiXX0.RM8z7J08HGlbH0Ft4sRzT9mEhwpS7Ria1fdQArV_bXYjxno2O_IoyHre8QHSsuyP5_FyEifiww71aPzO3mw38hi-hiyZ2-KTL0Ll9QCKXabPhttw5Y7nftqkWD3mcFGnN2DXeH09J3s6SSdyhP736g3n5EkhQ5oa01IHO8SEEknr95Dvo3p-R2VI_B0f60Hz1ocJjESKQtdgmU8agkYEk_r8wJxuT1uMvTgIK2QlU6a_1bas8XFld7v3H7vmAGOAGNKYaF-axR_V_5hW5nmf-2uTtycrTlmGg6V1kwmGIXKAKs9DOlKc1MBXH8b4POjmGHd7BgLZcO4uPHKqXICO2g';
        $headers = [
            'Content-Type:application/json',
            'Authorization: Bearer ' . $access_token
        ];

        $curl = curl_init();
        //Сохраняем дескриптор сеанса cURL
        /** Устанавливаем необходимые опции для сеанса cURL  */
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $curl, CURLOPT_CAINFO, 'cacert.pem' );

        curl_setopt( $curl, CURLOPT_USERAGENT, 'amoCRM-oAuth-client/1.0' );
        curl_setopt( $curl, CURLOPT_URL, $url );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $curl, CURLOPT_HEADER, false );
        curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, 'POST' );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, json_encode( $data ) );
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 1 );
        curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 2 );
        $response = curl_exec( $curl );
//                if ( curl_errno( $curl ) ) {
//
//           echo curl_error( $curl );
//
//        }

        curl_close( $curl );
        return $response;
    }
    /**
    * @description Make HTTP-PUT call
    * @param       $url
    * @param       array $data
    * @return      HTTP-Response body or an empty string if the request fails or is empty
    */
    public static function HTTPPut( $url, array $data ) {
        $query = \http_build_query( $data );
        $ch    = \curl_init();
        \curl_setopt( $ch, \CURLOPT_RETURNTRANSFER, true );
        \curl_setopt( $ch, \CURLOPT_HEADER, false );
        \curl_setopt( $ch, \CURLOPT_URL, $url );
        \curl_setopt( $ch, \CURLOPT_CUSTOMREQUEST, 'PUT' );
        \curl_setopt( $ch, \CURLOPT_POSTFIELDS, $query );
        $response = \curl_exec( $ch );
        \curl_close( $ch );
        return $response;
    }
    /**
    * @category Make HTTP-DELETE call
    * @param    $url
    * @param    array $data
    * @return   HTTP-Response body or an empty string if the request fails or is empty
    */
    public static function HTTPDelete( $url, array $data ) {
        $query = \http_build_query( $data );
        $ch    = \curl_init();
        \curl_setopt( $ch, \CURLOPT_RETURNTRANSFER, true );
        \curl_setopt( $ch, \CURLOPT_HEADER, false );
        \curl_setopt( $ch, \CURLOPT_URL, $url );
        \curl_setopt( $ch, \CURLOPT_CUSTOMREQUEST, 'DELETE' );
        \curl_setopt( $ch, \CURLOPT_POSTFIELDS, $query );
        $response = \curl_exec( $ch );
        \curl_close( $ch );
        return $response;
    }
}
