Isovera developer tools
=============

A collection of commonly reused scripts and stuff.

# iso-git-commit-dump

 that wraps the git-aware db dump script in a module and provides the drush iso-git-commit-dump command (alias: isodump). Two tokens are also provided for use with the Backup and Migrate module.

## Usage

To use, simply enable the Isovera Tools module and perform the following drush command:

```
$ drush isodump
```

The backup directory location defaults to `private://backup`. This can be overridden in a local settings.php file with the following snippet:

```
$conf['isovera_tools_backup_dir'] = '/path/to/backup';
```

## Backup and Migrate support

### Profile

This module installs a backup and migrate profile named isovera_tools, which
provides a file name with the git tokens. You will probably want to update the
excluded tables and other settings for this profile at

```
/admin/config/system/backup_migrate/profile/list/edit/isovera_tools
```

### Git Tokens

The following tokens are included:

* `git-branch` The current git branch name
* `git-hash` The abbreviated git hash of the current commit

### Destination

To set a backup destination using Backup and Migrate, add the following snippet
to your local settings.php file:

```
$conf['backup_migrate_destinations_defaults'][] = array(
  'type' => 'file',
  'destination_id' => 'mydestination',
  'name' => 'Configured Destination',
  'location' => 'sites/default/files/backup_migrate/manual',
  'settings' => array(
  ),
);
```

then in the command line, to use the backup and migrate command, invoke:

```
$ drush bb db mydestination isovera_tools
```

For more information on the drush backup and migrate command, enter:

```
$ drush help bam-backup
```
