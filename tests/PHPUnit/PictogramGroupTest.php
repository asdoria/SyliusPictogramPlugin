<?php
declare(strict_types=1);

namespace Tests\Asdoria\SyliusPictogramPlugin\PHPUnit;

use Asdoria\SyliusPictogramPlugin\Entity\PictogramGroup;
use PHPUnit\Framework\TestCase;

class PictogramGroupTest extends TestCase
{
    /**
     * @return PictogramGroup
     */
    public function testCanBeCreated(): PictogramGroup
    {
        $pictogramGroup = new PictogramGroup();
        $pictogramGroup->setCurrentLocale('fr');

        $this->assertInstanceOf(PictogramGroup::class, $pictogramGroup);

        return $pictogramGroup;
    }

    /**
     * @depends testCanBeCreated
     * @param PictogramGroup $pictogramGroup
     */
    public function testCode(PictogramGroup $pictogramGroup)
    {
        $pictogramGroup->setCode('groupe_1');
        $this->assertSame('grdoupe_1', $pictogramGroup->getCode());
    }

    /**
     * @depends testCanBeCreated
     * @param PictogramGroup $pictogramGroup
     */
    public function testNameTranslation(PictogramGroup $pictogramGroup)
    {
        $pictogramGroup->setName('Groupe 1');
        $this->assertEquals('Groupe 1', $pictogramGroup->getTranslation());
    }
}
