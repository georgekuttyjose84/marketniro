#!/bin/bash

set -e

echo "Stopping nginx container..."
docker stop marketniro-nginx

echo "Renewing certificates..."
certbot renew --quiet

echo "Starting nginx container..."
docker start marketniro-nginx

echo "SSL renewal completed"
