<?php

use Aliyun\Log\RequestCore;
use Aliyun\Log\RequestCoreException;
use PHPUnit\Framework\TestCase;

class RequestCoreCurlCompatibilityTest extends TestCase {
    /**
     * @requires extension curl
     */
    public function testSendRequestPreservesCurlError(): void {
        $request = new RequestCore('unsupported-sls-test://example');

        try {
            $request->send_request();
            $this->fail('Expected RequestCoreException to be thrown.');
        } catch (RequestCoreException $exception) {
            $this->assertCurlErrorMessage($exception->getMessage());
        }
    }

    /**
     * @requires extension curl
     */
    public function testSendMultiRequestPreservesCurlError(): void {
        $request = new RequestCore('unsupported-sls-test://example');
        $handle = $request->prep_request();

        try {
            $request->send_multi_request([$handle]);
            $this->fail('Expected RequestCoreException to be thrown.');
        } catch (RequestCoreException $exception) {
            $this->assertCurlErrorMessage($exception->getMessage());
        }
    }

    /**
     * @requires extension curl
     */
    public function testSendMultiRequestRejectsInvalidHandles(): void {
        $request = new RequestCore();

        try {
            $request->send_multi_request([null]);
            $this->fail('Expected RequestCoreException to be thrown.');
        } catch (RequestCoreException $exception) {
            $this->assertSame('Invalid cURL handle supplied.', $exception->getMessage());
        }
    }

    /**
     * @requires extension curl
     */
    public function testSendMultiRequestKeepsDistinctHandleResults(): void {
        $file_one = tempnam(sys_get_temp_dir(), 'request-core-curl-');
        $file_two = tempnam(sys_get_temp_dir(), 'request-core-curl-');
        file_put_contents($file_one, 'one');
        file_put_contents($file_two, 'two');

        $request_one = new RequestCore('file://' . $file_one);
        $request_two = new RequestCore('file://' . $file_two);
        $request_one->set_curlopts([CURLOPT_HEADER => false]);
        $request_two->set_curlopts([CURLOPT_HEADER => false]);
        $runner = new RequestCore();

        try {
            $responses = $runner->send_multi_request([
                $request_one->prep_request(),
                $request_two->prep_request(),
            ]);

            $this->assertCount(2, $responses);
            $this->assertSame('one', $responses[0]->body);
            $this->assertSame('two', $responses[1]->body);
        } finally {
            @unlink($file_one);
            @unlink($file_two);
        }
    }

    private function assertCurlErrorMessage($message): void {
        $this->assertNotFalse(strpos($message, 'cURL handle:'));
        $this->assertNotFalse(strpos($message, 'cURL error:'));
        $this->assertSame(1, preg_match('/\([1-9][0-9]*\)$/', $message));
        $this->assertFalse(strpos($message, 'could not be converted to string'));
    }
}
