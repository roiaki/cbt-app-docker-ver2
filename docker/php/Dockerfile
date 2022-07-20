FROM php:7.4.1-fpm

# COPY php.ini ローカルで作成するphp.ini（PHPの設定ファイル）をDockerコンテナ内にコピーするコマンド
# docker-compose.ymlで指定した volumes と同じように書いてください。
# COPY [コピーする(ローカル)] [コピー先(コンテナ内)]　（詳しくは参考文献をご覧ください。）
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
COPY ./docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Composer install
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer


# install Node.js
COPY --from=node:14.2 /usr/local/bin /usr/local/bin
COPY --from=node:14.2 /usr/local/lib /usr/local/lib

RUN apt-get update && \
    apt-get -y install \
    git \
    zip \
    unzip \
    vim \
    && docker-php-ext-install pdo_mysql bcmath && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug


WORKDIR /var/www/html