## I/ Instatltion du serveur LAMP https://www.it-connect.fr/installer-un-serveur-lamp-linux-apache-mariadb-php-sous-debian-11/


### 1. En 1er on commence par mettre à jour le cache des paquets :
    sudo apt-get update 
    sudo apt-get upgrade


### 2. Ensuite, on installe le paquet "apache2" afin d'obtenir la dernière version d'Apache 2.4.38 :

    sudo apt-get install -y apache2

Pour qu'Apache démarre automatiquement en même temps que Debian
    
    sudo systemctl enable apache2

Version Apache/2.4.38

    sudo apache2ctl -v

Activation de quelques modules d'Apache :
    
    sudo a2enmod rewrite
    sudo a2enmod deflate
    sudo a2enmod headers
    sudo a2enmod ssl

Redémarrer le service apache2 
    
    sudo systemctl restart apache2

L'authentification
    
    sudo apt-get install -y apache2-utils


### 3. Puis, on installe PHP :
    
    sudo apt-get install -y php
    sudo apt-get install -y php-pdo php-mysql php-zip php-gd php-mbstring php-curl php-xml php-pear php-bcmath

Version PHP 7.3.31
    
    php -v 

Pour nous assurer que notre moteur de script PHP est bien actif, nous allons créer un fichier "phpinfo.php" à la racine de notre site Web
    
    sudo nano /var/www/html/phpinfo.php
        <?php
        phpinfo();
        ?>


### 4. Puis on installe MariaDB :

    sudo apt-get install -y mariadb-server

Exécuter le script "mariadb-secure-installation" afin de sécuriser l'installation de MariaDB.
    sudo mariadb-secure-installation
    ou
    sudo mysql_secure_installation

    En résumé, vous allez pouvoir définir un mot de passe pour le compte "root" de MariaDB, 
    empêcher les connexions distantes sur votre instance à l'aide du compte "root", 
    empêcher les connexions anonymes et supprimer la base de test.

    Switch to unix_socket authentication [Y/n] n
    ... skipping.

    Change the root password? [Y/n] Y
    New password: root

    Remove anonymous users? [Y/n] y
    ... Success!

    Disallow root login remotely? [Y/n] y
    ... Success!

    Remove test database and access to it? [Y/n] y

    Reload privilege tables now? [Y/n] y
    ... Success!

Version mariadb : Ver 15.1 Distrib 10.3.38

    mariadb -V

Connection à l'instance MariaDB ou MySQL
    
    sudo mariadb -u root -p
        mdp root
    show databases;
    exit

Redémarrer le service avec la commande suivante en choisisant l'user 1 pi mdp pi
    
    systemctl restart mariadb

### 5. Puis création de la BDD Distri_Baguette avec le fichier Distri_Baguette.sql

Pour utiliser la BDD :
    
    USE Distri_Baguette;

### 6. a/ Installer phpmyadmin : https://doc.ubuntu-fr.org/phpmyadmin et https://www.hostinger.com/tutorials/how-to-install-and-setup-phpmyadmin-on-ubuntu

    sudo apt install phpmyadmin 
        apache2 ok
        mdp co MySQL pour phpmyadmin: root

    sudo phpenmod mbstring

Redémarrer Apache
    
    sudo systemctl restart apache2

#### b/ Configurer l'utilisateur et accorder des autorisations

Accordez des autorisations à phpmyadmin :
    
    sudo mysql -u root -p
        GRANT ALL PRIVILEGES ON *.* TO 'phpmyadmin'@'localhost';
        FLUSH PRIVILEGES;
        EXIT

#### c/ Accéder à phpMyAdmin sur un navigateur
    http://172.20.233.50/phpmyadmin
    Connectez-vous avec le nom d'utilisateur phpmyadmin et le mot de passe MySQL que vous avez définis lors de l'étape a/ .
    
#### d/ Créez un nouvel utilisateur MySQL dédié avec tous les privilèges
    sudo mysql -u root -p
        CREATE USER Admin IDENTIFIED by 'Admin';
        GRANT ALL PRIVILEGES ON *.* TO 'Admin'@'localhost';
        FLUSH PRIVILEGES;
        EXIT

si message d'erreur sur les privileges 

    sudo sed -i "s/|\s*\((count(\$analyzed_sql_results\['select_expr'\]\)/| (\1)/g" /usr/share/phpmyadmin/libraries/sql.lib.php
___

## II/ Description des tables
```
TABLE Boulangerie :
    nom = nom de la Boulangerie
    user = le nom d'utilisateur donner pour accéder au compte du site

TABLE Distributeur :
    f_boulangerie = clé étrangère FK
    nom = nom du distributeur
    max_stock = le stock max du distributeur
    prix = prix de la baguette
    seuil_de_declenchement = indicateur pour savoir si il faut remplir le distri
 

TABLE Mesure :
    f_distributeur = clé étrangère FK
    etat = état du distributeur en fonction ou non
    stock_live = le stock en temps réel
    hygrométrie = %
    temperature = °C
    horodatage = date + heure
```
