# Dependencies

Scripts - Stylesheets

## How to

Both scripts and styles are registered to the same hooks:

1. `wp_enqueue_scripts`
1. `admin_enqueue_scripts`
1. `login_enqueue_scripts`

Note that there is a "fix" to produce valid HTML for the login / register / lost password screens.