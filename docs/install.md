# Procédure d'installation

Détail de la procédure utilisée pour l'installation du projet en environnement de DEV.

## Pré-requis
Il faut installer un environnement de développement pour le projet ; mais nous n'allons pas détail cette procédure ;)

_Pour le reste du document, on assume que le projet est installer dans le répertoire `~/Projects/ForgeKiosk`

    mkdir -p ~/Projects/ForgeKiosk
    pushd ~/Projects/ForgeKiosk

## Variables

On définit les variables du projet :

    PROJECT="forgekiosk"
    DBUSER="forgekioskadmin"
    DBPASS="$(apg -q -a  0 -n 1 -m 11 -M NCL)" && echo "MySQL Pass : ${DBPASS}"

_Ici, j'utilise l'utilitaire `apg` pour générer un mot de passe. Mais on peut évidement créer la variable à la main._

## Récupérer le dépot

Le projet est disponible sur [Github](https://github.com/), <https://github.com/ThierryLag/ForgeKiosk>

On peut utilisé une application graphique ou la ligne de commande :

    pushd ~/Projects/ForgeKiosk
    git clone https://github.com/ThierryLag/ForgeKiosk ./

_Les développements sont dans la branche `dev`, la branche `master` reste vide pour le moment.

## Droits d'accès

Laravel stoque les informations temporaires dans une série de répertoires placé dans `app/storage` ;
il faut donner les droits en écritures sur les sous-répertoires de `storage`.

    sudo chgrp www-data app/storage/* && chmod g+w app/storage/*

## Base de données

Création de la base de données avec les variables définies ci-dessus :

    mysql -h'localhost' -u'root' -p -e "CREATE SCHEMA \`${PROJECT}\` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci; GRANT ALL PRIVILEGES ON \`${PROJECT}\`.* TO '${DBUSER}'@localhost IDENTIFIED BY '${DBPASS}'; FLUSH PRIVILEGES;"

Ensuite, on configure la connexion dans le fichier :

    cat > app/config/database.php <<EOL
    <?php
    return array(
        'profile' => false,
        'fetch' => PDO::FETCH_CLASS,
        'default' => 'mysql',
        'connections' => array(
            'mysql' => array(
                'driver'   => 'mysql',
                'host'     => 'localhost',
                'database' => '${PROJECT}',
                'username' => '${DBUSER}',
                'password' => '${DBPASS}',
                'charset'  => 'utf8',
                'prefix'   => '',
            )
        ),
        'migrations' => 'migrations',
        'redis' => array(
            'default' => array(
                host'     => '127.0.0.1',
                'port'     => 6379,
                'database' => 0,
            ),
        ),
    );
    EOL

_On peut évidement modifier le fichier existant au lieu de le remplacer._

### Migrations

Pour travailler sur la base de données, on utilise le système de [migrations de Laravel](http://four.laravel.com/docs/migrations).

La structure de la BDD sera mise à jour par la commande

    php artisan migrate