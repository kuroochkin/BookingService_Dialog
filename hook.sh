mkdir -p .git/hooks

cat <<'EOF' > .git/hooks/pre-push
#!/bin/sh

# Сохраняем информацию о push
REMOTE="$1"
URL="$2"
REFNAME="$3"
NEWREV="$4"
OLDREV="$5"

# Запускаем тесты
echo "Running tests..."
php artisan test

# Проверяем результат тестов
if [ $? -ne 0 ]; then
    echo "Tests failed. Push aborted."
    exit 1
fi

echo "Tests passed. Proceeding with push."
exit 0
EOF

chmod +x .git/hooks/pre-push
