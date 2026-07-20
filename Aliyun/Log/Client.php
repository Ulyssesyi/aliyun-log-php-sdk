<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

namespace Aliyun\Log;

date_default_timezone_set('Asia/Shanghai');

if (!defined('SLS_API_VERSION')) {
    define('SLS_API_VERSION', '0.6.0');
}
if (!defined('SLS_USER_AGENT')) {
    define('SLS_USER_AGENT', 'log-php-sdk-v-0.6.0');
}

use Aliyun\Log\Models\CredentialsProvider;
use Aliyun\Log\Models\Request\ApplyConfigToMachineGroupRequest;
use Aliyun\Log\Models\Request\BatchGetLogsRequest;
use Aliyun\Log\Models\Request\CreateACLRequest;
use Aliyun\Log\Models\Request\CreateConfigRequest;
use Aliyun\Log\Models\Request\CreateLogstoreRequest;
use Aliyun\Log\Models\Request\CreateMachineGroupRequest;
use Aliyun\Log\Models\Request\CreateShipperRequest;
use Aliyun\Log\Models\Request\DeleteACLRequest;
use Aliyun\Log\Models\Request\DeleteConfigRequest;
use Aliyun\Log\Models\Request\DeleteLogstoreRequest;
use Aliyun\Log\Models\Request\DeleteMachineGroupRequest;
use Aliyun\Log\Models\Request\DeleteShardRequest;
use Aliyun\Log\Models\Request\DeleteShipperRequest;
use Aliyun\Log\Models\Request\GetACLRequest;
use Aliyun\Log\Models\Request\GetConfigRequest;
use Aliyun\Log\Models\Request\GetCursorRequest;
use Aliyun\Log\Models\Request\GetHistogramsRequest;
use Aliyun\Log\Models\Request\GetLogsRequest;
use Aliyun\Log\Models\Request\GetMachineGroupRequest;
use Aliyun\Log\Models\Request\GetMachineRequest;
use Aliyun\Log\Models\Request\GetProjectLogsRequest;
use Aliyun\Log\Models\Request\GetShipperConfigRequest;
use Aliyun\Log\Models\Request\GetShipperTasksRequest;
use Aliyun\Log\Models\Request\ListACLsRequest;
use Aliyun\Log\Models\Request\ListConfigsRequest;
use Aliyun\Log\Models\Request\ListLogstoresRequest;
use Aliyun\Log\Models\Request\ListMachineGroupsRequest;
use Aliyun\Log\Models\Request\ListShardsRequest;
use Aliyun\Log\Models\Request\ListShipperRequest;
use Aliyun\Log\Models\Request\ListTopicsRequest;
use Aliyun\Log\Models\Request\LogStoreSqlRequest;
use Aliyun\Log\Models\Request\MergeShardsRequest;
use Aliyun\Log\Models\Request\ProjectSqlRequest;
use Aliyun\Log\Models\Request\PutLogsRequest;
use Aliyun\Log\Models\Request\RemoveConfigFromMachineGroupRequest;
use Aliyun\Log\Models\Request\RetryShipperTasksRequest;
use Aliyun\Log\Models\Request\SplitShardRequest;
use Aliyun\Log\Models\Request\UpdateACLRequest;
use Aliyun\Log\Models\Request\UpdateConfigRequest;
use Aliyun\Log\Models\Request\UpdateLogstoreRequest;
use Aliyun\Log\Models\Request\UpdateMachineGroupRequest;
use Aliyun\Log\Models\Request\UpdateShipperRequest;
use Aliyun\Log\Models\Response\ApplyConfigToMachineGroupResponse;
use Aliyun\Log\Models\Response\BatchGetLogsResponse;
use Aliyun\Log\Models\Response\CreateACLResponse;
use Aliyun\Log\Models\Response\CreateConfigResponse;
use Aliyun\Log\Models\Response\CreateLogstoreResponse;
use Aliyun\Log\Models\Response\CreateMachineGroupResponse;
use Aliyun\Log\Models\Response\CreateShipperResponse;
use Aliyun\Log\Models\Response\CreateSqlInstanceResponse;
use Aliyun\Log\Models\Response\DeleteACLResponse;
use Aliyun\Log\Models\Response\DeleteConfigResponse;
use Aliyun\Log\Models\Response\DeleteLogstoreResponse;
use Aliyun\Log\Models\Response\DeleteMachineGroupResponse;
use Aliyun\Log\Models\Response\DeleteShardResponse;
use Aliyun\Log\Models\Response\DeleteShipperResponse;
use Aliyun\Log\Models\Response\GetACLResponse;
use Aliyun\Log\Models\Response\GetConfigResponse;
use Aliyun\Log\Models\Response\GetCursorResponse;
use Aliyun\Log\Models\Response\GetHistogramsResponse;
use Aliyun\Log\Models\Response\GetLogsResponse;
use Aliyun\Log\Models\Response\GetMachineGroupResponse;
use Aliyun\Log\Models\Response\GetMachineResponse;
use Aliyun\Log\Models\Response\GetShipperConfigResponse;
use Aliyun\Log\Models\Response\GetShipperTasksResponse;
use Aliyun\Log\Models\Response\ListACLsResponse;
use Aliyun\Log\Models\Response\ListConfigsResponse;
use Aliyun\Log\Models\Response\ListLogstoresResponse;
use Aliyun\Log\Models\Response\ListMachineGroupsResponse;
use Aliyun\Log\Models\Response\ListShardsResponse;
use Aliyun\Log\Models\Response\ListShipperResponse;
use Aliyun\Log\Models\Response\ListSqlInstanceResponse;
use Aliyun\Log\Models\Response\ListTopicsResponse;
use Aliyun\Log\Models\Response\LogStoreSqlResponse;
use Aliyun\Log\Models\Response\ProjectSqlResponse;
use Aliyun\Log\Models\Response\PutLogsResponse;
use Aliyun\Log\Models\Response\RemoveConfigFromMachineGroupResponse;
use Aliyun\Log\Models\Response\RetryShipperTasksResponse;
use Aliyun\Log\Models\Response\UpdateACLResponse;
use Aliyun\Log\Models\Response\UpdateConfigResponse;
use Aliyun\Log\Models\Response\UpdateLogstoreResponse;
use Aliyun\Log\Models\Response\UpdateMachineGroupResponse;
use Aliyun\Log\Models\Response\UpdateShipperResponse;
use Aliyun\Log\Models\Response\UpdateSqlInstanceResponse;
use Aliyun\Log\Models\StaticCredentialsProvider;
use Exception;
use InvalidArgumentException;

