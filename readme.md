Neo4j PHP Example
=================

Requires composer and docker

Install and set up the application:

    composer install
    cp ./docker/php-dev/ssmtp.sample.conf ./docker/php-dev/ssmtp.conf
    docker-compose up -d

Visit localhost:47474 and change the password to “demo”

Populate the database:

    ./artisan-docker db:seed

Visit http://localhost:40080/

### Links:
* [GraphAware Neo4j PHP OGM](https://github.com/graphaware/neo4j-php-ogm)
* [Lumen Docs](https://lumen.laravel.com/docs/5.2)
