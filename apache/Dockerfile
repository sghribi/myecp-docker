FROM debian:jessie

# Install apache2 / PHP + exts
RUN apt-get update && apt-get install -y apache2 php5 curl php5-ldap php5-gd php5-curl php5-cli php5-intl php-apc php5-pgsql php5-mysql php5-sqlite phpunit

# Configure MyECP Vhost
ADD myecp.conf /etc/apache2/sites-available/
RUN a2dissite myecp.conf

# Configure Apache2 modules
RUN a2enmod rewrite && a2enmod ssl

# Generate SSL certificates
RUN mkdir /etc/apache2/ssl && openssl req -x509 -nodes -days 365 -newkey rsa:4096 -keyout /etc/apache2/ssl/myecp.key -out /etc/apache2/ssl/myecp.crt -subj '/CN=myecp/O=MyECP/C=FR'

# Install CACert certificates
RUN apt-get install -y ca-certificates && \
    cd /usr/share/ca-certificates/ && \
    mkdir cacert.org && \
    echo "cacert.org/root.crt" >> /etc/ca-certificates.conf && \
    echo "cacert.org/class3.crt" >> /etc/ca-certificates.conf
ADD root.crt /usr/share/ca-certificates/cacert.org/
ADD class3.crt /usr/share/ca-certificates/cacert.org/
RUN update-ca-certificates

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Fix write rights for Mac
RUN usermod -u 1000 www-data

# Run Apache2
CMD ["apache2", "-D", "FOREGROUND"]

EXPOSE 80
EXPOSE 443

