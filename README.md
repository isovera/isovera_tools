drush-scripts
=============

## sql-hd: Git-aware database dump script

SQL-HD Peforms a Drush sql-dump and creates the filename with the current branch, ISO 8601 date (YYYY-MM-DD) and short SHA-1 hash.

* For brevity, it does not included time in the date component, instead it auto-increments if same filename already exists.
* Currently, it assumes the existence of a backup/ directory at the same level as the web document root.

I recommend creating a Drush shell alias pointing to this script. In drushrc.php, add:

<pre>$options['shell-aliases']['sql-hd'] = "!drush scr /path/to/sql-hd.php";</pre>

For information on Drush shell aliases, see http://drush.ws/examples/example.drushrc.php
