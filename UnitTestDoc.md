# Tests unitaires PHPUnit

Les test unitaires permettent de confronter nos classes et leurs méthodes, séparées en unités, à des épreuves qui vérifient leur bon fonctionnement.


Le principe est que chaque fonction est développée avec un comportement prédéterminé (valeurs d'entrées et de sortie, leur type..), et qu'il faut lui associer un test permettant de la valider de manière automatisée.
Un test est là pour vérifier que la valeur renvoyée par une méthode est celle attendue, ou qu'un objet a bien subi les transformations prévues.

Les tests sont l'un des prérequis obligatoires pour obtenir le badge "Approved by Sylius"

---
### Installation dans le projet

```Shell
composer require phpunit/phpunit
composer install
```
Depuis la racine du projet, vérifier la bonne installation
```Shell
vendor/bin/phpunit --help
```

Créer l'arborescence 'tests/PHPUnit' à la racine.
Les tests pour une classe MyClass vont dans un fichier MyClassTest en suivant la même arborescence (src/Controller/ProductController devient tests/Controller/ProductControllerTest)

Une classe de test hérite généralement de `PHPUnit\Framework\TestCase`


Une méthode test est forcément publique, avec le préfixe 'test'

```PHP
public function testEmpty(){}
```
---

### Configuration phpunit.xml

À la racine, dans phpunit.xml :
```XML
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="https://schema.phpunit.de/9.5/phpunit.xsd"
         bootstrap="vendor/autoload.php"
         cacheResultFile=".phpunit.cache/test-results"
         executionOrder="depends,defects"
         forceCoversAnnotation="false"
         beStrictAboutCoversAnnotation="true"
         beStrictAboutOutputDuringTests="false"
         beStrictAboutTodoAnnotatedTests="true"
         convertDeprecationsToExceptions="true"
         failOnRisky="true"
         failOnWarning="true"
         verbose="true">
    <testsuites>
        <testsuite name="default">
            <directory>tests</directory>
        </testsuite>
    </testsuites>

    <coverage cacheDirectory=".phpunit.cache/code-coverage"
              processUncoveredFiles="true">
        <include>
            <directory suffix=".php">src</directory>
        </include>
    </coverage>
</phpunit>

```

---

## Assertion

Le point central des tests.
L'assertion est la vérification d'une condition. 
Elle s'effectue avec les fonctions de [la famille des _assert_](https://phpunit.readthedocs.io/fr/latest/assertions.html), qui ont chacune un rôle bien précis. 

Si une assertion n'est pas validée, un message d'erreur diagnostiquant le problème est renvoyé et le test est considéré comme échoué.

```PHP
public function testAlwaysTrue() {
    $this->assertEquals(1, 1);
}
```

Exemple de trois assertions différentes prévues pour échouer
```PHP
public function testEquals()
{
    $this->assertEquals(1, 2);
}

public function testInstance()
{
    $pictogram = new Pictogram();
    $this->assertInstanceOf(Product::class, $pictogram);
}

public function testSameObject()
{
    $pictogram = new Pictogram();
    $product = new Product();
    $this->assertSame($product, $pictogram);
}
```
Résultat :

```cassandraql
//Résultat de testEquals
Failed asserting that 2 matches expected 1.
Expected :1
Actual   :2

//Résultat de testInstance
Failed asserting that Asdoria\SyliusCustomMailerPlugin\Entity\Pictogram Object (...) is an instance of class "Sylius\Component\Product\Model\Product".

//Résultat de testSameObject
Failed asserting that two variables reference the same object.
 
Time: 00:00.014, Memory: 8.00 MB

FAILURES!
Tests: 3, Assertions: 3, Failures: 3.
```
---

### Dépendances entre tests

Il est possible de déclarer les dépendances entre les tests avec `@depends`. En principe, les tests unitaires doivent isoler le code en des unités de taille minimale et indépendantes.

Il arrive cependant que certains tests soient liées, avec un `producteur` qui renvoie des valeurs, et un `consommateur` qui vient les récuperer  

Supposons que l'on souhaite récupérer le tableau de la fonction testEmpty une fois qu'il est validé, et le récupérer ailleurs :


```PHP
public function testEmpty()
{
    $stack = [];
    $this->assertEmpty($stack);
    
    return $stack;
}

/**
 * @depends testEmpty
 */
public function testPush(array $stack)
{
    $stack[0] = 5;
    $this->assertSame(5, $stack[0]);
}
```

Ici on attend que testEmpty nous envoie un tableau, que l'on va confronter à de nouveaux tests.

À savoir qu'un test n'est pas exécuté si l'un des tests dont il dépend échoue.

---

### Lancer les tests en ligne de commande

À la racine du projet
```Shell
vendor/bin/phpunit
```
Le phpunit contenu dans le projet va aller parcourir le dossier `tests` et lancer tous les tests qu'il rencontre 

Chaque test effectué sera représenté par un point ou une lettre
+ `.`        Affiché quand le test a réussi.
+ `F`        Affiché quand une assertion échoue lors de l’exécution d’une méthode de test.
+ `E`        Affiché quand une erreur survient pendant l’exécution d’une méthode de test.
+ `R`        Affiché quand le test a été marqué comme risqué (voir Tests risqués).
+ `S`        Affiché quand le test a été sauté (voir Tests incomplets et sautés).
+ `I`        Affiché quand le test est marqué comme incomplet ou pas encore implémenté (voir Tests incomplets et sautés).

Exemple de résultat avec 7 assertions, dont deux échouées :

```PHP
.F..F..   7 / 7 (100%)

Time: 00:00.007, Memory: 6.00 MB

There were 2 failures
```