class Client {
    /**
     *@var CredentialsProvider credentialsProvider
     */
    protected CredentialsProvider $credentialsProvider;

    /**
     * @var string LOG endpoint
     */
    protected string $endpoint;

    /**
     * @var bool Check if the host if row ip.
     */
    protected bool $isRowIp;

    /**
     * @var integer Http send port. The dafault value is 80.
     */
    protected int $port;

    /**
     * @var string log sever host.
     */
    protected string $logHost;

    /**
     * @var string the local machine ip address.
     */
    protected string $source;

    /**
     * @var bool use https or use http.
     */
    protected bool $useHttps;

    /**
     * self constructor.
     *
     * Either $accessKeyId/$accessKeySecret or $credentialsProvider must be provided.
     *
     * @param string $endpoint
     *            LOG host name, for example, http://cn-hangzhou.sls.aliyuncs.com
     * @param string $accessKeyId
     *            aliyun accessKeyId
     * @param string $accessKey
     *            aliyun accessKey
     * @param string $token
     *            aliyun token
     * @param CredentialsProvider|null $credentialsProvider
     * @throws SDKException
     */
    public function __construct(
        string $endpoint,
        string $accessKeyId = '',
        string $accessKey = '',
        string $token = '',
        ?CredentialsProvider $credentialsProvider = null,
    ) {
        $this->setEndpoint($endpoint); // set $this->logHost
        if (!is_null($credentialsProvider)) {
            $this->credentialsProvider = $credentialsProvider;
        } else {
            if (empty($accessKeyId) || empty($accessKey)) {
                throw new SDKException('InvalidAccessKey', 'accessKeyId or accessKeySecret is empty', '');
            }
            $this->credentialsProvider = new StaticCredentialsProvider(
                $accessKeyId,
                $accessKey,
                $token,
            );
        }
        $this->source = Util::getLocalIp();
    }
    private function setEndpoint(string $endpoint): void {
        if (!str_contains($endpoint, '://')) {
            $endpoint = 'http://' . $endpoint; // default use http
        }
        $urlComponents = parse_url($endpoint);
        if ($urlComponents === false || !isset($urlComponents['host'])) {
            throw new InvalidArgumentException("Invalid endpoint: $endpoint");
        }

        $this->useHttps = isset($urlComponents['scheme']) && $urlComponents['scheme'] === 'https';
        $this->logHost = $urlComponents['host'];

        if (isset($urlComponents['port'])) {
            $this->port = $urlComponents['port'];
            $this->endpoint = $this->logHost . ':' . $this->port;
        } else {
            $this->port = $this->useHttps ? 443 : 80;
            $this->endpoint = $this->logHost;
        }
        $this->isRowIp = Util::isIp($this->logHost);
    }

    /**
     * GMT format time string.
     *
     * @return string
     */
    protected function getGMT(): string {
        return gmdate('D, d M Y H:i:s') . ' GMT';
    }

    /**
     * Decodes a JSON string to a JSON Object.
     * Unsuccessful decode will cause an Exception.
     *
     * @return array
     * @throws SDKException
     */
    /**
     * @param string|null $resBody
     * @param string $requestId
     * @return array<string, mixed>
     * @throws SDKException
     */
    protected function parseToJson(?string $resBody, string $requestId): array {
        if ($resBody === null || $resBody === '') {
            return [];
        }

        $result = json_decode($resBody, true);
        if (!is_array($result)) {
            throw new SDKException('BadResponse', "Bad format,not json: $resBody", $requestId);
        }
        return array_filter($result, fn (mixed $key): bool => is_string($key), ARRAY_FILTER_USE_KEY);
    }

    /**
     * @param string $method
     * @param string $url
     * @param string $body
     * @param array<string, mixed> $headers
     * @return array{0: int, 1: array<string, mixed>, 2: string}
     * @throws RequestCoreException
     */
    protected function getHttpResponse(string $method, string $url, string $body, array $headers): array {
        $request = new RequestCore($url);
        foreach ($headers as $key => $value) {
            if (is_string($value)) {
                $request->add_header($key, $value);
            }
        }
        $request->set_method($method);
        $request->set_useragent(SLS_USER_AGENT);
        if ($method == 'POST' || $method == 'PUT') {
            $request->set_body($body);
        }
        $request->send_request();
        $response =  [];
        $response[] = $request->get_response_code();
        $respHeader = $request->get_response_header();
        $response[] = is_array($respHeader) ? $respHeader : [];
        $respBody = $request->get_response_body();
        $response[] = is_string($respBody) ? $respBody : '';
        return $response;
    }

    /**
     * @param array<string, mixed> $headers
     * @return array{0: ?string, 1: array<string, mixed>}
     * @throws SDKException
     */
    private function sendRequest(string $method, string $url, ?string $body, array $headers): array {
        try {
            [$responseCode, $header, $resBody] =
                    $this->getHttpResponse($method, $url, $body ?? '', $headers);
        } catch (Exception $ex) {
            throw new SDKException($ex->getMessage(), $ex->__toString());
        }

        $rawRequestId = $header['x-log-requestid'] ?? '';
        $requestId = is_string($rawRequestId) ? $rawRequestId : '';

        if ($responseCode == 200) {
            return  [$resBody,$header];
        }

        $exJson = $this->parseToJson($resBody, $requestId);
        if (isset($exJson['error_code']) && isset($exJson['error_message'])) {
            $errorCode = is_string($exJson['error_code']) ? $exJson['error_code'] : '';
            $errorMessage = is_string($exJson['error_message']) ? $exJson['error_message'] : '';
            throw new SDKException(
                $errorCode,
                $errorMessage,
                $requestId,
            );
        }

        if ($exJson) {
            $exJsonStr = ' The return json is ' . json_encode($exJson);
        } else {
            $exJsonStr = '';
        }
        throw new SDKException(
            'RequestError',
            "Request is failed. Http code is $responseCode.$exJsonStr",
            $requestId,
        );
    }

