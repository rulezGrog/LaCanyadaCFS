<?php
//página de funciones

                //*********** FUNCIONES NUEVAS DE ENCRIPTACION-DESENCRIPTACION ****************//

                define ('ENCRYPT_KEY2',"bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=");

                function encrypt($data) {
                    // Remove the base64 encoding from our key
                    $encryption_key = base64_decode(ENCRYPT_KEY2);
                    // Generate an initialization vector
                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
                    // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
                    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
                    // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
                    return base64_encode($encrypted . '::' . $iv);
                }

                function decrypt($data) {
                    // Remove the base64 encoding from our key
                    $encryption_key = base64_decode(ENCRYPT_KEY2);
                    // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
                    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
                    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
                }

                //*********** "FIN" FUNCIONES NUEVAS DE ENCRIPTACION-DESENCRIPTACION ****************//




                //Función que limpia los putos ��� de los cojones
                function Clean88($string)
                {
                    $string = iconv('UTF-8', 'UTF-8//IGNORE', $string);
                    return preg_replace('~\p{C}+~u', '', $string);
                    return preg_replace(array('~\r\n?~', '~[^\P{C}\t\n]+~u'), array("\n", ''), $string);
                }

                //FUNCIÓNQ QUE SUMA +1 AL CONTADOR DE PEDIDOS PARA LOS REGISTROS INTERNOS DE JUGADORES
                function nextCount($value) {
                  $intNum = intval($value) + 1;
                  $strNum = strval($intNum);
                  while(strlen($strNum) < 12) {
                    $strNum = "0" . $strNum;
                  }
                  return $strNum;
                }




























                                //*********** FUNCIONES VIEJAS DE ENCRIPTACION-DESENCRIPTACION ****************//
                                // define ('ENCRYPT_KEY',"ZUH+nKZkaBb8tho");

                                // function decrypt($in)
                                // {
                                //     $in = base64_decode($in);
                                //     $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
                                //     $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
                                //     $dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_256,ENCRYPT_KEY, $in, MCRYPT_MODE_ECB, $iv);
                                //
                                //     return $dec;

                                // function encrypt($in)
                                // {
                                //     $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
                                //     $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
                                //     $enc = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, ENCRYPT_KEY, $in, MCRYPT_MODE_ECB, $iv);
                                //     $enc = base64_encode($enc);
                                //     return $enc;
                                // }
                                //*********** "FIN" FUNCIONES VIEJAS DE ENCRIPTACION-DESENCRIPTACION ****************//


?>
