<?php


namespace App\Service;


class WsseGenerator
{

    public static function prepareWsseHeader($username, $password) : array
    {
        $nonce = '';
        $chars = "0123456789abcdef";
        for ($i = 0; $i < 32; $i++) {
            $nonce .= $chars[rand(0, 15)];
        }
        $nonce64 = base64_encode($nonce) ;
        $date = gmdate('c');
        $date = substr($date,0,19)."Z" ;

        // Getting the password digest
        $digest = base64_encode(sha1($nonce.$date.$password, true));

        // Getting the X-WSSE header to put in your request
        $wsseHeader ['headers']['X-WSSE'] = sprintf('X-WSSE: UsernameToken Username="%s", PasswordDigest="%s", Nonce="%s", Created="%s"',$username, $digest, $nonce64, $date);
        return $wsseHeader;
    }
}