#!/bin/bash
set -euo pipefail

echo "Adding permissions"
chown -R www-data:www-data /var/www/html/wp-content &
find /var/www/html/wp-content -type d -exec chmod 0755 {} \; &
find /var/www/html/wp-content -type f -exec chmod 644 {} \; &
echo "Permissions added"

exec docker-entrypoint.sh "$@"