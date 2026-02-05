#!/bin/bash
set -e

APP_DIR="/app"

cd "$APP_DIR"

if [ ! -f "package.json" ]; then
    echo "Creando un proxecto Next.js completo..."
    npx create-next-app@latest . --use-npm --yes
fi

npm install

echo "Arrancando next..."
npm run dev -- --hostname 0.0.0.0 --port 3000