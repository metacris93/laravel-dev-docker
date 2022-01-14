FROM php:7.2-fpm
# Con la version Alpine da problemas con la instalacion del composer
# Arguments defined in docker-compose.yml
ARG user
ARG uid
ARG workdir

RUN apt update \
  && apt install -y \
      git \
      curl \
      libpng-dev \
      libonig-dev \
      libxml2-dev \
      libmcrypt-dev \
      zip \
      unzip \
  && docker-php-ext-install \
      pdo \
      pdo_mysql \
      mbstring \
      exif \
      bcmath

RUN pecl install mcrypt-1.0.1 \
    && docker-php-ext-enable mcrypt;

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

USER www

WORKDIR $workdir

EXPOSE 9000
CMD ["php-fpm"]
