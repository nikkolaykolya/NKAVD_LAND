<?php
include 'http_request.php';
include_once '../api/config/database.php';
include_once '../api/objects/clientRequest.php';
session_start();
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
    $fileString = file_get_contents('test.json');
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
                'code' => 'def50200159012b18a94ffbbd435694b6216cd67f0bf0fb235320ad2254188aeb1acf1f1903c4df4383f17769b6d4c425589912657d1310096031750775ea2fa3acf13d63ec21cf2342a74890e7904c5dfedba36a39ac9e4ab9595a2409f11500d656f54b91ad7877b7d56212ed293e6f1eb845a07752904393982b00983685c9f9be4d3d05466290f8c3f055ae65f0c4c838ea2d3f6013ed4767529272ada69ef479a35ce4abac9f938cddee5d561376326b3afff5b519aa74c7677351b1230f0bf1abc6a8cf6a50d62aa9a3db4b484c8fd0a9133242982e031236adeca0a82bd80cc534344fa187fadf104a358e9671bd8b00db5f4b1e9eb9f7d70f9538cc7d5b3121e5cd51f0bbc32eab7039193bffc23287a69d58b1ca69eab79381740785bfaf04ac733623fc3a55f3bfba84906539d72ae7236cc15e2f684244a6cc41c40a2bd71a34de48b89ff566e7f5553e66f3d7cee80782b046b9f1b13b0706df24187919a1c8ea64e440085b6e48b3773f32e40c45423ba29e806eec93cc73aa551e2871446c739ea8fe60c6bd456efc5ff82dfbae223c1ff4594e7e63165c709b1e9685d3153672fd75f47d42277ed3877cbbd850c514e726e3323',
                'redirect_uri' => 'https://nkavd.com',
            ];
        }

        $response = json_decode(HTTPRequester::HTTPPost($link, "", $data));
        if ($response->status >= 400) {
            // Ошибка - отправляем заявку на сервер NKAVD
        } else {
            //  Новый токен авторизации получен - сохраняем его в файл
            overwriteFile($current_date, $fileJson, $response);
            return $response->access_token;
        }
    }

    return $fileJson['access_token'];
}


function overwriteFile($current_date, $fileJson, $response)
{
    $fileJson['access_token'] = $response->access_token;
    $fileJson['refresh_token'] = $response->refresh_token;

    $fileJson['access_token_valid_till'] = $current_date->add(new DateInterval('PT' . ($response->expires_in - 1000) . 'S'))->format('Y-m-d H:i:s');
    $fileJson['refresh_token_valid_till'] = $current_date->add(new DateInterval('P89D'))->format('Y-m-d H:i:s');

    try {
        file_put_contents('lastAuth.json', json_encode($response));
        $f = fopen('test.json', 'w');
        fwrite($f, json_encode($fileJson));
        fclose($f);
    } catch (Exception $ex) {
        echo "<br>  Ошибка:" . $ex->getMessage() . "</br>";
    } finally {
        echo "<br> access_token: " . $response->access_token . "</br>";
        echo "<br> refresh_token: " . $response->refresh_token . "</br>";
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

