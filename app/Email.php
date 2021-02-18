<?php
namespace App;

use Mail;
use App\AdresseMailGlobal;
class Email
{
    public static $adresseMailDestinataire= "arcelekenmene3@gmail.com";

    public function sendMailContacts($title, $content, $user_email, $user_name)
    {
           
        try
        {
            $data = ['email'=> $user_email,'name'=> $user_name,'subject' => $title, 'nom' => $content["nom"], 'tel' => $content["tel"], 'emailClient' => $content["email"], 'msg' => $content["msg"]];
            Mail::send('emails.contact', $data, function($message) use($data)
            {
                $subject=$data['nom']." - ".$data['subject'];
                $message->from($data['emailClient']);
                $message->to($data['email'], $data['name'])->subject($subject);
            });

            return 'OK';
        }
        catch (\Exception $e)
        {
            //dd($e->getMessage());
            return 'KO';
        }

    }

    public function sendMailCommand($title, $content, $user_email, $user_name)
    {
           
        try
        {
            $data = ['email'=> $user_email,'name'=> $user_name,'subject' => $title, 'nom' => $content["nom"], 'tel' => $content["tel"], 'emailClient' => $content["email"], 'cart' => $content["cart"]];
            Mail::send('emails.command', $data, function($message) use($data)
            {
                $subject=$data['nom']." - ".$data['subject'];
                $message->from($data['emailClient']);
                $message->to($data['email'], $data['name'])->subject($subject);
            });

            return 'OK';
        }
        catch (\Exception $e)
        {
            //dd($e->getMessage());
            return 'KO';
        }

    }
}