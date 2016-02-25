# ACF theme config
Configure ACF for a theme. Made for WordPress.

## Installation
This plugin needs Composer to manage WordPress. To add this plugin to your project's development dependencies, run:
```sh
composer require trendwerk/debug 1.0.0 --dev
```

Or manually add it to your `composer.json`:
```json
"require-dev": {
	"trendwerk/debug": "1.0.0"
},
```

### ACF Pro
This plugin requires ACF Pro. It is not included with this installation. You need to configure the Advanced Custom Fields repository in your project:

```json
"repositories": [
	{
	  "type": "package",
	  "package": {
	    "name": "advanced-custom-fields/advanced-custom-fields-pro",
	    "version": "<version>",
	    "type": "wordpress-plugin",
	    "dist": {
	      "type": "zip",
	      "url": "http://connect.advancedcustomfields.com/index.php?p=pro&a=download&k=<license-key>"
	    }
	  }
	}
]
```

You will need to specify the version and license key.
