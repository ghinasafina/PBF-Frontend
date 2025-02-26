# Gunakan image resmi PHP + Apache
FROM php:8.1-apache

# Install ekstensi PHP yang diperlukan
RUN docker-php-ext-install pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy semua file proyek Laravel
COPY . .

# Beri izin ke storage dan bootstrap
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Jalankan Laravel dengan Apache
CMD ["apache2-foreground"]
