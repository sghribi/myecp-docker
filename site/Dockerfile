FROM php:5.6-apache
 
RUN apt-get update && \
    apt-get install -y \
    apt-utils \
    libpq-dev \
    libxml2-dev \
    libicu-dev \
    libldb-dev \
    libldap2-dev \
    libmcrypt-dev

RUN docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ && docker-php-ext-install pdo pdo_pgsql pgsql pdo_mysql mcrypt mysql mysqli intl ldap pgsql sqlite3

# Workaround for write permission on write to MacOS X volumes
# See https://github.com/boot2docker/boot2docker/pull/534
RUN usermod -u 1000 www-data
 
# Enable Apache mod_rewrite
RUN a2enmod rewrite
