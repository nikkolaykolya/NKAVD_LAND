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
        $access_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImZhZGM3NWU3OTNlY2VhNjg5ZjYyNzYxNWU0MmM5NjBiZTlhMmUzYWU0ZDUzNTI1NDI5ODk0YzAwOWUwZmFhMTZhODRlYWRjN2Q2NWNjNmJjIn0.eyJhdWQiOiJmZWE0M2RlNi1mYzIwLTQwZjUtOTg5MC1hMzI0NjM1ZWRlNDAiLCJqdGkiOiJmYWRjNzVlNzkzZWNlYTY4OWY2Mjc2MTVlNDJjOTYwYmU5YTJlM2FlNGQ1MzUyNTQyOTg5NGMwMDllMGZhYTE2YTg0ZWFkYzdkNjVjYzZiYyIsImlhdCI6MTYzODQ4MjE1NSwibmJmIjoxNjM4NDgyMTU1LCJleHAiOjE2Mzg1Njg1NTUsInN1YiI6Ijc2OTEwODYiLCJhY2NvdW50X2lkIjoyOTg1NTAwMiwic2NvcGVzIjpbInB1c2hfbm90aWZpY2F0aW9ucyIsImNybSIsIm5vdGlmaWNhdGlvbnMiXX0.VsfizVK-_Y_qxnZE9GU5MHNjM9GCYdcAo483bt9bb1aEIsiJINHe7KB0XzKuryP7EHyXhUBDi_ebRTeOHsLltqQ3zcBPwJhVkkP4IwEJKAx7riYuG6etstKt_7ooHqRdtLkkeZwjevLb4y0KRRrS-d5NJPdxzgfHt6vcSYv7uimLr8822ci9YBMDPDkgkIlCsjbK-AdM0m5DJyN1Ig-Jdr2WcFU54qYft2kr4UHfyJGF7QWePJTfkVSWFblObZOGnXYCEsN6Fd2opKH2sZiq5VTMv9_nDIYhkZQPZu_77oL1pWlAYFXlXtMSeUqzVg4LoiAbB2Ifc_U6Oak31h1Adw';
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
        //        if ( curl_errno( $curl ) ) {

        //   print curl_error( $curl );

        //}

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
