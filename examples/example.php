<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Nichin79\Encryption\Encryption;

$conf = [
  'passphrase' => 'pass1234',
];

$encryption = new Encryption($conf);

$string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
$encrypted = $encryption->encrypt($string);
$decrypted = $encryption->decrypt($encrypted);

echo "Original String: $string\r\n";
echo "Encrypted String: $encrypted\r\n";
echo "Decrypted String: $decrypted\r\n";
