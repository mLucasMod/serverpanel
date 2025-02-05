# Serverpanel

Serverpanel est une interface web moderne permettant de gérer des serveurs de jeux et des bots de manière simplifiée. Inspiré de PufferPanel, ce projet vise à fournir une solution flexible et évolutive.\

📌 Remarque : Ce projet est encore en développement et destiné à un usage personnel/test pour l'instant.

## Fonctionnalités

- Création et gestion de serveurs Minecraft et autre (SteamCMD, discord.py, ...)

- Console en temps réel avec commandes de démarrage/arrêt

- Authentification par email/nom d'utilisateur/mot de passe

- Gestion des utilisateurs avec permissions générales et spécifiques aux serveurs

- Interface basée sur Bootstrap pour un design moderne et efficace

- Backend en PHP avec base de données MariaDB

- Daemon en Python pour la gestion des serveurs

- Déploiement via Docker et Nginx pour un hébergement optimisé&#x20;

### Prérequis

- **Ubuntu** (OS)
- **Docker** et **Docker Compose**
- **PHP**, **Nginx**
- &#x20;**MariaDB, SQLite**
- **Python** (daemon)

### Déploiement

```sh
git clone https://github.com/mLucasMod/serverpanel.git
cd serverpanel
docker-compose up -d
```

## Utilisation

- Accéder à l'interface web via `http://localhost:8080`
- Se connecter avec un compte administrateur
- Ajouter et gérer des serveurs

## Structure du projet

```
serverpanel/
├── backend/
├── frontend/
├── daemon/
├── docker/
└── README.md
```

## Licence

Ce projet est sous licence **Apache 2.0**. Voir le fichier `LICENSE` pour plus de détails.
