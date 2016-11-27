0) Logiciel : XAMPP

1) Activer les droits public read+write à tous les php (chmod 777)

2) Se connecter à MySQL avec PDO :
Sous Linux, dans etc/php.ini
chercher : pdo_mysql.default_socket
modifier : pdo_mysql.default_socket = /opt/lampp/var/mysql/mysql.sock