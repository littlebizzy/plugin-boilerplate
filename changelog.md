## Changelog

### 1.2.0
* repo constant introduced to support future Git management e.g. `littlebizzy/dashboard-cleanup`
- It also avoids PBP plugin update checks from the wp.org repo API checker, but for this functionality the plugin needs to be active; inactive plugins cannot avoid this issue.
- For automatic updates, it checks the constant AUTOMATIC_UPDATE_PLUGINS both for plugins and mu-plugins, not sure if different constants needed for each type of plugins, or directly mu-plugins should be updated automatically, I leave it up to you this behavior.
- The interval update check is 6 hours (let me know if you want to change it), just after activation the check hook works in 15 seconds for the first time it is activated.
- And autoloaded option is shared across plugins of the same primary namespace directory (in this case Littlebizzy), saving the last timestamp checks.
- Each plugin saves its update info in its own non-autoloaded option, checked/update only in update checks.

### 1.1.1
* Moved context method to Plugin class and removed from Factory class
* New enabled method in Plugin class for quick plugin constant checks
* Minor structure changes in Context class

### 1.1.0
* major changes/new features
* tested with PHP 7.1, 7.2

### 1.0.1
* minor tweaks/patches

### 1.0.0
* initial release
* tested with PHP 7.0
* uses PHP namespaces
* object-oriented codebase
