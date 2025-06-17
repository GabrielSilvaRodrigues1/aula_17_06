# Dockerfile
FROM php:8.0-apache

# Instalação das extensões necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Copia os arquivos do projeto para o diretório do Apache
COPY . /var/www/html/

# Configura o diretório de trabalho
WORKDIR /var/www/html

# Expondo a porta 80
EXPOSE 80

# Inicia o servidor Apache
CMD ["apache2-foreground"]