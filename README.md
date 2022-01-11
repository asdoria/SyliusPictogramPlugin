<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://demo.sylius.com/assets/shop/img/logo.png" />
    </a>
</p>

<h1 align="center">Asdoria Pictogram Bundle</h1>

<p align="center">A plugin to create, group and associate pictograms with products</p>

## Features

+ Easily create groups of pictograms
+ Customize which pictograms are to be displayed from the product configuration page
+ 

## Installation

---
1. Add the repository to composer.json

```JSON
"repositories": [
    // ...
    {
    "type": "gitlab",
    "url": "https://gitlab.asdoria.org/asdoria/asdoriabundles/asdoriapictogramplugin.git"
    }
    ]
```
2. run `composer require asdoria/pictogram-bundle`


3. Add the bundle at the top of `app/config/bundles.php`

```PHP
Asdoria\Bundle\PictogramBundle\AsdoriaPictogramPlugin::class => ['all' => true],
```

4. run `php bin/console do:mi:mi` to update the database schema


5. Import routes in `app/config/routes.yaml`

```yaml
asdoria_pictogram:
    resource: "@SyliusPictogramPlugin/Resources/config/routing.yml"
    prefix: /admin
```

6. Import config in `app/config/packages/_sylius.yaml`
```yaml
imports:
    - { resource: "@SyliusPictogramPlugin/Resources/config/config.yml" }
```

7. Override the product ORM in `src/Resources/config/doctrine/Product.orm.xml`
```xml
<many-to-many field="pictograms" target-entity="Asdoria\Bundle\PictogramBundle\Model\PictogramInterface" inversed-by="products">
    <join-table name="asdoria_products_pictograms">
        <join-columns>
            <join-column name="product_id" referenced-column-name="id" />
        </join-columns>
        <inverse-join-columns>
            <join-column name="pictogram_id" referenced-column-name="id" />
        </inverse-join-columns>
    </join-table>
</many-to-many>
```

8. Display the pictograms in your view (here using a `liip_imagine` filter)

```html
{% for picto in product.pictograms %}
    <img src="{{ picto.path|imagine_filter('~') }}"
         data-src="{{ picto.path|imagine_filter('~') }}" 
         alt="{{ picto.name }}">
{% endfor %}
```

## Usage

1. In the back office, under `Catalog`, enter `Pictogram Groups`. Create a group and upload as many files as you need
2. 
