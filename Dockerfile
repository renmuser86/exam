FROM ubuntu/apache2:2.4-22.04_beta
WORKDIR /var/www/app
COPY ./web /var/www/app

RUN sed -i 's|/var/www/html|/var/www/app|g' /etc/apache2/sites-available/000-default.conf
RUN chown -R www-data:www-data /var/www/app && chmod -R 755 /var/www/app

RUN echo "root:1324" | chpasswd

RUN apt-get update && apt-get install -y \
    mariadb-server \
    php \
    php-mysqli \
    openssh-server \
    && apt-get clean

RUN service mariadb start && \
    echo " \
    CREATE DATABASE application; \
    USE application; \
    CREATE TABLE users ( \
        id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, \
        username VARCHAR(25) NOT NULL, \
        password VARCHAR(100) NOT NULL, \
        email VARCHAR(50) \
    ); \
    CREATE TABLE posts ( \
        id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, \
        title VARCHAR(100) NOT NULL, \
        main_text TEXT NOT NULL \
    ); \
    CREATE USER 'application_admin'@'%' IDENTIFIED BY '1324'; \
    GRANT ALL PRIVILEGES ON application.* TO 'application_admin'@'%'; \
    FLUSH PRIVILEGES;" | mysql

RUN mkdir -p /var/www/app/upload
RUN chown -R www-data:www-data /var/www/app/upload && \
    chmod -R 755 /var/www/app/upload

EXPOSE 22
EXPOSE 3306
EXPOSE 80

CMD service mariadb start && \
    service ssh start && \
    apachectl -D FOREGROUND
