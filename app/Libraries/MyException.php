<?php

namespace App\Libraries;

use Exception;
use Illuminate\Http\Response;

class MyException extends Exception
{   
    protected $code;
    protected $codeStatus;
    protected $userMessage;
    protected $messages;
    protected $apiVer;

    /**
     * Description
     * @param string $message 
     * @param integer $code 
     * @param Exception $previous 
     * @param Array $options    Available options are codeStatus, apiVer, userAttr, messages 
     * @return type
     */
    public function __construct($message='', $code = 422, Exception $previous = null, Array $options=[]) {
        $this->code = $code ? $code : 422;
        if(!is_numeric($this->code) || strlen($this->code) != 3) $this->code = 422;

        parent::__construct($message, $this->code, $previous);

        $this->codeStatus = @$options['codeStatus'] ? $options['codeStatus'] : 'Unprocessable Entity';
        $this->apiVer = @$options['apiVer'];
        $this->messages = @$options['messages'];
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function setMultiMessage(Array $messages) {
        $this->messages = $messages;
    }

    public function returnResponse($opt=[]) {
        
        $msg = @$opt['msg'] ? $opt['msg'] : $this->message;
        $msgs = @$opt['msgs'] ? $opt['msgs'] : $this->messages;
        $apiVer = @$opt['apiVer'] ? $opt['apiVer'] : $this->apiVer;

        return response()->json([
                'meta' => [
                    'status' => false,
                    'message' => $msg,
                    'messages' => $msgs,
                    'version' => $apiVer,
                ],
                'result' => null
            ])->setStatusCode($this->code, $this->codeStatus);
    }

    public function errorResponse(\Exception $e, $userMsg = null, $aryMsg = []) {
        return response()->json([
            'errors' => [
                'message' => $userMsg ? $userMsg : 'Ooooops... something happened ! We will fix it soon :)',
                'internal_message' => $e->getMessage(),
                'messages' => $aryMsg,
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'error_code' => $e->getCode(),
                'error_trace' => $e->getTrace(),
            ]
        ])->setStatusCode($this->code, $this->codeStatus);
    }
}