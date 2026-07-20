<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';

class ClientCurlErrorCompatibilityTest extends TestCase {
    /**
     * @requires extension curl
     */
    public function testCurlFailuresAreWrappedAsSdkExceptions(): void {
        $client = new \Aliyun\Log\Client('http://example.com', 'access-key-id', 'access-key-secret');
        $method = new ReflectionMethod(\Aliyun\Log\Client::class, 'sendRequest');
        $method->setAccessible(true);

        try {
            $method->invoke($client, 'GET', 'unsupported-sls-test://example', '', []);
            $this->fail('Expected \Aliyun\Log\Exception to be thrown.');
        } catch (\Aliyun\Log\Exception $exception) {
            $this->assertNotFalse(strpos($exception->getErrorCode(), 'cURL error:'));
            $this->assertFalse(strpos($exception->getErrorCode(), 'could not be converted to string'));
        }
    }
}
