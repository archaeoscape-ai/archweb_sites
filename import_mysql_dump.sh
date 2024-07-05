#!/bin/bash

# Start MySQL service
service mysql start

if [ ! -d /var/lib/mysql/$MYSQL_DATABASE ]; then
    mysql -u root -e "CREATE DATABASE IF NOT EXISTS $MYSQL_DATABASE;"
    mysql -u root -e "CREATE USER IF NOT EXISTS '$MYSQL_USER'@'localhost' IDENTIFIED BY '$MYSQL_PASSWORD';"
    mysql -u root -e "GRANT ALL PRIVILEGES ON $MYSQL_DATABASE.* TO '$MYSQL_USER'@'localhost';"
    # Attempt to enforce "mysql_native_password" authentication instead of "caching_sha2_password"
    mysql -u root -e "ALTER USER '$MYSQL_USER'@'localhost' IDENTIFIED WITH mysql_native_password BY '$MYSQL_PASSWORD';"
    mysql -u root -e "FLUSH PRIVILEGES;"
    # Import the database dump
    if [ -f /docker-entrypoint-initdb.d/mysql_dump_pkks.sql ]; then
        mysql -u $MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE < /docker-entrypoint-initdb.d/mysql_dump_pkks.sql
    fi
fi
