FROM php:8.2-apache

# Installe l'extension PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Active le mod_rewrite
RUN a2enmod rewrite

# Config Apache pour autoriser .htaccess
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/mvctube.conf \
&& a2enconf mvctube

# Copie tout le projet dans Apache
COPY . /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80