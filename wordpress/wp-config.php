<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'nabil' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'Mysqniir50k*' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '>pi6jl|0GrRrBmFV*@e8eDCnL.(dG=gIbI<jTZ;#JJnn)k/s5u0<QrgBOTd1<d_.' );
define( 'SECURE_AUTH_KEY',  'K`t!bYt)Ru_=($fEcnmPPGvi$4{j]0$pk8b;N%=dT])-`NW|Kdk%5`SDhMQpTUVd' );
define( 'LOGGED_IN_KEY',    ' e;uI^^D)._Tx1C{]aiFt8HbBaz<z;fhV1o[6=?Gh0v?n{ x|/AymEJEsNdVuSdq' );
define( 'NONCE_KEY',        '7_5U4UMzi+wRrm1m#C9#%^R{7Kh}Q?i8?2|2$>!;cHHl%/HcM.ltSc-&=:!$bG:O' );
define( 'AUTH_SALT',        'e.[#1[?CZr3X0,?}pv-hEHiwHkV%&eNql6(V]4cWi.Z?U~~xN~cqU%*jsAF)$s;Y' );
define( 'SECURE_AUTH_SALT', 'P_?Qz:*>~0F7yVl.2C3b%r6`3lU*Zp:Ll^k}3y93X)`PsC,SyfY=rWl[T$h$6d4n' );
define( 'LOGGED_IN_SALT',   'E30wmU#lo@<)hHEqQMv/[@i5RmZpCqqhEVBX,wxsGZYwAWteXHfEGmyZUNYfBPb$' );
define( 'NONCE_SALT',       'KJj>#){CDyx>|:0-/3uBG6T-vb4qon*,Z19>y%)GP+uhuW06G}+qwbO%+b2F*3/z' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
