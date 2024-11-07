# Use an official PHP image with Apache
FROM php:8.1-apache

# Install dependencies
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy project files to Apache's document root
COPY . /var/www/html

# Set working directory to /var/www/html/pages
WORKDIR /var/www/html/pages

# Update Apache configuration to use /var/www/html/pages as DocumentRoot
RUN sed -i 's|/var/www/html|/var/www/html/pages|g' /etc/apache2/sites-available/000-default.conf

# Set permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80
