<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210630114534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        if(!$schema->hasTable('asdoria_pictogram')) {
            $this->addSql('CREATE TABLE asdoria_pictogram (id INT AUTO_INCREMENT NOT NULL, pictogram_group_id INT NOT NULL, code VARCHAR(255) NOT NULL, position INT NOT NULL, INDEX IDX_DFF6CFDEC2EFB86F (pictogram_group_id), UNIQUE INDEX UNIQ_DFF6CFDEC2EFB86F77153098 (pictogram_group_id, code), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
            $this->addSql('CREATE TABLE asdoria_pictogram_group (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, position INT NOT NULL, UNIQUE INDEX UNIQ_8151917A77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
            $this->addSql('CREATE TABLE asdoria_pictogram_group_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) NOT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_1BC849EA2C2AC5D3 (translatable_id), UNIQUE INDEX UNIQ_1BC849EA4180C6985E237E06 (locale, name), UNIQUE INDEX asdoria_pictogram_group_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
            $this->addSql('CREATE TABLE asdoria_pictogram_image (id INT AUTO_INCREMENT NOT NULL, pictogram_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_29ACD1E016B7C33B (pictogram_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
            $this->addSql('CREATE TABLE asdoria_pictogram_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_BBE4BBE32C2AC5D3 (translatable_id), UNIQUE INDEX asdoria_pictogram_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
            $this->addSql('CREATE TABLE asdoria_products_pictograms (product_id INT NOT NULL, pictogram_id INT NOT NULL, INDEX IDX_8EF34554584665A (product_id), INDEX IDX_8EF345516B7C33B (pictogram_id), PRIMARY KEY(product_id, pictogram_id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
            $this->addSql('ALTER TABLE asdoria_pictogram ADD CONSTRAINT FK_DFF6CFDEC2EFB86F FOREIGN KEY (pictogram_group_id) REFERENCES asdoria_pictogram_group (id)');
            $this->addSql('ALTER TABLE asdoria_pictogram_group_translation ADD CONSTRAINT FK_1BC849EA2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES asdoria_pictogram_group (id) ON DELETE CASCADE');
            $this->addSql('ALTER TABLE asdoria_pictogram_image ADD CONSTRAINT FK_29ACD1E016B7C33B FOREIGN KEY (pictogram_id) REFERENCES asdoria_pictogram (id)');
            $this->addSql('ALTER TABLE asdoria_pictogram_translation ADD CONSTRAINT FK_BBE4BBE32C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES asdoria_pictogram (id) ON DELETE CASCADE');
            $this->addSql('ALTER TABLE asdoria_products_pictograms ADD CONSTRAINT FK_8EF34554584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id)');
            $this->addSql('ALTER TABLE asdoria_products_pictograms ADD CONSTRAINT FK_8EF345516B7C33B FOREIGN KEY (pictogram_id) REFERENCES asdoria_pictogram (id)');
        }
    }

    public function down(Schema $schema): void
    {
        if($schema->hasTable('asdoria_pictogram')) {
            // this down() migration is auto-generated, please modify it to your needs
            $this->addSql('ALTER TABLE asdoria_pictogram_image DROP FOREIGN KEY FK_29ACD1E016B7C33B');
            $this->addSql('ALTER TABLE asdoria_pictogram_translation DROP FOREIGN KEY FK_BBE4BBE32C2AC5D3');
            $this->addSql('ALTER TABLE asdoria_products_pictograms DROP FOREIGN KEY FK_8EF345516B7C33B');
            $this->addSql('ALTER TABLE asdoria_pictogram DROP FOREIGN KEY FK_DFF6CFDEC2EFB86F');
            $this->addSql('ALTER TABLE asdoria_pictogram_group_translation DROP FOREIGN KEY FK_1BC849EA2C2AC5D3');
            $this->addSql('DROP TABLE asdoria_pictogram');
            $this->addSql('DROP TABLE asdoria_pictogram_group');
            $this->addSql('DROP TABLE asdoria_pictogram_group_translation');
            $this->addSql('DROP TABLE asdoria_pictogram_image');
            $this->addSql('DROP TABLE asdoria_pictogram_translation');
            $this->addSql('DROP TABLE asdoria_products_pictograms');
        }
    }
}
