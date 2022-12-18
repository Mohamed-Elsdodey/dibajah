<?php


namespace App\Http\Traits;



use Illuminate\Support\Facades\Http;

trait SendMessage
{
    private $url = 'https://sms.malath.net.sa/httpSmsProvider.aspx';
    public function sendMessage($phone,$message)
    {

        if (substr( $phone, 0, 3 ) != "966")
        {
         $phone = '966'.$phone;
        }
        $method = array(
          'message' =>$message,
          'mobile'=>$phone,
          'username'=>env('MALATH_USER'),
          'password'=>env('MALATH_PASSWORD'),
          'unicode'=>'none',
          'sender'=>env('MALATH_SENDER'),
        );
       return Http::get($this->url,$method);
    }//end fun

}//end trait
