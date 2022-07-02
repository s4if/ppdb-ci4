#!/bin/bash
rm writable/database/db.sqlite
touch writable/database/db.sqlite
vendor/bin/doctrine orm:schema-tool:create
vendor/bin/doctrine orm:generate-proxies
php seeder.php