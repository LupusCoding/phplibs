<?php
namespace LC\Recaptcha;

/**
 * Class Response
 * @package LC\Recaptcha
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Response
{
    /** @var bool */
    private $success;

    /** @var string */
    private $challenge_ts;

    /** @var string */
    private $hostname;

    /** @var array */
    private $errorCodes;

    /** @var int */
    private $score;

    /** @var string */
    private $action;

    /** @var array */
    private $errors;

    /**
     * Response constructor.
     * @param string $json
     * @param bool $success
     * @param string $challenge_ts
     * @param string $hostname
     * @param array $error_codes
     * @param int $score
     * @param string $action
     * @throws Exception\NoResponseException
     */
    public function __construct($json = null, $success = null, $challenge_ts = null, $hostname = null, $error_codes = null, $score = null, $action = null)
    {
        if(isset($json)) {
            $this->parseJSON($json);
        } else {
            $this->success = isset($success) ? ($success === true) : false;;
            $this->challenge_ts = $challenge_ts;
            $this->hostname = $hostname;
            $this->errorCodes = $error_codes;
            $this->score = $score;
            $this->action = $action;
        }
        $this->parseErrors();
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @return string
     */
    public function getChallengeTs()
    {
        return $this->challenge_ts;
    }

    /**
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * @return array
     */
    public function getErrorCodes()
    {
        return $this->errorCodes;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function toJSON()
    {
        return json_encode(
            [
                'status' => ($this->isSuccess() ? 'success' : 'failed'),
                'challenge_ts' => $this->challenge_ts,
                'error-codes' => $this->errorCodes,
                'errors' => $this->errors,
                'score' => $this->score,
                'action' => $this->action,
            ]
        );
    }

    /**
     * @param $json
     * @return void
     * @throws Exception\NoResponseException
     */
    private function parseJSON($json)
    {
        $data = json_decode($json, true);

        if(!$data) {
            throw new Exception\NoResponseException('The response was empty.');
        }

        $this->challenge_ts = isset($data['challenge_ts']) ? $data['challenge_ts'] : date('Y-m-d\'T\'H:m:sZ');
        $this->hostname = isset($data['hostname']) ? $data['hostname'] : null;

        $this->success = isset($data['success']) ? ($data['success'] === true) : false;
        $this->errorCodes = isset($data['error-codes']) ? $data['error-codes'] : [];
    }

    /**
     * @return void
     */
    private function parseErrors()
    {
        $Error = new Error\Factory();
        $this->errors = null;
        $errors = [];
        foreach ($this->errorCodes as $code) {
            switch ($code) {
                case 'bad-request':
                    $errors[] = $Error->badRequest();
                    break;
                case 'invalid-input-response':
                    $errors[] = $Error->invalidInputResponse();
                    break;
                case 'invalid-input-secret':
                    $errors[] = $Error->invalidInputSecret();
                    break;
                case 'missing-input-response':
                    $errors[] = $Error->missingInputResponse();
                    break;
                case 'missing-input-secret':
                    $errors[] = $Error->missingInputSecret();
                    break;
            }
        }
        if(!empty($errors)) {
            $this->errors = $errors;
        }
    }
}