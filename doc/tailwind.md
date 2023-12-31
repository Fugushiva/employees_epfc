@Hadevv

# Compilé le CSS

php bin/console tailwind:build --watch

# Déploiement

php bin/console tailwind:build --minify
php bin/console asset-map:compile

# Configuration

php bin/console config:dump symfonycasts_tailwind

# La doc officiel 

https://symfony.com/bundles/TailwindBundle/current/index.html#configuration