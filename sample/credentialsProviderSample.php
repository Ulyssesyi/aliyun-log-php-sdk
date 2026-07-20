<?php
echo 'Hello, World!';
require_once __DIR__ . '/../vendor/autoload.php';

$endpoint = 'cn-hangzhou.log.aliyuncs.com';
$accessKeyId = '';
$accessKey = '';
$token = '';
$project = 'test';
$logstore = 'test';

$credentialsProvider = new \Aliyun\Log\Models\StaticCredentialsProvider($accessKeyId, $accessKey, $token);
$client = new \Aliyun\Log\Client($endpoint, '', '', '', $credentialsProvider);

$req = new \Aliyun\Log\Models\Request\GetLogsRequest($project, $logstore, 1698740109, 1698744321, '', '*', null, null, null, null);

function putLogs(\Aliyun\Log\Client $client, $project, $logstore) {
    $topic = 'TestTopic';

    $contents = [ // key-value pair
        'TestKey' => 'TestContent',
        'kv_json' => '{"a": "b", "c": 19021}',
    ];
    $logItem = new \Aliyun\Log\Models\LogItem();
    $logItem->setTime(time());
    $logItem->setContents($contents);
    $logitems = [$logItem];
    $request = new \Aliyun\Log\Models\Request\PutLogsRequest(
        $project,
        $logstore,
        $topic,
        null,
        $logitems
    );

    try {
        $response = $client->putLogs($request);
    } catch (\Aliyun\Log\Exception $ex) {
        var_dump($ex);
    } catch (Exception $ex) {
        var_dump($ex);
    }
}

putLogs($client, $project, $logstore);
$res = $client->getLogs($req);
var_dump($res->getLogs());
