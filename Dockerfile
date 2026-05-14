FROM php:8.2-apache

# ✅ Installe l'extension PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copie tout le projet dans Apache
COPY . /var/www/html/

# Active le mod_rewrite pour les URLs propres
RUN a2enmod rewrite

# Permet au .htaccess de fonctionner
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80