    /**
     * @param array<string, mixed> $params
     * @param array<string, mixed> $headers
     * @return array{0: ?string, 1: array<string, mixed>}
     * @throws SDKException
     */
    private function send(string $method, ?string $project, ?string $body, string $resource, array $params, array $headers): array {
        $credentials = null;
        try {
            $credentials = $this->credentialsProvider->getCredentials();
        } catch (Exception $ex) {
            throw new SDKException(
                'InvalidCredentials',
                'Fail to get credentials:' . $ex->getMessage(),
                '',
            );
        }

        if ($body) {
            $headers['Content-Length'] = strlen($body);
            if (!isset($headers['x-log-bodyrawsize'])) {
                $headers['x-log-bodyrawsize'] = 0;
            }
            $headers['Content-MD5'] = Util::calMD5($body);
        } else {
            $headers['Content-Length'] = 0;
            $headers['x-log-bodyrawsize'] = 0;
            $headers['Content-Type'] = ''; // If not set, http request will add automatically.
        }

        $headers['x-log-apiversion'] = SLS_API_VERSION;
        $headers['x-log-signaturemethod'] = 'hmac-sha1';
        if (strlen($credentials->getSecurityToken()) > 0) {
            $headers['x-acs-security-token'] = $credentials->getSecurityToken();
        }
        if (is_null($project)) {
            $headers['Host'] = $this->logHost;
        } else {
            $headers['Host'] = "$project.$this->logHost";
        }
        $headers['Date'] = $this->GetGMT();
        $signature = Util::getRequestAuthorization($method, $resource, $credentials->getAccessKeySecret(), $credentials->getSecurityToken(), array_map(static fn (mixed $v): string => is_string($v) ? $v : (is_scalar($v) ? (string) $v : ''), $params), array_map(static fn (mixed $v): string => is_string($v) ? $v : (is_scalar($v) ? (string) $v : ''), $headers));
        $headers['Authorization'] = 'LOG '.$credentials->getAccessKeyId().":$signature";

        $url = $this->buildUrl($project, $resource, $params);
        return $this->sendRequest($method, $url, $body, $headers);
    }

    /**
     * @param array<string, mixed> $params
     */
    private function buildUrl(?string $project, string $resource, array $params): string {
        $url = $resource;
        $schema = $this->useHttps ? 'https://' : 'http://';
        if ($params) {
            $url .= '?' . Util::urlEncode(array_map(static fn (mixed $v): string => is_string($v) ? $v : '', $params));
        }
        if ($this->isRowIp) {
            return "$schema$this->endpoint$url";
        }
        if (is_null($project)) {
            return "$schema$this->endpoint$url";
        }
        return "$schema$project.$this->endpoint$url";
    }

    /**
     * Execute API call and parse JSON response.
     *
     * @param string $method
     * @param string|null $project
     * @param string|null $body
     * @param string $resource
     * @param array<string, mixed> $params
     * @param array<string, mixed> $headers
     * @return array{0: array<string, mixed>, 1: array<string, mixed>}
     * @throws SDKException
     */
    private function executeApi(string $method, ?string $project, ?string $body, string $resource, array $params, array $headers): array {
        [$resp, $header] = $this->send($method, $project, $body, $resource, $params, $headers);
        $rawRequestId = $header['x-log-requestid'] ?? '';
        $requestId = is_string($rawRequestId) ? $rawRequestId : '';
        $resp = $this->parseToJson($resp, $requestId);
        return [$resp, $header];
    }

    /**
     * Encode a value as JSON, throwing an exception on failure.
     * @throws SDKException
     */
    private function jsonEncode(mixed $value): string {
        $encoded = json_encode($value);
        if ($encoded === false) {
            throw new SDKException('EncodingError', 'Failed to encode request body as JSON');
        }
        return $encoded;
    }

    /**
     * Put logs to Log Service.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param PutLogsRequest $request the PutLogs request parameters class
     * @return PutLogsResponse
     * @throws SDKException
     */
    public function putLogs(PutLogsRequest $request): PutLogsResponse {
        $logitems = $request->getLogitems();
        if ($logitems === null) {
            throw new SDKException('InvalidLogSize', 'logItems is null.');
        }
        if (count($logitems) > 4096) {
            throw new SDKException('InvalidLogSize', "logItems' length exceeds maximum limitation: 4096 lines.");
        }

        $logGroup = new LogGroup();
        $topic = $request->getTopic() !== null ? $request->getTopic() : '';
        $logGroup->setTopic($request->getTopic());
        $source = $request->getSource();

        if (! $source) {
            $source = $this->source;
        }
        $logGroup->setSource($source);
        foreach ($logitems as $logItem) {
            $log = new Log();
            $log->setTime($logItem->getTime());
            $content = $logItem->getContents();
            foreach ($content as $key => $value) {
                $content = new Log_Content();
                $content->setKey($key);
                $content->setValue($value);
                $log->addContents($content);
            }

            $logGroup->addLogs($log);
        }

        try {
            $body = Util::toBytes($logGroup);
        } catch (Exception) {
            throw new SDKException('EncodingError', 'Failed to encode log group');
        }
        unset($logGroup);

        $bodySize = strlen($body);
        if ($bodySize > 3 * 1024 * 1024) { // 3 MB
            throw new SDKException('InvalidLogSize', "logItems' size exceeds maximum limitation: 3 MB.");
        }
        $params =  [];
        $headers =  [];
        $headers['x-log-bodyrawsize'] = $bodySize;
        $headers['x-log-compresstype'] = 'deflate';
        $headers['Content-Type'] = 'application/x-protobuf';
        $compressed = gzcompress($body, 6);
        if ($compressed === false) {
            throw new SDKException('EncodingError', 'Failed to compress log body');
        }
        $body = $compressed;

        $logstore = $request->getLogstore() !== null ? $request->getLogstore() : '';
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $shardKey = $request->getShardKey();
        $resource = '/logstores/' . $logstore.($shardKey == null ? '/shards/lb' : '/shards/route');
        if ($shardKey) {
            $params['key'] = $shardKey;
        }
        [$resp, $header] = $this->send('POST', $project, $body, $resource, $params, $headers);
        $rawRequestId = $header['x-log-requestid'] ?? '';
        $requestId = is_string($rawRequestId) ? $rawRequestId : '';
        $resp = $this->parseToJson($resp, $requestId);
        return new PutLogsResponse($header);
    }

    /**
     * create shipper service
     * @param CreateShipperRequest $request
     * return CreateShipperResponse
     * @return CreateShipperResponse
     * @throws SDKException
     */
    public function createShipper(CreateShipperRequest $request): CreateShipperResponse {
        $headers = [];
        $params = [];
        $resource = '/logstores/'.$request->getLogStore().'/shipper';
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $headers['Content-Type'] = 'application/json';

        $body = [
            'shipperName' => $request->getShipperName(),
            'targetType' => $request->getTargetType(),
            'targetConfiguration' => $request->getTargetConfigration(),
        ];
        $body_str = $this->jsonEncode($body);
        $headers['x-log-bodyrawsize'] = strlen($body_str);
        [, $header] = $this->executeApi('POST', $project, $body_str, $resource, $params, $headers);
        return new CreateShipperResponse($header);
    }

