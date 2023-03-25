# ベースイメージを指定
FROM php:8.1-fpm

# 必要なパッケージをインストール
RUN apt-get update && \
    apt-get install -y git curl zip unzip libpq-dev && \
    apt-get install -y sudo && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Laravelをインストール
RUN composer global require laravel/installer
ENV PATH="~/.composer/vendor/bin:$PATH"
RUN composer create-project --prefer-dist laravel/laravel /var/www/html

# Install required packages
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*


# プロジェクトディレクトリに移動
WORKDIR /var/www/html/Myblog

# ポートを公開
EXPOSE 9000

# アプリケーションを起動 
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=9000"]
#docker run -p 9000:9000 t0307_web php artisan serve --host=0.0.0.0 --port=9000

