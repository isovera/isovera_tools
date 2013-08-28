drush-scripts
=============

## sql-gd: Git-aware database dump script

SQL-GD Peforms a Drush sql-dump and creates the filename with the following components: current branch, ISO 8601 date (YYYY-MM-DD) and the seven character SHA-1 commit hash.

A dump file created with this script will look something like this:

<pre>backup/develop_2013-08-12_e970d31.sql</pre>

* For brevity, time is not included in the date component. Instead the filename is auto-incremented if it already exists.
* Currently, a backup/ directory at the same level as the web document root is required to exist.
* Underscores are used to separate components

I recommend creating a Drush shell alias pointing to this script. In drushrc.php, add:

<pre>$options['shell-aliases']['sql-gd'] = "!drush scr /path/to/sql-gd.php";</pre>

For information on Drush shell aliases, see http://drush.ws/examples/example.drushrc.php


## isovera_tools: Isovera developer tools

A custom module that wraps the git-aware db dumps script in a module and provides the drush iso-git-commit-dump command (alias: isodump). Two tokens are also provided for use with the Backup and Migrate module.

The following tokens are included:

* git-branch - The current git branch name
* git-hash - The abbreviated git hash of the current commit