    /**
     * create shipper service
     * @param UpdateShipperRequest $request
     * return UpdateShipperResponse
     * @return UpdateShipperResponse
     * @throws SDKException
     */
    public function updateShipper(UpdateShipperRequest $request): UpdateShipperResponse {
        $headers = [];
        $params = [];
        $resource = '/logstores/'.$request->getLogStore().'/shipper/'.$request->getShipperName();
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $headers['Content-Type'] = 'application/json';

        $body = [
            'shipperName' => $request->getShipperName(),
            'targetType' => $request->getTargetType(),
            'targetConfiguration' => $request->getTargetConfigration(),
        ];
        $body_str = $this->jsonEncode($body);
        $headers['x-log-bodyrawsize'] = strlen($body_str);
        [, $header] = $this->executeApi('PUT', $project, $body_str, $resource, $params, $headers);
        return new UpdateShipperResponse($header);
    }

    /**
     * get shipper tasks list, max 48 hours duration supported
     * @param GetShipperTasksRequest $request
     * return GetShipperTasksResponse
     * @throws SDKException
     * @throws SDKException
     * @throws SDKException
     */
    public function getShipperTasks(GetShipperTasksRequest $request): GetShipperTasksResponse {
        $headers = [];
        $params = [
            'from' => $request->getStartTime(),
            'to' => $request->getEndTime(),
            'status' => $request->getStatusType(),
            'offset' => $request->getOffset(),
            'size' => $request->getSize(),
        ];
        $resource = '/logstores/'.$request->getLogStore().'/shipper/'.$request->getShipperName().'/tasks';
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $headers['x-log-bodyrawsize'] = 0;
        $headers['Content-Type'] = 'application/json';

        [$resp, $header] = $this->executeApi('GET', $project, null, $resource, $params, $headers);
        return new GetShipperTasksResponse($resp, $header);
    }

    /**
     * retry shipper tasks list by task ids
     * @param RetryShipperTasksRequest $request
     * return RetryShipperTasksResponse
     * @return RetryShipperTasksResponse
     * @throws SDKException
     */
    public function retryShipperTasks(RetryShipperTasksRequest $request): RetryShipperTasksResponse {
        $headers = [];
        $params = [];
        $resource = '/logstores/'.$request->getLogStore().'/shipper/'.$request->getShipperName().'/tasks';
        $project = $request->getProject() !== null ? $request->getProject() : '';

        $headers['Content-Type'] = 'application/json';
        $body = $request->getTaskLists();
        $body_str = $this->jsonEncode($body);
        $headers['x-log-bodyrawsize'] = strlen($body_str);
        [, $header] = $this->executeApi('PUT', $project, $body_str, $resource, $params, $headers);
        return new RetryShipperTasksResponse($header);
    }

    /**
     * delete shipper service
     * @param DeleteShipperRequest $request
     * return DeleteShipperResponse
     * @throws SDKException
     * @throws SDKException
     * @throws SDKException
     */
    public function deleteShipper(DeleteShipperRequest $request): DeleteShipperResponse {
        $headers = [];
        $params = [];
        $resource = '/logstores/'.$request->getLogStore().'/shipper/'.$request->getShipperName();
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $headers['x-log-bodyrawsize'] = 0;
        $headers['Content-Type'] = 'application/json';

        [, $header] = $this->executeApi('DELETE', $project, null, $resource, $params, $headers);
        return new DeleteShipperResponse($header);
    }

    /**
     * get shipper config service
     * @param GetShipperConfigRequest $request
     * return GetShipperConfigResponse
     * @throws SDKException
     * @throws SDKException
     * @throws SDKException
     */
    public function getShipperConfig(GetShipperConfigRequest $request): GetShipperConfigResponse {
        $headers = [];
        $params = [];
        $resource = '/logstores/'.$request->getLogStore().'/shipper/'.$request->getShipperName();
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $headers['x-log-bodyrawsize'] = 0;
        $headers['Content-Type'] = 'application/json';

        [$resp, $header] = $this->executeApi('GET', $project, null, $resource, $params, $headers);
        return new GetShipperConfigResponse($resp, $header);
    }

    /**
     * list shipper service
     * @param ListShipperRequest $request
     * return ListShipperResponse
     * @throws SDKException
     * @throws SDKException
     * @throws SDKException
     */
    public function listShipper(ListShipperRequest $request): ListShipperResponse {
        $headers = [];
        $params = [];
        $resource = '/logstores/'.$request->getLogStore().'/shipper';
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $headers['x-log-bodyrawsize'] = 0;
        $headers['Content-Type'] = 'application/json';

        [$resp, $header] = $this->executeApi('GET', $project, null, $resource, $params, $headers);
        return new ListShipperResponse($resp, $header);
    }

    /**
     * create logstore
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param CreateLogstoreRequest $request the CreateLogStore request parameters class.
     * @throws SDKException
     * return CreateLogstoreResponse
     */
    public function createLogstore(CreateLogstoreRequest $request): CreateLogstoreResponse {
        $headers =  [];
        $params =  [];
        $resource = '/logstores';
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $headers['Content-Type'] = 'application/json';
        $body = [
            'logstoreName' => $request->getLogstore(),
            'ttl' => (int) ($request->getTtl()),
            'shardCount' => (int) ($request->getShardCount()),
        ];
        $body_str = $this->jsonEncode($body);
        $headers['x-log-bodyrawsize'] = strlen($body_str);
        [, $header] = $this->executeApi('POST', $project, $body_str, $resource, $params, $headers);
        return new CreateLogstoreResponse($header);
    }
    /**
     * update logstore
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param UpdateLogstoreRequest $request the UpdateLogStore request parameters class.
     * @throws SDKException
     * return UpdateLogstoreResponse
     */
    public function updateLogstore(UpdateLogstoreRequest $request): UpdateLogstoreResponse {
        $headers =  [];
        $params =  [];
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $headers['Content-Type'] = 'application/json';
        $body = [
            'logstoreName' => $request->getLogstore(),
            'ttl' => (int) ($request->getTtl()),
            'shardCount' => (int) ($request->getShardCount()),
        ];
        $resource = '/logstores/'.$request->getLogstore();
        $body_str = $this->jsonEncode($body);
        $headers['x-log-bodyrawsize'] = strlen($body_str);
        [, $header] = $this->executeApi('PUT', $project, $body_str, $resource, $params, $headers);
        return new UpdateLogstoreResponse($header);
    }

