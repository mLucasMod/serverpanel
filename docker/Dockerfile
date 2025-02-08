FROM php:8.2-apache

RUN apt-get update && apt-get install -y nginx git openssl && rm -rf /var/lib/apt/lists/*

RUN git clone https://github.com/mLucasMod/serverpanel.git /etc/serverpanel
WORKDIR /etc/serverpanel

COPY apache2.conf /etc/apache2/apache2.conf
COPY nginx.conf /etc/nginx/sites-available/serverpanel
RUN ln -s /etc/nginx/sites-available/serverpanel /etc/nginx/sites-enabled/

RUN mkdir -p /etc/ssl/certs /etc/ssl/private && \
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/ssl/private/serverpanel.key \
    -out /etc/ssl/certs/serverpanel.crt \
    -subj "/C=FR/ST=Paris/L=Paris/O=ServerPanel/OU=IT/CN=serverpanel.local"

EXPOSE 5000 5443

CMD service apache2 start && nginx -g "daemon off;"