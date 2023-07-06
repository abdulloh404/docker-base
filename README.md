# Aldxdeveloper Docker Setup
Docker setup genaral

# Setup

Copy File Env  
`
cp .env-example .env
`  
`
cp src/.env-example .env
`

Setup env  
`
vim .env
`  
`
vim src/.env
`  

# Phpmyadmin Setup 
`
vim .docker/mysql/phpmyadmin/config.user.inc.php
`
$cfg['Servers'][$i]['auth_type'] = 'config';
$cfg['Servers'][$i]['user'] = 'root';
$cfg['Servers'][$i]['password'] = '';

# Run Docker  
`
docker-compose up -d
`


# Dependencies Install
`
docker-compose run composer update --ignore-platform-reqs
`  

`
docker-compose run npm update
`  

# localhost 
http://localhost:80



# Phpmyadmin 
http://localhost:81