    /**
     * List all logstores of requested project.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param ListLogstoresRequest $request the ListLogstores request parameters class.
     * @return ListLogstoresResponse
     * @throws SDKException
     */
    public function listLogstores(ListLogstoresRequest $request): ListLogstoresResponse {
        $headers =  [];
        $params =  [];
        $resource = '/logstores';
        $project = $request->getProject() !== null ? $request->getProject() : '';
        [$resp, $header] = $this->executeApi('GET', $project, null, $resource, $params, $headers);
        return new ListLogstoresResponse($resp, $header);
    }

    /**
     * Delete logstore
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param DeleteLogstoreRequest $request the DeleteLogstores request parameters class.
     * @return DeleteLogstoreResponse
     * @throws SDKException
     */
    public function deleteLogstore(DeleteLogstoreRequest $request): DeleteLogstoreResponse {
        $headers =  [];
        $params =  [];
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $logstore = $request->getLogstore() != null ? $request->getLogstore() : '';
        $resource = "/logstores/$logstore";
        [, $header] = $this->executeApi('DELETE', $project, null, $resource, $params, $headers);
        return new DeleteLogstoreResponse($header);
    }

    /**
     * List all topics in a logstore.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param ListTopicsRequest $request the ListTopics request parameters class.
     * @return ListTopicsResponse
     * @throws SDKException
     */
    public function listTopics(ListTopicsRequest $request): ListTopicsResponse {
        $headers =  [];
        $params =  [];
        if ($request->getToken() !== null) {
            $params['token'] = $request->getToken();
        }
        if ($request->getLine() !== null) {
            $params['line'] = $request->getLine();
        }
        $params['type'] = 'topic';
        $logstore = $request->getLogstore() !== null ? $request->getLogstore() : '';
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $resource = "/logstores/$logstore";
        [$resp, $header] = $this->executeApi('GET', $project, null, $resource, $params, $headers);
        return new ListTopicsResponse($resp, $header);
    }

    /**
     * Get histograms of requested query from log service.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param GetHistogramsRequest $request the GetHistograms request parameters class.
     * @return array{0: array<string, mixed>, 1: array<string, mixed>}
     * @throws SDKException
     */
    public function getHistogramsJson(GetHistogramsRequest $request): array {
        $headers =  [];
        $params =  [];
        if ($request->getTopic() !== null) {
            $params['topic'] = $request->getTopic();
        }
        if ($request->getFrom() !== null) {
            $params['from'] = $request->getFrom();
        }
        if ($request->getTo() !== null) {
            $params['to'] = $request->getTo();
        }
        if ($request->getQuery() !== null) {
            $params['query'] = $request->getQuery();
        }
        $params['type'] = 'histogram';
        $logstore = $request->getLogstore() !== null ? $request->getLogstore() : '';
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $resource = "/logstores/$logstore";
        return $this->executeApi('GET', $project, null, $resource, $params, $headers);
    }

    /**
     * Get histograms of requested query from log service.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param GetHistogramsRequest $request the GetHistograms request parameters class.
     * @return GetHistogramsResponse
     *@throws SDKException
     */
    public function getHistograms(GetHistogramsRequest $request): GetHistogramsResponse {
        $ret = $this->getHistogramsJson($request);
        $resp = $ret[0];
        $header = $ret[1];
        return new GetHistogramsResponse($resp, $header);
    }

    /**
     * Get logs from Log service.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param GetLogsRequest $request the GetLogs request parameters class.
     * @return array{0: array<string, mixed>, 1: array<string, mixed>}
     * @throws SDKException
     */
    public function getLogsJson(GetLogsRequest $request): array {
        $headers =  [];
        $params =  [];
        if ($request->getTopic() !== null) {
            $params['topic'] = $request->getTopic();
        }
        if ($request->getFrom() !== null) {
            $params['from'] = $request->getFrom();
        }
        if ($request->getTo() !== null) {
            $params['to'] = $request->getTo();
        }
        if ($request->getQuery() !== null) {
            $params['query'] = $request->getQuery();
        }
        $params['type'] = 'log';
        if ($request->getLine() !== null) {
            $params['line'] = $request->getLine();
        }
        if ($request->getOffset() !== null) {
            $params['offset'] = $request->getOffset();
        }
        if ($request->getOffset() !== null) {
            $params['reverse'] = $request->getReverse() ? 'true' : 'false';
        }
        if ($request->getPowerSql() != null) {
            $params['powerSql'] = 'true';
        }
        $logstore = $request->getLogstore() !== null ? $request->getLogstore() : '';
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $resource = "/logstores/$logstore";
        return $this->executeApi('GET', $project, null, $resource, $params, $headers);
    }

    /**
     * Get logs from Log service.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param GetLogsRequest $request the GetLogs request parameters class.
     * @return GetLogsResponse
     *@throws SDKException
     */
    public function getLogs(GetLogsRequest $request): GetLogsResponse {
        $ret = $this->getLogsJson($request);
        $resp = $ret[0];
        $header = $ret[1];
        return new GetLogsResponse($resp, $header);
    }

    /**
     * Get logs from Log service.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param GetProjectLogsRequest $request the GetLogs request parameters class.
     * @return array{0: array<string, mixed>, 1: array<string, mixed>}
     * @throws SDKException
     */
    public function getProjectLogsJson(GetProjectLogsRequest $request): array {
        $headers =  [];
        $params =  [];
        if ($request->getQuery() !== null) {
            $params['query'] = $request->getQuery();
        }
        if ($request->getPowerSql() != null) {
            $params['powerSql'] = 'true';
        }
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $resource = '/logs';
        return $this->executeApi('GET', $project, null, $resource, $params, $headers);
    }
    /**
    * Get logs from Log service.
    * Unsuccessful opertaion will cause an Exception.
    *
    * @param GetProjectLogsRequest $request the GetLogs request parameters class.
    * @return GetLogsResponse
    *@throws SDKException
    */
    public function getProjectLogs(GetProjectLogsRequest $request): GetLogsResponse {
        $ret = $this->getProjectLogsJson($request);
        $resp = $ret[0];
        $header = $ret[1];
        return new GetLogsResponse($resp, $header);
    }

    /**
     * execute sql on logstore
     * Unsuccessful opertaion will cause an Exception.
     * @param LogStoreSqlRequest $request the executeLogStoreSql request parameters class
     * @return LogStoreSqlResponse
     * @throws SDKException
     */
    public function executeLogStoreSql(LogStoreSqlRequest $request): LogStoreSqlResponse {
        $headers =  [];
        $params =  [];
        if ($request->getFrom() !== null) {
            $params['from'] = $request->getFrom();
        }
        if ($request->getTo() !== null) {
            $params['to'] = $request->getTo();
        }
        if ($request->getQuery() !== null) {
            $params['query'] = $request->getQuery();
        }
        $params['type'] = 'log';
        if ($request->getPowerSql() != null) {
            $params['powerSql'] = 'true';
        }
        $logstore = $request->getLogstore() !== null ? $request->getLogstore() : '';
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $resource = "/logstores/$logstore";
        [$resp, $header] = $this->executeApi('GET', $project, null, $resource, $params, $headers);
        return new LogStoreSqlResponse($resp, $header);
    }

