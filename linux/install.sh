#!/bin/bash

# 1. Créer le dossier pour le projet
sudo mkdir -p /etc/serverpanel

# 2. Cloner le projet depuis Git
sudo git clone https://github.com/ton-compte/serverpanel.git /etc/serverpanel

# 3. Installer les dépendances nécessaires (Python, PHP, etc.)
sudo apt update
sudo apt install -y python3 python3-pip git nginx php-fpm php-mysql php-cli php-curl php-json php-common ssl-cert

# 4. Installer les dépendances Python
cd /etc/serverpanel
sudo pip3 install -r requirements.txt

# 5. Créer un certificat SSL auto-signé
sudo mkdir -p /etc/ssl/private /etc/ssl/certs
sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/serverpanel.key -out /etc/ssl/certs/serverpanel.crt \
    -subj "/C=FR/ST=France/L=Paris/O=ServerPanel/OU=IT Department/CN=serverpanel.local"

# 6. Copier la configuration Nginx dans /etc/nginx/sites-available/
sudo cp /etc/serverpanel/nginx/serverpanel.conf /etc/nginx/sites-available/

# 7. Activer la configuration Nginx
sudo ln -s /etc/nginx/sites-available/serverpanel.conf /etc/nginx/sites-enabled/

# 8. Redémarrer Nginx
sudo systemctl restart nginx

# 9. Copier le fichier de service systemd pour le daemon
sudo cp /etc/serverpanel/systemd/serverpanel.service /etc/systemd/system/

# 10. Recharger systemd, activer et démarrer le service
sudo systemctl daemon-reload
sudo systemctl enable serverpanel.service
sudo systemctl start serverpanel.service

# 11. Vérification
echo "Le service ServerPanel a été installé, Nginx configuré, et le site est disponible en HTTP (port 5000) et HTTPS (port 5443)."
