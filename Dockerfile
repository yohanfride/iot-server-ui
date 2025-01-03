# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Install required packages
RUN apt-get update && apt-get install -y \
    zip \
    git \
    && rm -rf /var/lib/apt/lists/*

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install

# Install any needed PHP extensions
RUN docker-php-ext-install mysqli

# Expose port 80 to the world outside this container
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