    /**
     * exeucte project sql.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param ProjectSqlRequest $request the GetLogs request parameters class.
     * @return array{0: array<string, mixed>, 1: array<string, mixed>}
     * @throws SDKException
     */
    public function executeProjectSqlJson(ProjectSqlRequest $request): array {
        $headers =  [];
        $params =  [];
        if ($request->getQuery() !== null) {
            $params['query'] = $request->getQuery();
        }
        if ($request->getPowerSql() != null) {
            $params['powerSql'] = 'true';
        }
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $resource = '/logs';
        return $this->executeApi('GET', $project, null, $resource, $params, $headers);
    }
    /**
    * Get logs from Log service.
    * Unsuccessful opertaion will cause an Exception.
    *
    * @param ProjectSqlRequest $request the GetLogs request parameters class.
    * @return ProjectSqlResponse
    *@throws SDKException
    */
    public function executeProjectSql(ProjectSqlRequest $request): ProjectSqlResponse {
        $ret = $this->executeProjectSqlJson($request);
        $resp = $ret[0];
        $header = $ret[1];
        return new ProjectSqlResponse($resp, $header);
    }
    /**
     * create sql instance api
     * Unsuccessful opertaion will cause an Exception.
     * @param string $project is project name
     * @param int $cu is max cores used concurrently in a project
     * @return CreateSqlInstanceResponse
     *@throws SDKException
     */
    public function createSqlInstance(string $project, int $cu): CreateSqlInstanceResponse {
        $headers = [];
        $params = [];
        $resource = '/sqlinstance';
        $headers['x-log-bodyrawsize'] = 0;
        $headers['Content-Type'] = 'application/json';
        $body = [
            'cu' => $cu,
        ];
        $body_str = $this->jsonEncode($body);
        [, $header] = $this->executeApi('POST', $project, $body_str, $resource, $params, $headers);
        return new CreateSqlInstanceResponse($header);
    }

    /**
     * update sql instance api
     * Unsuccessful opertaion will cause an Exception.
     * @param string $project is project name
     * @param int $cu is max cores used concurrently in a project
     * @return UpdateSqlInstanceResponse
     *@throws SDKException
     */
    public function updateSqlInstance(string $project, int $cu): UpdateSqlInstanceResponse {
        $headers = [];
        $params = [];
        $resource = '/sqlinstance';
        $headers['x-log-bodyrawsize'] = 0;
        $headers['Content-Type'] = 'application/json';
        $body = [
            'cu' => $cu,
        ];
        $body_str = $this->jsonEncode($body);
        [, $header] = $this->executeApi('PUT', $project, $body_str, $resource, $params, $headers);
        return new UpdateSqlInstanceResponse($header);
    }

    /**
     * get sql instance api
     * Unsuccessful opertaion will cause an Exception.
     * @param string $project is project name
     * @return ListSqlInstanceResponse
     * @throws SDKException
     */
    public function listSqlInstance(string $project): ListSqlInstanceResponse {
        $headers = [];
        $headers['Content-Type'] = 'application/x-protobuf';
        $hangzhou['Content-Length'] = '0';
        $params = [];
        $resource = '/sqlinstance';
        $body_str = '';
        [$resp, $header]  = $this->executeApi('GET', $project, $body_str, $resource, $params, $headers);
        return new ListSqlInstanceResponse($resp, $header);
    }

    /**
     * Get logs from Log service with shardid conditions.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param BatchGetLogsRequest $request the BatchGetLogs request parameters class.
     * @return BatchGetLogsResponse
     * @throws Exception
     * @throws SDKException
     */
    public function batchGetLogs(BatchGetLogsRequest $request): BatchGetLogsResponse {
        $params = [];
        $headers = [];
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $logstore = $request->getLogstore() !== null ? $request->getLogstore() : '';
        $shardId = $request->getShardId() !== null ? $request->getShardId() : '';
        if ($request->getCount() !== null) {
            $params['count'] = $request->getCount();
        }
        if ($request->getCursor() !== null) {
            $params['cursor'] = $request->getCursor();
        }
        if ($request->getEndCursor() !== null) {
            $params['end_cursor'] = $request->getEndCursor();
        }
        $params['type'] = 'log';
        $headers['Accept-Encoding'] = 'gzip';
        $headers['accept'] = 'application/x-protobuf';

        $resource = "/logstores/$logstore/shards/$shardId";
        [$resp, $header] = $this->send('GET', $project, null, $resource, $params, $headers);
        //$resp is a byteArray
        $resp =  gzuncompress($resp ?? '');
        if ($resp === false) {
            $resp = new LogGroupList();
        } else {
            $resp = new LogGroupList($resp);
        }
        return new BatchGetLogsResponse($resp, $header);
    }

    /**
     * List Shards from Log service with Project and logstore conditions.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param ListShardsRequest $request the ListShards request parameters class.
     * @return ListShardsResponse
     * @throws SDKException
     */
    public function listShards(ListShardsRequest $request): ListShardsResponse {
        $params = [];
        $headers = [];
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $logstore = $request->getLogstore() !== null ? $request->getLogstore() : '';

        $resource = '/logstores/'.$logstore.'/shards';
        [$resp, $header] = $this->executeApi('GET', $project, null, $resource, $params, $headers);
        return new ListShardsResponse($resp, $header);
    }

    /**
     * split a shard into two shards  with Project and logstore and shardId and midHash conditions.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param SplitShardRequest $request the SplitShard request parameters class.
     * @return ListShardsResponse
     * @throws SDKException
     */
    public function splitShard(SplitShardRequest $request): ListShardsResponse {
        $params = [];
        $headers = [];
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $logstore = $request->getLogstore() !== null ? $request->getLogstore() : '';
        $shardId = $request->getShardId();
        $midHash = $request->getMidHash();

        $resource = '/logstores/'.$logstore.'/shards/'.$shardId;
        $params['action'] = 'split';
        $params['key'] = $midHash;
        [$resp, $header] = $this->executeApi('POST', $project, null, $resource, $params, $headers);
        return new ListShardsResponse($resp, $header);
    }

