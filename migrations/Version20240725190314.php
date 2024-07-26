<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240725190314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add preço produto na tabela produto';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE preco_produtos_id_seq CASCADE');
        $this->addSql('ALTER TABLE preco_produtos DROP CONSTRAINT fk_737bc26a65691519');
        $this->addSql('DROP TABLE preco_produtos');
        $this->addSql('ALTER TABLE produtos ADD preco DOUBLE PRECISION NOT NULL DEFAULT 0.00');
        $this->addSql('ALTER TABLE produtos ALTER preco DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
      
        $this->addSql('CREATE SEQUENCE preco_produtos_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE preco_produtos (id INT NOT NULL, produtos_id INT NOT NULL, preco VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_737bc26a65691519 ON preco_produtos (produtos_id)');
        $this->addSql('ALTER TABLE preco_produtos ADD CONSTRAINT fk_737bc26a65691519 FOREIGN KEY (produtos_id) REFERENCES produtos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE produtos DROP preco');
    }
}
