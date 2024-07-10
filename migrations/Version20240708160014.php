<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708160014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create Produto';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE produtos_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE produtos (id INT NOT NULL, categoria_id INT NOT NULL, nome VARCHAR(255) NOT NULL, marca VARCHAR(255) NOT NULL, peso VARCHAR(255) NOT NULL, urlimagem VARCHAR(255) DEFAULT NULL, largura VARCHAR(255) NOT NULL, altura VARCHAR(255) NOT NULL, comprimento VARCHAR(255) NOT NULL, descricao VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3E524353397707A ON produtos (categoria_id)');
        $this->addSql('ALTER TABLE produtos ADD CONSTRAINT FK_3E524353397707A FOREIGN KEY (categoria_id) REFERENCES categorias (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('DROP SEQUENCE produtos_id_seq CASCADE');
        $this->addSql('ALTER TABLE produtos DROP CONSTRAINT FK_3E524353397707A');
        $this->addSql('DROP TABLE produtos');
    }
}