    /**
     * merge two shards into one shard with Project and logstore and shardId and conditions.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param MergeShardsRequest $request the MergeShards request parameters class.
     * @return ListShardsResponse
     * @throws SDKException
     */
    public function MergeShards(MergeShardsRequest $request): ListShardsResponse {
        $params = [];
        $headers = [];
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $logstore = $request->getLogstore() !== null ? $request->getLogstore() : '';
        $shardId = $request->getShardId() != null ? $request->getShardId() : -1;

        $resource = '/logstores/'.$logstore.'/shards/'.$shardId;
        $params['action'] = 'merge';
        [$resp, $header] = $this->executeApi('POST', $project, null, $resource, $params, $headers);
        return new ListShardsResponse($resp, $header);
    }
    /**
     * delete a read only shard with Project and logstore and shardId conditions.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param DeleteShardRequest $request the DeleteShard request parameters class.
     * @return DeleteShardResponse
     *@throws SDKException
     */
    public function DeleteShard(DeleteShardRequest $request): DeleteShardResponse {
        $params = [];
        $headers = [];
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $logstore = $request->getLogstore() !== null ? $request->getLogstore() : '';
        $shardId = $request->getShardId() != null ? $request->getShardId() : -1;

        $resource = '/logstores/'.$logstore.'/shards/'.$shardId;
        [$resp, $header] = $this->send('DELETE', $project, null, $resource, $params, $headers);
        $requestId = $header['x-log-requestid'] ?? '';
        return new DeleteShardResponse($header);
    }

    /**
     * Get cursor from Log service.
     * Unsuccessful opertaion will cause an Exception.
     *
     * @param GetCursorRequest $request the GetCursor request parameters class.
     * @return GetCursorResponse
     *@throws SDKException
     */
    public function getCursor(GetCursorRequest $request): GetCursorResponse {
        $params = [];
        $headers = [];
        $project = $request->getProject() !== null ? $request->getProject() : '';
        $logstore = $request->getLogstore() !== null ? $request->getLogstore() : '';
        $shardId = $request->getShardId() !== null ? $request->getShardId() : '';
        $mode = $request->getMode() !== null ? $request->getMode() : '';
        $fromTime = $request->getFromTime() !== null ? $request->getFromTime() : -1;

        if (!(empty($mode) xor $fromTime == -1)) {
            if (!empty($mode)) {
                throw new SDKException('RequestError', 'Request is failed. Mode and fromTime can not be not empty simultaneously');
            } else {
                throw new SDKException('RequestError', 'Request is failed. Mode and fromTime can not be empty simultaneously');
            }
        }
        if (!empty($mode) && strcmp($mode, 'begin') !== 0 && strcmp($mode, 'end') !== 0) {
            throw new SDKException('RequestError', "Request is failed. Mode value invalid:$mode");
        }
        if ($fromTime !== -1 && $fromTime < 0) {
            throw new SDKException('RequestError', "Request is failed. FromTime value invalid:$fromTime");
        }
        $params['type'] = 'cursor';
        if ($fromTime !== -1) {
            $params['from'] = $fromTime;
        } else {
            $params['mode'] = $mode;
        }
        $resource = '/logstores/'.$logstore.'/shards/'.$shardId;
        [$resp, $header] = $this->executeApi('GET', $project, null, $resource, $params, $headers);
        return new GetCursorResponse($resp, $header);
    }

    /**
     * @throws SDKException
     */
    public function createConfig(CreateConfigRequest $request): CreateConfigResponse {
        $params = [];
        $headers = [];
        $body = null;
        $config = $request->getConfig();
        if (is_object($config) && method_exists($config, 'toArray')) {
            $body = $this->jsonEncode($config->toArray());
        }
        $headers['Content-Type'] = 'application/json';
        $resource = '/configs';
        [$resp, $header] = $this->send('POST', null, $body, $resource, $params, $headers);
        return new CreateConfigResponse($header);
    }

    /**
     * @throws SDKException
     */
    public function updateConfig(UpdateConfigRequest $request): UpdateConfigResponse {
        $params = [];
        $headers = [];
        $body = null;
        $configName = '';
        $config = $request->getConfig();
        if (is_object($config) && method_exists($config, 'toArray')) {
            $body = $this->jsonEncode($config->toArray());
            $configName = (method_exists($config, 'getConfigName') && $config->getConfigName() !== null) ? $config->getConfigName() : '';
        }
        $headers['Content-Type'] = 'application/json';
        $resource = '/configs/'.$configName;
        [$resp, $header] = $this->send('PUT', null, $body, $resource, $params, $headers);
        return new UpdateConfigResponse($header);
    }

    /**
     * @throws SDKException
     */
    public function getConfig(GetConfigRequest $request): GetConfigResponse {
        $params = [];
        $headers = [];

        $configName = ($request->getConfigName() !== null) ? $request->getConfigName() : '';

        $resource = '/configs/'.$configName;
        [$resp, $header] = $this->executeApi('GET', null, null, $resource, $params, $headers);
        return new GetConfigResponse($resp, $header);
    }

    /**
     * @throws SDKException
     */
    public function deleteConfig(DeleteConfigRequest $request): DeleteConfigResponse {
        $params = [];
        $headers = [];
        $configName = ($request->getConfigName() !== null) ? $request->getConfigName() : '';
        $resource = '/configs/'.$configName;
        [$resp, $header] = $this->send('DELETE', null, null, $resource, $params, $headers);
        return new DeleteConfigResponse($header);
    }

    /**
     * @throws SDKException
     */
    public function listConfigs(ListConfigsRequest $request): ListConfigsResponse {
        $params = [];
        $headers = [];

        if ($request->getConfigName() !== null) {
            $params['configName'] = $request->getConfigName();
        }
        if ($request->getOffset() !== null) {
            $params['offset'] = $request->getOffset();
        }
        if ($request->getSize() !== null) {
            $params['size'] = $request->getSize();
        }

        $resource = '/configs';
        [$resp, $header] = $this->executeApi('GET', null, null, $resource, $params, $headers);
        return new ListConfigsResponse($resp, $header);
    }

    /**
     * @throws SDKException
     */
    public function createMachineGroup(CreateMachineGroupRequest $request): CreateMachineGroupResponse {
        $params = [];
        $headers = [];
        $body = null;
        if ($request->getMachineGroup() !== null) {
            $body = $this->jsonEncode($request->getMachineGroup()->toArray());
        }
        $headers['Content-Type'] = 'application/json';
        $resource = '/machinegroups';
        [$resp, $header] = $this->send('POST', null, $body, $resource, $params, $headers);

        return new CreateMachineGroupResponse($header);
    }

