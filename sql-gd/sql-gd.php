#!/usr/bin/env drush

/**
* Git-aware database dump script
*
* Dumps database with git branch, ISO 8601 date and 7 letter hash in filename
*/

// check if we can bootstrap
$self = drush_sitealias_get_record('@self');
if (empty($self)) {
  drush_die("I can't bootstrap from the current location.", 0);
}

/**
 * @TODO: Get server environment from settings.local.php configured variable
 * @TODO: Infer master branch? or instead use tag for production code in detached HEAD state
 * @TODO: Replace / with - in branch names
 */
$branch = exec('git rev-parse --abbrev-ref HEAD');
$hash = exec('git log -n 1 --pretty=%h');
$web_root = drush_invoke_process('@self', 'dd');

/**
 * @TODO: Get backup directory from settings.local.php configured variable
 */
$path = explode('/', $web_root['output']);
array_pop($path);
$bak_dir = implode('/', $path) . '/backup';

$result_file = $bak_dir . '/' . $branch . '_' . date('Y-m-d') . '_' . $hash;

if(!file_exists("$result_file.sql")) {
  $result_file .= '.sql';
}
else {
  $i = 0;
  while (file_exists("$result_file-$i.sql")) {
    $i++;
  }
  $result_file .= "-$i.sql";
}

$options = array(
  'result-file' => $result_file,
  'gzip',
  'structure-tables-key' => 'common',
);

drush_invoke_process('@self', 'sql-dump', array(), $options);
