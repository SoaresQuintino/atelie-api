<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708174755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create nova_classe';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('delete from pessoas');
        $this->addSql('ALTER TABLE clientes DROP CONSTRAINT fk_50fe07d71bb76823');
        $this->addSql('DROP INDEX idx_50fe07d71bb76823');
        $this->addSql('ALTER TABLE clientes DROP endereco_id');
        $this->addSql('ALTER TABLE pessoas ADD classe VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE clientes ADD endereco_id INT NOT NULL');
        $this->addSql('ALTER TABLE clientes ADD CONSTRAINT fk_50fe07d71bb76823 FOREIGN KEY (endereco_id) REFERENCES enderecos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_50fe07d71bb76823 ON clientes (endereco_id)');
        $this->addSql('ALTER TABLE pessoas DROP classe');
    }
}
