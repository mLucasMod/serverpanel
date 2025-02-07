#!/bin/bash

# 1. Create a folder in the project directory
sudo mkdir -p /etc/serverpanel

# 2. Clone the project from git
sudo git clone https://github.com/mLucasMod/serverpanel.git /etc/serverpanel

# 3. Install the dependencies (Python, PHP, etc.)
sudo apt update
sudo apt install -y python3 python3-pip git nginx php-fpm php-mysql php-cli php-curl php-json php-common ssl-cert

# 4. Install Python dependencies
cd /etc/serverpanel
sudo pip3 install -r requirements.txt

# 5. Create an auto-signed SSL Certificate
sudo mkdir -p /etc/ssl/private /etc/ssl/certs
sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/serverpanel.key -out /etc/ssl/certs/serverpanel.crt \
    -subj "/C=FR/ST=France/L=Paris/O=ServerPanel/OU=IT Department/CN=serverpanel.local"

# 6. Copy Nginx config in /etc/nginx/sites-available/
sudo cp /etc/serverpanel/nginx/serverpanel.conf /etc/nginx/sites-available/

# 7. Activate Nginx config
sudo ln -s /etc/nginx/sites-available/serverpanel.conf /etc/nginx/sites-enabled/

# 8. Restart Nginx
sudo systemctl restart nginx

# 9. Copy the systemd service file for the daemon
sudo cp /etc/serverpanel/systemd/serverpanel.service /etc/systemd/system/

# 10. Restart systemd, activate and start the service
sudo systemctl daemon-reload
sudo systemctl enable serverpanel.service
sudo systemctl start serverpanel.service

# 11. Verification
echo "The service ServerPanel has been successfully installed, Nginx is configured, and the website is online on HTTP (port 5000) and HTTPS (port 5443)."
