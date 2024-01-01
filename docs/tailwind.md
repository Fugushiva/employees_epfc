@Hadevv

# Compilé le CSS

### Symfony CLI

Si tu utilises ***symfony server:start*** un worker dans ***.symfony.local.yaml*** compile de tailwind automatiquement

### php composer

Si tu utilises composer, tu devras utiliser la commande pour compiler manuelement le tailwind 

```php bin/console tailwind:build --watch```

# Déploiement

```php bin/console tailwind:build --minify```
```php bin/console asset-map:compile```

# Configuration

```php bin/console config:dump symfonycasts_tailwind```

# La doc officiel 

- https://symfony.com/bundles/TailwindBundle/current/index.html#configuration