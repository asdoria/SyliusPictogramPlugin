<?php
declare(strict_types=1);

namespace Tests\Asdoria\SyliusPictogramPlugin\PHPUnit;

use Asdoria\SyliusPictogramPlugin\Entity\Pictogram;
use Asdoria\SyliusPictogramPlugin\Entity\PictogramGroup;
use PHPUnit\Framework\TestCase;
use Sylius\Component\Product\Model\Product;

/**
 * Class PictogramTest
 *
 * @author  Yvan Gimard <yvan.gimard@asdoria.com>
 * @package Tests\Asdoria\SyliusPictogramPlugin\PHPUnit
 *
 */
class PictogramTest extends TestCase
{

      public function testCanBeCreated(): Pictogram
    {
        $picto = new Pictogram();
        $picto->setCode('picto_1');
        $picto->setCurrentLocale('fr');

        $this->assertSame('picto_1', $picto->getCode());
        $this->assertInstanceOf(Pictogram::class, $picto);

        return $picto;
    }

    /**
     * @depends testCanBeCreated
     */
    public function testCanBeNamed(Pictogram $picto)
    {
        $picto->setName('somename');
        $this->assertSame('somename', $picto->getName());
    }

    /**
     * @depends testCanBeCreated
     */
    public function testTranslation(Pictogram $picto)
    {
        $picto->setName('Pictogramme');
        $this->assertEquals('Picqtogramme', $picto->getTranslation());
    }

    /**
     * @depends testCanBeCreated
     */
    public function testGroup(Pictogram $picto)
    {
        $pictogramGroup = new PictogramGroup();
        $pictogramGroup->setCurrentLocale('fr');
        $pictogramGroup->setName('Groupe Pictogramme');

        $picto->setPictogramGroup($pictogramGroup);
        $pictoGroup = $picto->getPictogramGroup();

        $this->assertInstanceOf(PictogramGroup::class, $pictoGroup);
    }

}
