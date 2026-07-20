<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';

class EndpointTest extends TestCase {
    public function testBuildUrl() {
        $this->assertEquals($this->getUrl('https://cn-hangzhou.log.aliyuncs.com', 'test', '/', []), 'https://test.cn-hangzhou.log.aliyuncs.com/');
        $this->assertEquals($this->getUrl('cn-hangzhou.log.aliyuncs.com', 'test', '/', []), 'http://test.cn-hangzhou.log.aliyuncs.com/');
        $this->assertEquals($this->getUrl('http://cn-hangzhou.log.aliyuncs.com', 'test', '/logstores', []), 'http://test.cn-hangzhou.log.aliyuncs.com/logstores');
        $this->assertEquals($this->getUrl('https://cn-hangzhou.log.aliyuncs.com:443', 'test', '/logstores', []), 'https://test.cn-hangzhou.log.aliyuncs.com:443/logstores');
        $this->assertEquals($this->getUrl('https://111.111.111.111:80', 'test', '/logstores', []), 'https://111.111.111.111:80/logstores');
        $this->assertEquals($this->getUrl('111.111.111.111:442', 'test', '/test', []), 'http://111.111.111.111:442/test');
        $this->assertEquals($this->getUrl('111.111.111.111:442', null, '/test', []), 'http://111.111.111.111:442/test');
        $this->assertEquals($this->getUrl('http://111.111.111.111:442', 'test', '/cursor', ['type' => 'cursor']), 'http://111.111.111.111:442/cursor?type=cursor');
        $this->assertEquals($this->getUrl('https://cn-hangzhou.log.aliyuncs.com', null, '/cursor', ['type' => 'cursor']), 'https://cn-hangzhou.log.aliyuncs.com/cursor?type=cursor');
        $this->assertEquals($this->getUrl('cn-hangzhou.log.aliyuncs.com', null, '/', []), 'http://cn-hangzhou.log.aliyuncs.com/');
    }

    public function getUrl($endpoint, $project, $resource, $params) {
        $accessKeyId = 'testKey';
        $accessKey = 'testAccessKey';
        $client = new \Aliyun\Log\Client($endpoint, $accessKeyId, $accessKey);
        $reflection = new ReflectionClass($client);
        $method = $reflection->getMethod('buildUrl');
        $method->setAccessible(true);
        return $method->invokeArgs($client, [$project, $resource, $params]);
    }
}
