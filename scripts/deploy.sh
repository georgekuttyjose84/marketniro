#!/bin/bash

set -e

echo "Pulling latest code..."
git pull origin main

echo "Building containers..."
docker compose build

echo "Starting containers..."
docker compose up -d

echo "Installing dependencies..."
docker compose exec -T marketniro-php composer install --no-interaction --prefer-dist --no-dev

echo "Running migrations..."
docker compose exec -T marketniro-php bin/phinx migrate

echo "Deployment finished"
