### Based on kartik-v/yii2-app-practical

Sorry, only in hungarian yet :(

Installation steps
===================

1. Fork it for yourself in a private repository

or clone it from here

1. `git clone git@github.com:albertborsos/yii2-app-template.git yii2-project-name`

2. `cd yii2-project-name`
3. `php init` -> `0` -> `yes`
4. `composer install`
5. Edit `common/config/main.php` and `common/config/main-local.php` for DB settings
6. Update `frontend/config/main.php` and `frontend/config/main-local.php` urlManager baseUrl attribute
7. Migrate database by `php yii migrate` > `yes`

8. Set up smtp settings at `frontend/config/main-local.php` if neccessary
9. In the browser open `http://localhost/dev/yii2-project-name` or where you cloned it
10. Register yourself with the `Regisztráció` button :D
11. Give yourself an `admin` right in `auth_assignment` table. Example: ('admin', 1, NULL)
12. Log in, and fill with content
