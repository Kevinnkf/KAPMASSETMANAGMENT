FROM app-registry.kai.id/baseimage/web-esa-app:1.0 as app

# Salin proyek Laravel ke direktori yang sesuai
COPY . /var/www/html/

WORKDIR /var/www/html

RUN composer install --no-scripts --prefer-dist

COPY site.conf.template /etc/nginx/templates/site.conf.template
COPY security.conf.template /etc/nginx/templates/security.conf.template

RUN chown -R www-data:www-data /var/www/html

ENTRYPOINT ["/docker-entrypoint.sh"]