<?php

$settings['hash_salt'] = getenv('HASH_SALT');

$settings['update_free_access'] = FALSE;

$settings['container_yamls'][] = $app_root . '/' . $site_path . '/services.yml';

$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
];

$settings['entity_update_batch_size'] = 50;

$config_directories['sync'] = '../config/sync';

// Read DB settings.
$db_settings = parse_url(getenv('DATABASE_URL'));
$databases['default']['default'] = array (
  'database' => ltrim($db_settings['path'], '/'),
  'username' => $db_settings['user'],
  'password' => $db_settings['pass'],
  'prefix' => '',
  'host' => $db_settings['host'],
  'port' => $db_settings['port'],
  'namespace' => 'Drupal\\Core\\Database\\Driver\\pgsql',
  'driver' => 'pgsql',
);


// CSS and JS aggregation need per dyno cache.
$settings['cache']['bins']['data'] = 'cache.backend.php';

if (file_exists($app_root . '/' . $site_path . '/settings.local.php')) {
  include $app_root . '/' . $site_path . '/settings.local.php';
}
