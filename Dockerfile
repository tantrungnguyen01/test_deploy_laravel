# Sử dụng PHP 7.4 làm base image
FROM php:7.4-fpm

# Cài đặt các extension PHP cần thiết
RUN apt-get update && apt-get install -y \
        libmcrypt-dev \
        libpq-dev \
        libcurl4-gnutls-dev \
        libicu-dev \
        libvpx-dev \
        libjpeg-dev \
        libpng-dev \
        libxpm-dev \
        zlib1g-dev \
        libfreetype6-dev \
        libxml2-dev \
        libexpat1-dev \
        libbz2-dev \
        libgmp3-dev \
        libldap2-dev \
        unixodbc-dev \
        libsqlite3-dev \
        libaspell-dev \
        libsnmp-dev \
        libpcre3-dev \
        libtidy-dev \
        libzip-dev \
        zip \
        unzip

# Cài đặt composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Thiết lập thư mục làm việc
WORKDIR /app

# Sao chép các file ứng dụng vào container
COPY . /app
RUN rm -rf /var/lib/apt/lists/* /var/cache/apt/* /tmp/* /var/tmp/* /usr/share/doc/*
RUN composer clear-cache && \
    composer install --no-interaction --optimize-autoloader --no-dev && \
    composer dump-autoload --no-dev --classmap-authoritative
# Cài đặt các gói ứng dụng đã định nghĩa trong composer.json
RUN composer install --no-interaction

# Chạy các câu lệnh tạo CSDL và chạy các migration
RUN php artisan migrate --force

# Thiết lập môi trường cho ứng dụng
ENV APP_NAME=myapp
ENV APP_ENV=production
ENV APP_KEY=base64:X4XXxxXXXX467y4lXXXXXXc7zSglS0H0aVZ71/UkuM=
ENV APP_DEBUG=false
ENV APP_URL=http://localhost
ENV LOG_CHANNEL=stack
ENV DB_CONNECTION=mysql
ENV DB_HOST=127.0.0.1
ENV DB_PORT=3306
ENV DB_DATABASE=myapp
ENV DB_USERNAME=myapp
ENV DB_PASSWORD=secret


# Thiết lập port mặc định cho ứng dụng Laravel
EXPOSE 9000

# Chạy ứng dụng
CMD php-fpm
