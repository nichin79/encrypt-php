<?php
namespace Nichin79\Encryption;

class Encryption
{
  private string $ciphering = "aes-256-cbc";
  private string $passphrase;
  private int $options = 0;
  private int $iv_length;
  private string $iv;
  private ?string $tag = null;
  private string $aad = "";
  private int $tag_length = 16;

  public function __construct(array $conf = [])
  {
    if (count($conf) === 0) {
      throw new \Error('Encryption conf missing or empty');
    }

    if (!isset($conf['passphrase']) || empty($conf['passphrase'])) {
      throw new \Error('Missing encryption passphrase');
    }

    foreach ($conf as $key => $value) {
      $this->{$key} = $value;
    }

    $this->iv_length = openssl_cipher_iv_length($this->ciphering);
    $this->iv = random_bytes($this->iv_length);
  }

  public function encrypt($data)
  {
    $encryption = openssl_encrypt($data, $this->ciphering, $this->passphrase, $this->options, $this->iv, $this->tag, $this->aad, $this->tag_length);
    return $encryption . '.' . bin2hex($this->iv);
  }

  public function decrypt($data)
  {

    $data = explode('.', $data);
    $decryption = openssl_decrypt($data[0], $this->ciphering, $this->passphrase, $this->options, hex2bin($data[1]), $this->tag, $this->aad);

    if (empty($decryption)) {
      throw new \Exception('Decryption failed, invalid conf or passphrase');
    }

    return $decryption;
  }
}