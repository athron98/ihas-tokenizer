<?php

namespace Athron98\iHAS;

class Tokenizer
{
    protected $user, $uuid;

    public function __construct($credential = array())
    {
        $this->user = $credential[0];
        $this->uuid = $credential[1];
    }

    public function getHeader($user = null, $uuid = null)
    {
        if(is_null($user)){
            $user = $this->user;
        }

        if(is_null($uuid)){
            $uuid = $this->uuid;
        }

        $header = [
            'X-iHAS-AUTH-MODE' => 'TOKEN',
            'X-iHAS-AUTH-TOKEN' => $this->getToken($user, $uuid),
            'X-iHAS-AUTH-USER' => $user,
        ];
        $return = '';
        foreach ($header as $key => $value) {
            $return .=  "$key: $value" . PHP_EOL;
        }
        return $return;
    }


    public function getToken($user = null, $uuid = null)
    {

        if(is_null($user)){
            $user = $this->user;
        }

        if(is_null($uuid)){
            $uuid = $this->uuid;
        }


        $hash = hash_hmac('sha512',strtolower($user),strtolower($uuid));
        date_default_timezone_set("Asia/Jakarta");
        $token = openssl_encrypt(round(microtime(true)) . ':' . $user,"AES-128-ECB",$hash);

        return $token;
    }
}