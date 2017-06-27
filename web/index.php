<?php

/**
 * @var string $base_dir
 * Répertoire actuel.
 */
$base_dir = __DIR__;

/**
 * @var string $doc_root
 * Répertoire global.
 */
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);

/**
 * @var string $base_url
 * Répertoire actuel depuis le répertoie global.
 */
$base_url = preg_replace("!^${doc_root}!", '', $base_dir);

/**
 * @var string $protocol
 * Protocole utilisé (HTTP | HTTPS).
 */
$protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';

/**
 * @var string $port
 * Port utilisé lors de la connexion.
 */
$port = $_SERVER['SERVER_PORT'];

/**
 * @var string $domain
 * Nom de domaine.
 */
$domain = $_SERVER['SERVER_NAME'];

/**
 * @var string $full_url
 * Url complète.
 */
$full_url = "${protocol}://${domain}${base_url}";

/**
 * @var string FOLDER_ROOT
 * @var string WEB_ROOT
 * Définition des chemins propres à toute l'application.
 */
define('FOLDER_ROOT', dirname($base_dir));
define('WEB_DOMAIN', $domain);
define('WEB_ROOT', $full_url);
define('ASSETS', $full_url . '/assets');

/**
 * @var array $autoload_array
 * Tableau contenant mes dossiers chargés dynamiquement.
 */
$autoload_array = [
    'App' => FOLDER_ROOT . '/app/',
    'BuildIt' => FOLDER_ROOT . '/core/'
];

/**
 * Fonction appelée lors de l'autoload d'une classe.
 * @param string $namespace
 */
$autoload = function ($namespace) use ($autoload_array) {
    $namespace_array = explode('\\', $namespace);
    $base_space = $namespace_array[0];
    array_shift($namespace_array);
    $called = implode('/', $namespace_array);
    require($autoload_array[$base_space] . $called . '.php');
};

/**
 * Enregistrment de ma fonction d'autoload par défaut.
 */
spl_autoload_register($autoload);

/**
 * Démarrage du système de sessions PHP.
 */
session_start();

App\App::init();
