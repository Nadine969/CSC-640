FROM php:8.2-fpm

# Install NGINX, Supervisor, and MySQL extensions
RUN apt-get update && apt-get install -y nginx supervisor && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    mkdir -p /var/log/supervisor

# Copy configuration files
COPY nginx.conf /etc/nginx/nginx.conf
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy project files (the /api folder with your PHP code)
COPY ./api /var/www/html

WORKDIR /var/www/html
EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]