# Plateforme de micro-blogging

## Pré-requis : installer l'environnement Docker du projet

-   Installer Docker, et s'assurer qu'il tourne en local sur votre machine

    ```
    docker info
    ```

    Installez Docker via le [site officiel de Docker](https://docs.docker.com/get-docker/).

    Pour les Windows, choisissez l'option d'installation de Docker **avec WSL 2**, qu'il vous faudra donc avoir installé au préalable. Voir la [doc officielle de WSL 2](https://learn.microsoft.com/fr-fr/windows/wsl/install).

---

-   Ouvrir le projet dans VSCode

---

-   Copier le fichier `.env.example` vers `.env`

    ```
    cp .env.example .env
    ```

    ❗️ Cette étape est **essentielle** pour permettre la bonne configuration de l'environnement Docker du projet.

---

-   Installer l'extension VSCode "Dev Containers"

---

-   Ré-ouvrir le projet dans VSCode **dans Docker** avec la commande "Reopen in Container"

    Le projet s'ouvre normalement dans une nouvelle fenêtre VSCode, et démarre le téléchargement des images Docker, puis la construction et l'exécution des containers associés. Cela peut prendre quelques minutes en fonction de la bande passante réseau et de la puissance de votre machine.

    À cette étape, VSCode vous propose normalement d'ouvrir les logs Docker, faites-le, essayez de comprendre ce qui s'y déroule, et assurez-vous qu'il n'y ait pas d'erreur.

    ❓ Une fois terminé, votre projet tourne "sous Docker". Selon vous, qu'est ce que cela signifie ?

    ❓ Observez également les extensions VSCode installées. D'où viennent ces extensions PHP / Laravel ?


## Démarrer l'application Laravel

-   Ouvrir le terminal de VSCode.

    ❓ Observez-bien le prompt de votre terminal VSCode. Selon vous, où s'exécute ce terminal ?

---

-   Installer les dépendances PHP via `composer`

    ```
    composer install
    ```

    Composer est le package manager par défaut de PHP (l'équivalent de `npm` en Node/JS). Les dépendances du projet (i.e. les librairies externes nécessaires) sont décrites dans le fichier `composer.json`. Une fois téléchargées elles sont installées dans le dossier `vendor`.

    ❓ Selon vous, doit-on commiter ce dossier `vendor` dans le git du projet ?

---

-   Générer votre "application encryption key" nécessaire à toute application Laravel

    ```
    php artisan key:generate`
    ```

    Cette commande génère une clé qui est ensuite stockée dans la variable `APP_KEY` de votre `.env`.

---

-   Lancer le serveur web interne à Laravel

    ```
    php artisan serve
    ```

    Vous devriez voir la page par défaut de Laravel en ouvrant l'url indiquée (http://127.0.0.1:8000 si tout se passe bien).

    🎉 Bravo, vous l'avez fait, vous avez une application Laravel qui tourne sous Docker !

    À ce stade, prenez le temps de vous familiariser avec le fonctionnement de Laravel, en parcourant la doc officielle (fortement recommandé) ou en suivant quelques tutos. Voir les liens à la fin de ce README.

## Gestion de la base de données (PostgreSQL)

-   Accéder à l'interface d'admin "pgAdmin"

    ❓ En inspectant le `docker-compose.json` (et éventuellement le `.env`) pouvez-vous en déduire l'url de connexion à "pgAdmin", ainsi que ses identifiants de connexion ?

---

-   Une fois connecté à "pgAdmin", configurer la connexion à votre base de données locale, en ajoutant un nouveau "server".

    Les identifiants de connexion sont les mêmes que ceux configurés dans le `docker-compose.json` (et le `.env`).

    ❗️ Un détail important lié à Docker : le "host" de connexion correspond à l'url du PostgreSQL **à l'intérieur** du réseau Docker. Plutôt que de chercher l'adresse IP interne de votre PG (ce qui est tout à fait possible si vous avez envie d'un défi supplémentaire), vous pouvez utiliser directement le nom défini au sein du `docker-compose.yml` pour le service PG (= `pgsql`).

    🎉 Une fois connecté, vous devriez voir une base nommée `microblogging` (i.e le nom correspondant à la variable `DB_DATABASE` du `.env`). Notez que la base existe mais est vide.

---

-   Initialiser la base de données, en effectuant les migrations Laravel existantes par défaut.

    ```
    php artisan migrate
    ```

    À ce stade, observez les tables créées dans votre base PG, et comprenez le lien avec les fichiers présents dans le dossier `database/migrations` du projet.

## À propos de Laravel

<p><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a></p>

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

### Se familiariser avec Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.
