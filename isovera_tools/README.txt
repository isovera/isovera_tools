Isovera developer tools

A custom module that wraps the git-aware db dump script in a module and
provides the drush iso-git-commit-dump command (alias: isodump). Two
tokens are also provided for use with the Backup and Migrate module.

To use the command, simply enable the Isovera Tools module and execute
the following drush command:

  $ drush isodump

The backup directory location defaults to `private://backup`. This can
be overridden in a local settings.php file with the following snippet:

  $conf['isovera_tools_backup_dir'] = '/path/to/backup';

The following tokens are included:

* git-branch - The current git branch name
* git-hash - The abbreviated git hash of the current commit
