#!/bin/sh
set -e

REPO_URL=${REPO_URL}
TARGET_DIR=/var/www
CUSTOM_SCRIPT_DIR=/docker/entrypoint.d

# 1. Change to project directory
cd "$TARGET_DIR"

# 2. Run composer install
if [ -f composer.json ]; then
  echo "Running composer install..."
  composer install --no-interaction --prefer-dist --optimize-autoloader
else
  echo "composer.json not found, skipping composer install."
fi

# 3. Copy the .env.example to .env
if [ ! -f "$TARGET_DIR/.env" ] && [ -f "$TARGET_DIR/.env.example" ]; then
  echo "Create .env file..."
  cp .env.example .env
  php artisan key:generate
else
  echo ".env file not created"
fi

# 4. Run custom scripts
if [ -d "$CUSTOM_SCRIPT_DIR" ]; then
  echo "Running custom scripts from $CUSTOM_SCRIPT_DIR..."
  for script in "$CUSTOM_SCRIPT_DIR"/*; do
    if [ -x "$script" ]; then
      echo "Executing $script"
      "$script"
    else
      echo "Skipping $script (not executable)"
    fi
  done
else
  echo "No custom script directory found."
fi

# 5. Call the original entrypoint (docker-entrypoint.sh from php-fpm)
exec docker-php-entrypoint "$@"
