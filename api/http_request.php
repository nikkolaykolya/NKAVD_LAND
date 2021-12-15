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
        $access_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjRjZGE3ZWU2MTIxYzIxOWQzMmZlNDkzZWNmYzI3ZWE2NWNjZjk4NzU0NmI1ODI0NGFhNjdiNmQzOTAyZTNmYzAyMmY5ZDQwNWNlZWJhNmIxIn0.eyJhdWQiOiJmZWE0M2RlNi1mYzIwLTQwZjUtOTg5MC1hMzI0NjM1ZWRlNDAiLCJqdGkiOiI0Y2RhN2VlNjEyMWMyMTlkMzJmZTQ5M2VjZmMyN2VhNjVjY2Y5ODc1NDZiNTgyNDRhYTY3YjZkMzkwMmUzZmMwMjJmOWQ0MDVjZWViYTZiMSIsImlhdCI6MTYzOTQxMTU4MCwibmJmIjoxNjM5NDExNTgwLCJleHAiOjE2Mzk0OTc5ODAsInN1YiI6Ijc2OTEwODYiLCJhY2NvdW50X2lkIjoyOTg1NTAwMiwic2NvcGVzIjpbInB1c2hfbm90aWZpY2F0aW9ucyIsImNybSIsIm5vdGlmaWNhdGlvbnMiXX0.U58_agkaCtebQ2RjO2iVdT9oA819BZDCxzOINhNSr97bSqM4MUtChrbeMYkVIXhe3mLM-PDrlK2EiJxB7RPOzTVbCq9LiHpAX-O15zgNCqkF-xk7nYGbNTuNzFAh_FAedA_Wa_pPVFhJldn6xywnDXbIIsKk29INl3hPaG72yodeQsBQRJfuwPRQb49MY6KM-NHIr7XuGWdO8A13x2ZEezJfLEfmgFxi6-pbC0xgu1-vtwEelGtFkPMX0Xxupce9A9KCEqdpdb5gULMI7EdbzJn7OOVzciCmIRRGvBM_9Uw5CcuIWHLbk3tM69uID1CAryjdmJKxi0nsqUg6n4HiCw';

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
