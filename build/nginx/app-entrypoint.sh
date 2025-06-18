#!/bin/sh
set -e

CERT_PATH="/etc/nginx/ssl/localhost.crt"
KEY_PATH="/etc/nginx/ssl/localhost.key"

CONFIG_FILE=$(mktemp)
cat > "$CONFIG_FILE" <<EOF
[dn]
CN=localhost
[req]
distinguished_name = dn
[EXT]
subjectAltName=DNS:localhost
keyUsage=digitalSignature
extendedKeyUsage=serverAuth
EOF

# Create SSL certs if they don't exist
if [ ! -f "$CERT_PATH" ] || [ ! -f "$KEY_PATH" ]; then
  echo "Generating self-signed certificate for localhost..."
  mkdir -p /etc/nginx/ssl
  openssl req -x509 -days 90 -out "$CERT_PATH" -keyout "$KEY_PATH" \
    -newkey rsa:2048 -nodes -sha256 \
    -subj '/CN=localhost' -extensions EXT -config "$CONFIG_FILE"
  rm "$CONFIG_FILE"
else
  echo "Using existing self-signed certificate."
fi

# Call the original entrypoint (docker-entrypoint.sh from nginx)
exec /docker-entrypoint.sh "$@"
