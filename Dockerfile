# Base image
FROM php:8.0-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set working directory inside the container
WORKDIR /var/www/html

# Copy project files from the HRMS subfolder into the container
COPY HRMS/ /var/www/html/

# Set correct permissions for the project files
RUN chown -R www-data:www-data /var/www/html

# Enable Apache mod_rewrite (optional, but useful for clean URLs)
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]
