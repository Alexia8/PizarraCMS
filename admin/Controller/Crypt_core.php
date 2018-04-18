<?php

/**
 * Description of Crypt_core Class that encrypts and decrypts input passed as parameter with a specific key
 * @property STRING $key Key that is used to encrypt input received
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class Crypt_core {

    private static $Key;

    function __construct($Key) {
        Crypt_core::$Key = $Key;
    }

    public static function encrypt($input) {
        $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(Crypt_core::$Key), $input, MCRYPT_MODE_CBC, md5(md5(Crypt_core::$Key))));
        return $output;
    }

    public static function decrypt($input) {
        $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Crypt_core::$Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5(Crypt_core::$Key))), "\0");
        return $output;
    }

}
