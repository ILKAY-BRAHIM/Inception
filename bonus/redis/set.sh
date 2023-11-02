#!/bin/sh

redis-server --protected-mode no
echo "finish script";
exec "$@"