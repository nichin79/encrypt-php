<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Nichin79\Encryption\Encryption;

$encryption = new Encryption([
  'passphrase' => 'pass1234',
]);

$string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis volutpat leo, a laoreet tellus. Donec bibendum est ut leo mattis, eget aliquam justo vehicula. Vestibulum sollicitudin nibh eget magna pulvinar tristique. Duis sed auctor purus. Proin ac malesuada mi. Aenean at scelerisque felis, pharetra mollis turpis. Etiam a gravida nisl. Maecenas sit amet facilisis risus. Integer gravida turpis vel nisi dapibus, sed feugiat risus sollicitudin. Pellentesque bibendum, velit vitae placerat rutrum, augue lacus fermentum turpis, et finibus lectus enim non metus. Donec nec felis augue. Nam dapibus sollicitudin tortor vitae congue.';
$encrypted = $encryption->encrypt($string);
$decrypted = $encryption->decrypt($encrypted);

echo "\r\nOriginal String:\r\n$string\r\n";
echo "\r\nEncrypted String:\r\n$encrypted\r\n";
echo "\r\nDecrypted String:\r\n$decrypted\r\n";