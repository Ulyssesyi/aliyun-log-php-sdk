<?php declare(strict_types=1);
use Aliyun\Log\Client;
use Aliyun\Log\Models\LogItem;
use Aliyun\Log\Models\Request\GetLogsRequest;
use Aliyun\Log\Models\Request\PutLogsRequest;
use Aliyun\Log\Models\StaticCredentialsProvider;
use Aliyun\Log\SDKException;

echo 'Hello, World!';
require_once __DIR__ . '/../vendor/autoload.php';

$endpoint = 'cn-hangzhou.log.aliyuncs.com';
$accessKeyId = '';
$accessKey = '';
$token = '';
$project = 'test';
$logstore = 'test';

$credentialsProvider = new StaticCredentialsProvider($accessKeyId, $accessKey, $token);
$client = new Client($endpoint, '', '', '', $credentialsProvider);

$req = new GetLogsRequest($project, $logstore, 1698740109, 1698744321, '', '*', null, null, null, null);

function putLogs(Client $client, $project, $logstore): void {
    $topic = 'TestTopic';

    $contents = [ // key-value pair
        'TestKey' => 'TestContent',
        'kv_json' => '{"a": "b", "c": 19021}',
    ];
    $logItem = new LogItem();
    $logItem->setTime(time());
    $logItem->setContents($contents);
    $logitems = [$logItem];
    $request = new PutLogsRequest(
        $project,
        $logstore,
        $topic,
        null,
        $logitems,
    );

    try {
        $response = $client->putLogs($request);
    } catch (SDKException $ex) {
        var_dump($ex);
    } catch (Exception $ex) {
        var_dump($ex);
    }
}

putLogs($client, $project, $logstore);
$res = $client->getLogs($req);
var_dump($res->getLogs());
