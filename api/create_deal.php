<?php
include 'http_request.php';
include_once '../api/config/database.php';
include_once '../api/objects/clientRequest.php';

ini_set('session.gc_maxlifetime', 86400);
session_start();
// Если пользователь недавно оставил заявку – направляем его сразу на страницу "Спасибо"
if ($_SESSION['converted'] && $_SESSION['lead_generated']) {
    header('Location: ../complete.php');
    exit();
}

$name = 'Никита тест';
$phone = '-';
$description = 'Никита тест';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
}

if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
}

if (isset($_POST['description'])) {
    $description = $_POST['description'];
}

sendToAmoCrm($name, $phone, $description);

function getAccessToken()
{
    $subdomain = 'managernkavdcom';
    $client_id = 'fea43de6-fc20-40f5-9890-a324635ede40';
    $client_secret = '5VgWJ4nfo6jZNk4czLJpzanV04WddsVc5D24KJfUMyqXNImTId2FwWWNelER4kYY';
    $code = 'def50200de2c07c02961b4afad2debac5837ba87eaf5c05de9b1133fd7f74c46e71e173292ebedc71de3d21b6003336d17d9d379ceeff250381fbb48fcfba55dacb6340927bbe675f32cd44b71a2bf506d9fa7624bc2b97299bfced292a724da84e7cf101fa761e1ff9892d549c6545e8ffef1245b0949e8673db50edf47c032566423e5ead5d3d5103bb89154c9a77ae03657d2baec218f6bcdcef67d09a68f371af5bc464fdfcc3a96b6cc824fcca2be585915b9ea90bf7326877e7d030f6d43cebd12eebdb1cde05ce7db3c7b02c2e520ee058e1a777b6437d59e4f22ab009ce937ac23e40e755ae76cc18c783849e942ec7f8571894dcdf0c55d0c93d7151e77f3b74c4393b7ffad29019445b560d6c225af2a40e85c7a672a19ba4e9db34ba2181b039de774e55e917855682136b0ad4a56748ff63cba7fdc0163aaeee0717833d20f05ff5691a41c43e291537f9b06b70cb8fecf0de95add20b6cc0891596c79f1d79a025f08b9fc053d5614a61cf7f7b091f0b0a5a0a70a4c86e23731db78e5f5abaccee48e5d68c5c4612bc45da848947bd78b1857bdb4b71c495231d5e0a9604fdcaac4aa10d51f53413d716c450148b16048b3ca41fe';

    $fileString = file_get_contents('E:\amocrm\test.json');
    if ($fileString === false) {
        // deal with error...
    }

    $fileJson = json_decode($fileString, true);
    if ($fileJson === null) {
        $fileJson = array(
            'access_token_valid_till' => '2000-01-01 23:10:56',
            'refresh_token_valid_till' => '2000-01-01 23:10:56',
        );
    }

    $current_date = new DateTime('now');
    $access_token_valid_till = new DateTime($fileJson['access_token_valid_till']);
    $refresh_token_valid_till = new DateTime($fileJson['refresh_token_valid_till']);

    $accessTokenIsValid = $current_date < $access_token_valid_till;

    if ($accessTokenIsValid === true) {
        // Токен авторизации в порядке – возвращаем его сразу
        return $fileJson['access_token'];

    } else {
        // Токен авторизации просрочен – проверяем токен для его обновления
        $link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token';

        $refreshTokenIsValid = $current_date < $refresh_token_valid_till;

        if ($refreshTokenIsValid === true) {
            // Токен обновления в порядке – обновляем токен авторизации
            $data = [
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'grant_type' => 'refresh_token',
                'refresh_token' => $fileJson['refresh_token'],
                'redirect_uri' => 'https://nkavd.com',
            ];
        } else {
            // Токен обновления просрочен – повторно запрашиваем токен аторизации и токен обновления
            $data = [
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => 'https://nkavd.com',
            ];
        }

        $response = json_decode(HTTPRequester::HTTPPost($link, "", $data));
        // Токен для обновления просрочен – обновляем по коду из црм
        if ($response->status >= 400) {
            echo "<br>Requesting new key by code</br>";
            $data = [
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => 'https://nkavd.com',
            ];
            $response = json_decode(HTTPRequester::HTTPPost($link, "", $data));

        }
        if ($response->status >= 400)
            return '';
        else
            return overwriteFile($current_date, $fileJson, $response);
    }

}


function overwriteFile($current_date, $fileJson, $response)
{
    $fileJson['access_token'] = $response->access_token;
    $fileJson['refresh_token'] = $response->refresh_token;

    $fileJson['access_token_valid_till'] = $current_date->add(new DateInterval('PT' . ($response->expires_in - 1000) . 'S'))->format('Y-m-d H:i:s');
    $fileJson['refresh_token_valid_till'] = $current_date->add(new DateInterval('P89D'))->format('Y-m-d H:i:s');

    try {
        chmod('E:\amocrm\lastAuth.json', 0777);
        chmod('E:\amocrm\test.json', 0777);
        file_put_contents('E:\amocrm\lastAuth.json', json_encode($response));
        $f = fopen('E:\amocrm\test.json', 'w+');
        fwrite($f, json_encode($fileJson));
        fclose($f);
    } catch (Exception $ex) {
        echo "<br>  Ошибка:" . $ex->getMessage() . "</br>";
    } finally {
        return $response->access_token;
    }
}



function sendToAmoCrm($name, $phone, $description)
{

    $anyRecordCreated = false;
    try {
        $database = new Database();
        $db = $database->getConnection();
        $clientRequest = new ClientRequest($db);

        $clientRequest->name = $name;
        $clientRequest->phone = $phone;
        $clientRequest->comment = $description;

        if ($clientRequest->create()) {
            $anyRecordCreated = true;
        }
    } catch (Exception $ex) {
//        echo "<br>  Ошибка:" . $ex->getMessage() . "</br>";
    }


    $subdomain = 'managernkavdcom';
    $link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/complex';
    $token = getAccessToken();

    $test = array();

    $test[] = array(
        'name' => $description,
        'created_by' => 0,
        'price' => 100,
        '_embedded' => array(
            'contacts' => [
                array(
                    'first_name' => $name,
                    'custom_fields_values' => [
                        array(
                            'field_code' => 'PHONE',
                            'values' => [
                                array(
                                    'enum_code' => 'MOB',
                                    'value' => $phone,
                                ),
                            ],
                        ),
                    ],
                ),
            ],
        ),
    );

    try {
        $response = json_decode(HTTPRequester::HTTPPost($link, $token, $test));
        if ($response->status >= 400) {
//            echo "<br> Error page </br>";
        } else {
            $anyRecordCreated = true;
        }
    } catch (Exception $e) {
//        die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
    }


    if ($anyRecordCreated) {
        $_SESSION['converted'] = true;

        header('Location: ../complete.php');
    } else {
        header('Location: https://nkavd.com');
    }
}

