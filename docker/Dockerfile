FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    nginx \
    php-fpm \
    php-mysql \
    python3 \
    python3-pip \
    git \
    curl \
    supervisor \
    openssl \
    && apt-get clean

RUN mkdir -p /etc/serverpanel /etc/ssl/certs /etc/ssl/private /etc/nginx/sites-available /etc/nginx/sites-enabled

RUN git clone https://github.com/mLucasMod/serverpanel.git /etc/serverpanel

RUN pip3 install -r /etc/serverpanel/daemon/requirements.txt

RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/ssl/private/serverpanel.key \
    -out /etc/ssl/certs/serverpanel.crt \
    -subj "/C=FR/ST=France/L=Paris/O=ServerPanel/OU=IT/CN=serverpanel.local"

COPY nginx/serverpanel.conf /etc/nginx/sites-available/
COPY /etc/serverpanel/docker/supervisord.conf /etc/supervisor/supervisord.conf
RUN ln -s /etc/nginx/sites-available/serverpanel.conf /etc/nginx/sites-enabled/

EXPOSE 5000 5443

CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]