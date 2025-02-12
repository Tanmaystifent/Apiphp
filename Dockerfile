# Use PHP with Apache
FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Copy all files to the container
COPY . /var/www/html/

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
