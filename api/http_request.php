<?php

class HTTPRequester
{

    /**
     * @description Make HTTP-GET call
     * @param       $url
     * @param array $data
     * @return bool|string
     */
    public static function HTTPGet($url, array $data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-oAuth-client/1.0');
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    /**
     * @description Make HTTP-POST call
     * @param       $url
     * @param array $data
     * @return bool|string
     */
    public static function HTTPPost($url, $access_token, array $data)
    {

        $headers = [
            'Content-Type:application/json',
            'Authorization: Bearer ' . $access_token
        ];

        $curl = curl_init();
        //Сохраняем дескриптор сеанса cURL
        /** Устанавливаем необходимые опции для сеанса cURL  */
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_CAINFO, 'cacert.pem');

        curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-oAuth-client/1.0');
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            echo curl_error($curl);
        }

        curl_close($curl);
        return $response;
    }

    /**
     * @description Make HTTP-PUT call
     * @param       $url
     * @param array $data
     * @return      bool|string body or an empty string if the request fails or is empty
     */
    public static function HTTPPut($url, array $data)
    {
        $query = \http_build_query($data);
        $ch = \curl_init();
        \curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, \CURLOPT_HEADER, false);
        \curl_setopt($ch, \CURLOPT_URL, $url);
        \curl_setopt($ch, \CURLOPT_CUSTOMREQUEST, 'PUT');
        \curl_setopt($ch, \CURLOPT_POSTFIELDS, $query);
        $response = \curl_exec($ch);
        \curl_close($ch);
        return $response;
    }

    /**
     * @param    $url
     * @param array $data
     * @return   bool|string body or an empty string if the request fails or is empty
     * @category Make HTTP-DELETE call
     */
    public static function HTTPDelete($url, array $data)
    {
        $query = \http_build_query($data);
        $ch = \curl_init();
        \curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, \CURLOPT_HEADER, false);
        \curl_setopt($ch, \CURLOPT_URL, $url);
        \curl_setopt($ch, \CURLOPT_CUSTOMREQUEST, 'DELETE');
        \curl_setopt($ch, \CURLOPT_POSTFIELDS, $query);
        $response = \curl_exec($ch);
        \curl_close($ch);
        return $response;
    }
}
