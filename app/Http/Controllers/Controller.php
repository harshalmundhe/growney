<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Validator;
use Log;

class Controller extends BaseController
{
    public $config = [];

    public function __construct() {
        $this->config = config('app');
    }

    public function validateRequest($request, $api) {

        $validator = Validator::make($request, $this->config['api'][$api], $this->config['validation_messages']);
        if ($validator->fails()) {
            return $this->sendFailedResponse("Validation failed", $validator->errors());
        }
        return [];
    }

    public function sendFailedResponse($message, $errors = []) {
        return response()->json([
            'status' => false,
            'message' => $message,
            'errors' => $errors
        ], 400);
    }

    public function sendMail($to, $subject, $message) {
        if(env('APP_ENV') == 'local') {
            Log::info("local env mail not send");
            return true;
        }

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Additional headers
        $headers[] = 'From: ' . env('MAIL_FROM');

        // Mail it
        try  {
            mail($to, $subject, $message, implode("\r\n", $headers));
            return true;
        } catch (\Exception $e) {
            Log::error("Failed to send email " . $e->getMessage());
            return false;
        }

    }

    public function sendSuccessResponse($message, $data = []) {
        $ret['status'] = true;
        $ret['message'] = $message;
        if(!empty($data)) {
            $ret['data'] = $data;
        }
        return response()->json($ret, 200);
    }


}
