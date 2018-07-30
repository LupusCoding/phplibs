<?php
namespace LC\Recaptcha\RequestMethod;

use LC\Recaptcha\Request;

/**
 * Class Socket
 * @package LC\Recaptcha\RequestMethod
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Socket implements RequestMethodInterface
{
    /** @var string */
    private $verify_url;

    /**
     * Socket constructor.
     * @inheritdoc
     */
    public function __construct($verify_url)
    {
        $this->verify_url = $verify_url;
    }

    /**
     * @inheritdoc
     */
    public function submit(Request $request)
    {
        $errno = 0;
        $errstr = '';

        $hostname = preg_replace('/https:\/\/(([A-Za-z]+\.[A-Za-z]+|[A-Za-z]+)\.[A-Za-z]+)\/.*/', '$1', $this->verify_url);
        $request_url = preg_replace('/https:\/\/([A-Za-z]+\.[A-Za-z]+|[A-Za-z]+)\.[A-Za-z]+(\/.*)/', '$2', $this->verify_url);

        if (
            false === ($handle = fsockopen('ssl://' . $hostname, 443, $errno, $errstr, 30)) ||
            $errno !== 0 || $errstr !== ''
        ) {
            return json_encode([
                'success' => false,
                'challenge_ts' => date('Y-m-d\'T\'H:m:sZ'),
                'hostname' => $hostname,
                'error-codes' => ["invalid-request"],
            ]);
            // {"success":false,"challenge_ts":"2018-06-25'PDT'01:06:55-25200","hostname":"\/recaptcha\/api\/siteverify","error-codes":["invalid-request"]}
        }

        $content = $request->toQueryString();

        $options = "POST " . $request_url . " HTTP/1.1\r\n";
        $options .= "Host: " . $hostname . "\r\n";
        $options .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $options .= "Content-length: " . strlen($content) . "\r\n";
        $options .= "Connection: close\r\n\r\n";
        $options .= $content . "\r\n\r\n";

        if(!fwrite($handle, $options, strlen($options))) {
            return json_encode([
                'success' => false,
                'challenge_ts' => date('Y-m-d\'T\'H:m:sZ'),
                'hostname' => $hostname,
                'error-codes' => ["write-to-socket-failure"],
            ]);
            // {"success":false,"challenge_ts":"2018-06-25'PDT'01:06:55-25200","hostname":"\/recaptcha\/api\/siteverify","error-codes":["write-to-socket-failure"]}
        }

        $response = '';

        while (!feof($handle)) {
            $response .= fgets($handle,4096);
        }

        fclose($handle);

        if(strlen($response) === 0 || 0 !== strpos($response, 'HTTP/1.1 200 OK')) {
            return json_encode([
                'success' => false,
                'challenge_ts' => date('Y-m-d\'T\'H:m:sZ'),
                'hostname' => $hostname,
                'error-codes' => ["invalid-response"],
            ]);
            // {"success":false,"challenge_ts":"2018-06-25'PDT'01:06:55-25200","hostname":"\/recaptcha\/api\/siteverify","error-codes":["invalid-response"]}
        }

        $parts = preg_split("#\n\s*\n#Uis", $response);
        return $parts[1];
    }
}