    /**
     * @throws SDKException
     */
    public function updateMachineGroup(UpdateMachineGroupRequest $request): UpdateMachineGroupResponse {
        $params = [];
        $headers = [];
        $body = null;
        $groupName = '';
        if ($request->getMachineGroup() !== null) {
            $body = $this->jsonEncode($request->getMachineGroup()->toArray());
            $groupName = ($request->getMachineGroup()->getGroupName() !== null) ? $request->getMachineGroup()->getGroupName() : '';
        }
        $headers['Content-Type'] = 'application/json';
        $resource = '/machinegroups/'.$groupName;
        [$resp, $header] = $this->send('PUT', null, $body, $resource, $params, $headers);
        return new UpdateMachineGroupResponse($header);
    }

    /**
     * @throws SDKException
     */
    public function getMachineGroup(GetMachineGroupRequest $request): GetMachineGroupResponse {
        $params = [];
        $headers = [];

        $groupName = ($request->getGroupName() !== null) ? $request->getGroupName() : '';

        $resource = '/machinegroups/'.$groupName;
        [$resp, $header] = $this->executeApi('GET', null, null, $resource, $params, $headers);
        return new GetMachineGroupResponse($resp, $header);
    }

    /**
     * @throws SDKException
     */
    public function deleteMachineGroup(DeleteMachineGroupRequest $request): DeleteMachineGroupResponse {
        $params = [];
        $headers = [];

        $groupName = ($request->getGroupName() !== null) ? $request->getGroupName() : '';
        $resource = '/machinegroups/'.$groupName;
        [$resp, $header] = $this->send('DELETE', null, null, $resource, $params, $headers);
        return new DeleteMachineGroupResponse($header);
    }

    /**
     * @throws SDKException
     */
    public function listMachineGroups(ListMachineGroupsRequest $request): ListMachineGroupsResponse {
        $params = [];
        $headers = [];

        if ($request->getGroupName() !== null) {
            $params['groupName'] = $request->getGroupName();
        }
        if ($request->getOffset() !== null) {
            $params['offset'] = $request->getOffset();
        }
        if ($request->getSize() !== null) {
            $params['size'] = $request->getSize();
        }

        $resource = '/machinegroups';
        [$resp, $header] = $this->executeApi('GET', null, null, $resource, $params, $headers);
        return new ListMachineGroupsResponse($resp, $header);
    }

    /**
     * @throws SDKException
     */
    public function applyConfigToMachineGroup(ApplyConfigToMachineGroupRequest $request): ApplyConfigToMachineGroupResponse {
        $params = [];
        $headers = [];
        $configName = $request->getConfigName();
        $groupName = $request->getGroupName();
        $headers['Content-Type'] = 'application/json';
        $resource = '/machinegroups/'.$groupName.'/configs/'.$configName;
        [$resp, $header] = $this->send('PUT', null, null, $resource, $params, $headers);
        return new ApplyConfigToMachineGroupResponse($header);
    }

    /**
     * @throws SDKException
     */
    public function removeConfigFromMachineGroup(RemoveConfigFromMachineGroupRequest $request): RemoveConfigFromMachineGroupResponse {
        $params = [];
        $headers = [];
        $configName = $request->getConfigName();
        $groupName = $request->getGroupName();
        $headers['Content-Type'] = 'application/json';
        $resource = '/machinegroups/'.$groupName.'/configs/'.$configName;
        [$resp, $header] = $this->send('DELETE', null, null, $resource, $params, $headers);
        return new RemoveConfigFromMachineGroupResponse($header);
    }

    /**
     * @throws SDKException
     */
    public function getMachine(GetMachineRequest $request): GetMachineResponse {
        $params = [];
        $headers = [];

        $uuid = ($request->getUuid() !== null) ? $request->getUuid() : '';

        $resource = '/machines/'.$uuid;
        [$resp, $header] = $this->executeApi('GET', null, null, $resource, $params, $headers);
        return new GetMachineResponse($resp, $header);
    }

    /**
     * @throws SDKException
     */
    public function createACL(CreateACLRequest $request): CreateACLResponse {
        $params = [];
        $headers = [];
        $body = null;
        $acl = $request->getAcl();
        if (is_object($acl) && method_exists($acl, 'toArray')) {
            $body = $this->jsonEncode($acl->toArray());
        }
        $headers['Content-Type'] = 'application/json';
        $resource = '/acls';
        [$resp, $header] = $this->executeApi('POST', null, $body, $resource, $params, $headers);
        return new CreateACLResponse($resp, $header);
    }

    /**
     * @throws SDKException
     */
    public function updateACL(UpdateACLRequest $request): UpdateACLResponse {
        $params = [];
        $headers = [];
        $body = null;
        $aclId = '';
        $acl = $request->getAcl();
        if (is_object($acl) && method_exists($acl, 'toArray')) {
            $body = $this->jsonEncode($acl->toArray());
            $aclId = (method_exists($acl, 'getAclId') && $acl->getAclId() !== null) ? $acl->getAclId() : '';
        }
        $headers['Content-Type'] = 'application/json';
        $resource = '/acls/'.$aclId;
        [$resp, $header] = $this->send('PUT', null, $body, $resource, $params, $headers);
        return new UpdateACLResponse($header);
    }

    /**
     * @throws SDKException
     */
    public function getACL(GetACLRequest $request): GetACLResponse {
        $params = [];
        $headers = [];

        $aclId = ($request->getAclId() !== null) ? $request->getAclId() : '';

        $resource = '/acls/'.$aclId;
        [$resp, $header] = $this->executeApi('GET', null, null, $resource, $params, $headers);
        return new GetACLResponse($resp, $header);
    }

    /**
     * @throws SDKException
     */
    public function deleteACL(DeleteACLRequest $request): DeleteACLResponse {
        $params = [];
        $headers = [];
        $aclId = ($request->getAclId() !== null) ? $request->getAclId() : '';
        $resource = '/acls/'.$aclId;
        [$resp, $header] = $this->send('DELETE', null, null, $resource, $params, $headers);
        return new DeleteACLResponse($header);
    }

    /**
     * @throws SDKException
     */
    public function listACLs(ListACLsRequest $request): ListACLsResponse {
        $params = [];
        $headers = [];
        if ($request->getPrincipleId() !== null) {
            $params['principleId'] = $request->getPrincipleId();
        }
        if ($request->getOffset() !== null) {
            $params['offset'] = $request->getOffset();
        }
        if ($request->getSize() !== null) {
            $params['size'] = $request->getSize();
        }

        $resource = '/acls';
        [$resp, $header] = $this->executeApi('GET', null, null, $resource, $params, $headers);
        return new ListACLsResponse($resp, $header);
    }

}
