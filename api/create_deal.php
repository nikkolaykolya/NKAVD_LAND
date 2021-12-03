<?php
// необходимые HTTP-заголовки
header( 'Access-Control-Allow-Origin: *' );
header( 'Content-Type: application/json; charset=UTF-8' );

include 'http_request.php';

$name = 'не определено';
$phone = 'не определен';
$description = 'Новая сделка';

if ( isset( $_POST['name'] ) ) {
    $name = $_POST['name'];
}

if ( isset( $_POST['phone'] ) ) {
    $phone = $_POST['phone'];
}

if ( isset( $_POST['description'] ) ) {
    $description = $_POST['description'];
}

try {

    $subdomain = 'managernkavdcom';
    $link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/complex';

    $test = array();

    $test[] = array(
        'name' => $description,
        'created_by' => 0,
        'price' => 20000,
        '_embedded' => array(
            'contacts' => [
                array(
                    'first_name' => $name,
                    'custom_fields_values' => [
                        array(
                            'field_code' => 'PHONE',
                            'values' => [
                                array(
                                    'enum_code'=> 'MOB',
                                    'value' => $phone,
                                ),
                            ],
                        ),
                    ],
                ),
            ],
        ),
    );

    $response = json_decode( HTTPRequester::HTTPPost( $link, $test ) ) ;

    header( 'Location: https://nkavd.com' );
    exit();

} catch( Exception $e ) {
    die( 'Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode() );
}
