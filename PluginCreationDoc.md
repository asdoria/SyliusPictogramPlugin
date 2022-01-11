# Création d'un plugin Sylius

Doc tirée des guides Sylius https://docs.sylius.com/en/latest/book/plugins/index.html

La liste complète des obligations et recommandations pour qu'un plugin soit accepté est [fournie par Sylius](https://docs.sylius.com/en/1.11/book/plugins/sylius-store.html)

Sylius propose un squelette de plugin, il suffit de mettre nos classes dans src et modifier les fichiers listés ci-dessous
```
composer create-project sylius/plugin-skeleton AsdoriaSylius{bundleName}Plugin
```

### Architecture des dossiers

**src/** rassemble toutes les classes du plugin

**tests/** contient les fichiers de test

exemple https://github.com/stefandoorn/sitemap-plugin

### Fichier composer.json

Le nom du plugin s'écrit en minuscule, séparé par des "-" et doit avoir le préfixe sylius et le suffixe bundle. 
Il contient l'entreprise/développeur en entête.


ex pour le plugin "Custom Mailer":
```
"name": "asdoria/sylius-custom-mailer-bundle",
"type": "sylius-plugin",
"description": "Customize your mails' templates",
```

Indiquer les chemins (namespace) des dossiers src et tests pour l'autoload
```
    "autoload": {
        "psr-4": {
            "Asdoria\\SyliusCustomMailerPlugin\\": "src/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Tests\\Asdoria\\SyliusCustomMailerPlugin\\": "tests/"
        }
```

### Dependency Injection Configuration

src/DependencyInjection/Configuration.php
```
$treeBuilder = new TreeBuilder('asdoria_sylius_custom_mailer_plugin');
```

### Configuration des tests

tests/Application/config/bundles.php
```
Asdoria\SyliusCustomMailerPlugin\AsdoriaSyliusCustomerMailerPlugin::class => ['all' => true],
```

### Rafraîchir la liste des fichiers pour l'autoload

```
composer dump-autoload
```

### Classes

Les noms de classes s'écrivent en PascalCase, avec le préfixe 'Sylius' et le suffixe 'Plugin'
ex : SyliusCustomMailerPlugin

Le namespace suit la logique décrite dans l'autoload de composer

Namespace d'une classe :
```
namespace Asdoria\SyliusCustomMailerBundlePlugin\---
```
Namespace d'une classe de test PHPUnit:
```
namespace Tests\Asdoria\SyliusCustomMailerPlugin\PHPUnit
```
---

## Git Versioning

Sylius requiert d'avoir au moins un tag (0.1, 1.x..)
