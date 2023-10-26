# Encrypt-PHP

Simple class for openssl_encrypt and openssl_decrypt functionality for PHP

**Example**

```
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Nichin79\Encryption\Encryption;

$encryption = new Encryption([
  'passphrase' => 'pass1234',
]);

$string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
$encrypted = $encryption->encrypt($string);
$decrypted = $encryption->decrypt($encrypted);

echo "\r\nOriginal String:\r\n$string\r\n";
echo "\r\nEncrypted String:\r\n$encrypted\r\n";
echo "\r\nDecrypted String:\r\n$decrypted\r\n";
```
