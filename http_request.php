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
        $access_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjMyYjU5MDVhNGI3YzBiNGE3MmQ4MzgzZWY5YzI2MDE0NDI0OWU5YjQ4MjEyZmM0NDlkYzkzYzg2MmJhZjdmOGViZTY1MjFjMzMyZGMwMmIyIn0.eyJhdWQiOiJmZWE0M2RlNi1mYzIwLTQwZjUtOTg5MC1hMzI0NjM1ZWRlNDAiLCJqdGkiOiIzMmI1OTA1YTRiN2MwYjRhNzJkODM4M2VmOWMyNjAxNDQyNDllOWI0ODIxMmZjNDQ5ZGM5M2M4NjJiYWY3ZjhlYmU2NTIxYzMzMmRjMDJiMiIsImlhdCI6MTYzODk1NDc0NCwibmJmIjoxNjM4OTU0NzQ0LCJleHAiOjE2MzkwNDExNDQsInN1YiI6Ijc2OTEwODYiLCJhY2NvdW50X2lkIjoyOTg1NTAwMiwic2NvcGVzIjpbInB1c2hfbm90aWZpY2F0aW9ucyIsImNybSIsIm5vdGlmaWNhdGlvbnMiXX0.FgJT_htUWue5_nPuLJq4RjTsmQA9l-HUobiXjWo44EhogBTVLq7Mhgnew4sS2ueOOM6voVJXEO2cdBRNPjI9JVwyf_DtIs__zwgnyJRx9wdV7zAW_XLlc3A21lC_H03GWTTsJpq4Rq7pqjcGFhLDjAEItmn5v96SrkFMoajFTudZZRbtqUK6nDlPTUuVhBoYc4PbrXYlFvWbMg3mnG0AR_zfSJ3GO-CGhx28VKG4pxGEaYNkNPj3DG_aMZDyZnrwC6iUmLAljb2uAuA-P4kDH7r6fMN9q0s6d-Y-IdvuXARFdzIowxHiUeq3VY8wxAJn-_IoZYtBX4Wb04bfTrPYHQ';
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
