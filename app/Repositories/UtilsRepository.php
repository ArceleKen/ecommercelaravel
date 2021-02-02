<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class UtilsRepository
{
    public function postRequest($data, $url)
    {
        $headers = array(
            "Content-Type: application/json");
        $curl = curl_init();
        //var_dump($curl);
        if (FALSE === $curl) {
            throw new \Exception('failed to initialize');
        }


        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            //CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POST => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => json_encode($data)
        ));
        // Send the request & save response to $resp
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        /*echo curl_getinfo($curl) . '<br/>';
        echo curl_errno($curl) . '<br/>';
        echo curl_error($curl) . '<br/>';*/
        // Close request to clear up some resources
        curl_close($curl);

        //var_dump($resp); die();
        return $resp;

    }


    public function envoi($params, $url, $isPostRequest)
    {
        try {
            $curl = curl_init();
            if (FALSE === $curl)
                throw new \Exception('failed to initialize');
            curl_setopt($curl, CURLOPT_URL, $url . $params);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_POST, 1);

            curl_setopt($curl, CURLOPT_VERBOSE, false);

            $content = curl_exec($curl);

            var_dump($content);

            if (FALSE === $content)
                throw new \Exception(curl_error($curl), curl_errno($curl));

            // ...process $content now
        } catch (\Exception $e) {

            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);

            //die();
        }
        curl_close($curl);

        return $content;
    }

    public function colunms($data)
    {
        $colones = array();
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $colones[] = $key;
            }
        }

        return $colones;

    }

   


}