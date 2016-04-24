<?php
// @todo: créer le vendor Console Aonyx
// TERMINE @todo: créer un config pour la connexion à la database
// TERMINE @todo: créer classe d'erreur Aonyx
// @todo: peut se connecter avec le pseudo ou le mail
// @todo: quand connecté mettre une verif en base pour s'assurer que le user existe tjrs
// TERMINE @todo: set plusieurs services dans l'abstract
// TERMINE @todo: faire systeme de cookie pour se souvenir de moi
// @todo: finir la validation de register
// @todo: prendre en compte : activation du compte par rapport au token (par mail) et le champ enabled en base
// @todo: finir le module News
// @todo: créer le script d'installation de aonyx
// -- A VENIR !! --
// @todo: possibilités d'interaction des membres sur les News poster des commentaires etc...
// @todo: installer grunt pour le front
//....


/**
 * ARCHITECTURE
 *
 * @todo : Members
 * - Gérer le profil utilisateur
 * - Gérer une liste d'ami
 * - Gérer la liste des membres
 * - Gérer une messagerie interne
 * - Gérer un tchat interne (socketio)
 *
 * Members -> Controllers   -> MemberlistController
 *                          -> ProfileController
 *                          -> FriendsController
 *                          -> MessagingController
 *
 * @todo : Zone admin
 * - Gérer le module de news
 * - Gérer les membres
 * - Gérer les stats
 * - Gérer les niveaux et grades des utilisateurs (qui peut administrer quoi, groupe d'admin)
 * - Gérer le template du site
 * - Gérer les infos générales du site (titre, footer & +)
 *
 * Dashboard -> Controllers -> NewsAdminController
 *                          -> MembersAdminController
 *                          -> StatsAdminController
 *                          -> LevelaccessAdminController
 *                          -> TemplateAdminController
 *                          -> ConfigAdminController
 *
 * @todo : News
 * - Gérer des catégories
 *
 * News -> Controllers  -> CategoriesController
 *
 */