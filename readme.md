# Cabinet d'Avocats - Gestion des Réservations de Consultations

## Contexte du projet

Le projet consiste à développer un site web pour un cabinet d'avocats spécialisé, offrant une plateforme intuitive de gestion des réservations de consultations. Les clients peuvent consulter les profils des avocats du cabinet et réserver une consultation en ligne. Les avocats, de leur côté, gèrent leurs réservations, leurs disponibilités et leurs profils professionnels.

## Fonctionnalités principales

### Multi-Rôles

#### 1. **Clients**
- Découvrir les avocats travaillant au sein du cabinet.
- Consulter les profils des avocats (spécialités, années d'expérience, etc.).
- S'inscrire et se connecter.
- Réserver des consultations avec un avocat, en choisissant un créneau horaire disponible.
- Gérer leurs réservations (consultation, modification, ou annulation).

#### 2. **Avocats**
- Se connecter pour gérer leurs réservations (accepter ou refuser les demandes).
- Gérer leur disponibilité pour les consultations.
- Gérer leur profil professionnel (photo, biographie, spécialités, coordonnées).

## Fonctionnalités Détail

### 1. **Inscription et Connexion**
- Les utilisateurs (clients et avocats) s’inscrivent et se connectent.
- Redirection vers une interface dédiée en fonction du rôle (client ou avocat).

### 2. **Page Client**
- Consultation des profils des avocats du cabinet.
- Réservation de consultations avec sélection de la date et heure disponibles.
- Gestion des réservations : consulter l’historique, modifier ou annuler une réservation.
- Modifier des informations personnelles.

### 3. **Page Avocat (Dashboard)**
- Gestion des réservations : Accepter ou refuser les demandes en fonction de sa disponibilité.
- Gestion du profil : Modifier des informations personnelles (photo, biographie, spécialités, coordonnées).
- Gestion des disponibilités : Mettre à jour les créneaux horaires disponibles pour les consultations.
- Affichage des statistiques détaillées pour l’avocat:
  - Nombre de demandes en attente.
  - Nombre de demandes approuvées pour la journée.
  - Nombre de demandes approuvées pour le jour suivant.
  - Détails du prochain client et de sa réservation.

## Installation

### Prérequis

- PHP >= 7.4
- MySQL ou MariaDB
- Composer
- PHPMailer (pour l'envoi des emails)

### Cloner le repository

```bash
git clone https://github.com/ahmedbenkrarayc/lawyerconnect.git
cd lawyerconnect