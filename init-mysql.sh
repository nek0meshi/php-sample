#!/bin/sh
EXEC="docker exec php-sample-db"
$EXEC bash -c "chmod 0755 /docker-entrypoint-initdb.d/sql/seed.sh"
$EXEC bash -c "/docker-entrypoint-initdb.d/sql/seed.sh"