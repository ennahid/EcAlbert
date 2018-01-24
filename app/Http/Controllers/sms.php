<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\myincludes\smsGateway;


class sms extends Controller
{

    public function smsview(Request $req)
    {
        return view('Backend.Absence-Retard.Etudiants');
    }
    public function sendsms(Request $req)
    {
        // include_once(app_path() . '/myincludes/smsGateway.php');
        $smsGateway = new SmsGateway('abdelghaf@gmail.com','google1995');

        $deviceID = 70453;
        $number = $req->input('Number');
        $message = $req->input('Message');

        $options = [
        // 'send_at' => strtotime('+10 minutes'), // Send the message in 10 minutes
        // 'expires_at' => strtotime('+1 hour') // Cancel the message in 1 hour if the message is not yet sent
        ];

        //Please note options is no required and can be left out
        $result = $smsGateway->sendMessageToNumber($number, $message, $deviceID, $options);

        return $result['response']['errors'];
    }
}
