FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

# !! Hack !! Adding unofficial php5.6 apt reposity
RUN apt-get update && apt-get install -y software-properties-common && add-apt-repository ppa:ondrej/php
RUN apt-get update && apt-get install -y  apache2 mysql-server mysql-client mysql-common php5.6 php5.6-cli php5.6-mysql php5.6-mysqli vim

# Import mysql database dump
ENV MYSQL_ROOT_PASSWORD=rootpwd
ENV MYSQL_DATABASE=coredata
ENV MYSQL_USER=coreaccess
ENV MYSQL_PASSWORD=Safari_1
COPY ./mysql_dump_pkks.sql /docker-entrypoint-initdb.d/
COPY ./import_mysql_dump.sh /import_mysql_dump.sh
RUN chmod +x /import_mysql_dump.sh
RUN bash /import_mysql_dump.sh

# Doublecheck that mysql user has the proper permissions
RUN usermod -d /var/lib/mysql/ mysql
RUN chmod -R 755 /var/lib/mysql/
RUN usermod -d /var/run/mysqld mysql
RUN chmod -R 755 /var/run/mysqld

# mysql: Attempt to enforce "mysql_native_password" authentication instead of "caching_sha2_password"
RUN echo '[mysqld]' >> /etc/mysql/mysql.cnf
RUN echo 'default_authentication_plugin=mysql_native_password' >> /etc/mysql/mysql.cnf
RUN echo 'sql-mode=""' >> /etc/mysql/my.cnf

# Apache/php: Fix query attempt at the wrong socket
RUN sed -i 's|;mysql.default_socket =|mysql.default_socket = /var/run/mysqld/mysqld.sock|' /etc/php/5.6/apache2/php.ini
RUN sed -i 's|;mysqli.default_socket =|mysqli.default_socket = /var/run/mysqld/mysqld.sock|' /etc/php/5.6/apache2/php.ini

# Apache: Fix complain about servername
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copy the whole html folder
RUN rm -r /var/www/html/*
COPY ./html/ /var/www/html/

# Export port 80, start Apache
EXPOSE 80
CMD service mysql start && service apache2 start && tail -f /var/log/apache2/access.log /var/log/apache2/error.log
