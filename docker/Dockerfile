# Étape 1 : Utiliser une image de base
FROM ubuntu:20.04

# Étape 2 : Définir les variables d'environnement
ENV DEBIAN_FRONTEND=noninteractive

# Étape 3 : Mettre à jour les paquets et installer les dépendances nécessaires
RUN apt update && \
    apt install -y \
    python3 \
    python3-pip \
    git \
    nginx \
    php-fpm \
    php-mysql \
    php-cli \
    php-curl \
    php-json \
    php-common \
    ssl-cert \
    curl \
    && apt clean

# Étape 4 : Créer les dossiers nécessaires
RUN mkdir -p /etc/serverpanel /etc/ssl/certs /etc/ssl/private /etc/nginx/sites-available /etc/nginx/sites-enabled

# Étape 5 : Cloner le dépôt contenant ton projet
RUN git clone https://github.com/mLucasMod/serverpanel.git /etc/serverpanel

# Étape 6 : Installer les dépendances Python du projet
WORKDIR /etc/serverpanel
RUN pip3 install -r /etc/serverpanel/daemon/requirements.txt

# Étape 7 : Créer un certificat SSL auto-signé
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/serverpanel.key -out /etc/ssl/certs/serverpanel.crt \
    -subj "/C=FR/ST=France/L=Paris/O=ServerPanel/OU=IT Department/CN=serverpanel.local"

# Étape 8 : Copier la configuration Nginx et le service systemd
COPY nginx/serverpanel.conf /etc/nginx/sites-available/
COPY systemd/serverpanel.service /etc/systemd/system/

# Étape 9 : Activer la configuration Nginx
RUN ln -s /etc/nginx/sites-available/serverpanel.conf /etc/nginx/sites-enabled/

# Étape 10 : Exposer les ports nécessaires
EXPOSE 5000 5443

# Étape 11 : Démarrer Nginx et ton daemon Python dans un script d'entrée
CMD service nginx start && python3 /etc/serverpanel/daemon/bin/start_daemon.py
