<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230215113110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE store_product_stock_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE store_product_stock (id INT NOT NULL, store_id INT NOT NULL, product_id INT NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_CBC9B0A2B092A811 ON store_product_stock (store_id)');
        $this->addSql('CREATE INDEX IDX_CBC9B0A24584665A ON store_product_stock (product_id)');
        $this->addSql('ALTER TABLE store_product_stock ADD CONSTRAINT FK_CBC9B0A2B092A811 FOREIGN KEY (store_id) REFERENCES store (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE store_product_stock ADD CONSTRAINT FK_CBC9B0A24584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE store_product_stock_id_seq CASCADE');
        $this->addSql('ALTER TABLE store_product_stock DROP CONSTRAINT FK_CBC9B0A2B092A811');
        $this->addSql('ALTER TABLE store_product_stock DROP CONSTRAINT FK_CBC9B0A24584665A');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE store_product_stock');
    }
}
