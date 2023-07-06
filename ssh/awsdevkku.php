<?php
require_once('/var/ssh/vendor/autoload.php');
use phpseclib3\Net\SSH2;
use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Crypt\RSA;
use phpseclib3\Net\SFTP;

$host = "18.139.25.57";
//$key = PublicKeyLoader::load(file_get_contents('/var/ssh/musion-ssh.pem'));
$key = PublicKeyLoader::load(file_get_contents('/var/ssh/musion-ssh.pem'), '');


// in case that key has a password
//$privateKey->setPassword('private key password');

// create new RSA key
//$privateKey = new RSA();

// load the private key
//$privateKey->loadKey(file_get_contents('/var/ssh/musion-ssh.pem'));

$ssh = new SSH2($host);
//$ssh = new SFTP($host);
if (!$ssh->login('ec2-user', $key)) {
    exit('Login Failed');
}
echo '<xmp>';
echo $ssh->exec('cd /home/ec2-user/packed_docker/;git pull origin dev;');
echo '</xmp>';