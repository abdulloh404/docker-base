<?php
require_once('./Net/SSH2.php');

$ssh = new Net_SSH2('209.97.172.11', 22);
if (!$ssh->login('root', 'Pan!@#*^&%3@2637348^%$@##$_SOD112PS')) {
    exit('Login Failed');
}
echo '<xmp>';
echo $ssh->exec('cd /var/www/devkku/;git pull origin dev;');
echo '</xmp>';