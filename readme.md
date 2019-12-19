# News web-site

An unregistered user can only view the comments, registered - watch and add, registered as admin - watch, add and delete. Register as an admin: name = `admin`, password = `adminadmin` - by default, you can change the values in the user's cabinet.

You can go to the admin panel at `[host]\admin`, but with the condition that you have logged in as an admin. All actions in the admin panel can only be performed by logging in as administrator. In the admin panel on the main page, you can add-edit and view news. In the comments section, you can view and delete comments.

## Installation

Create the `test` database (or change the connection settings in `config\db_params.php`) and execute the contents of `install.sql` in it.
