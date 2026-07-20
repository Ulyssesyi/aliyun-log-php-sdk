<?php declare(strict_types=1);

use Aliyun\Log\Client;
use Aliyun\Log\SDKException;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';

class ClientCurlErrorCompatibilityTest extends TestCase {
    /**
     * @requires extension curl
     */
    public function testCurlFailuresAreWrappedAsSdkExceptions(): void {
        $client = new Client('http://example.com', 'access-key-id', 'access-key-secret');
        $method = new ReflectionMethod(Client::class, 'sendRequest');

        try {
            $method->invoke($client, 'GET', 'unsupported-sls-test://example', '', []);
            $this->fail('Expected \Aliyun\Log\Exception to be thrown.');
        } catch (SDKException $exception) {
            $this->assertNotFalse(strpos($exception->getErrorCode(), 'cURL error:'));
            $this->assertFalse(strpos($exception->getErrorCode(), 'could not be converted to string'));
        }
    }
}
