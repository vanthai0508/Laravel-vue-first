FROM php:8.3-fpm

RUN apt-get update \
  && apt-get install -y supervisor unzip libzip-dev libpq-dev \
  && docker-php-ext-install zip pdo_mysql pdo_pgsql pgsql

RUN docker-php-ext-install pcntl

# Copy các tệp cấu hình và scripts
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Khởi động Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
