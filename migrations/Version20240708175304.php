<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708175304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Alter Table Clientes';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE clientes_id_seq CASCADE');
        $this->addSql('ALTER TABLE clientes DROP CONSTRAINT fk_50fe07d7df6fa0a5');
        $this->addSql('DROP INDEX idx_50fe07d7df6fa0a5');
        $this->addSql('ALTER TABLE clientes DROP pessoa_id');
        $this->addSql('ALTER TABLE clientes ADD CONSTRAINT FK_50FE07D7BF396750 FOREIGN KEY (id) REFERENCES pessoas (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('CREATE SEQUENCE clientes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE clientes DROP CONSTRAINT FK_50FE07D7BF396750');
        $this->addSql('ALTER TABLE clientes ADD pessoa_id INT NOT NULL');
        $this->addSql('ALTER TABLE clientes ADD CONSTRAINT fk_50fe07d7df6fa0a5 FOREIGN KEY (pessoa_id) REFERENCES pessoas (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_50fe07d7df6fa0a5 ON clientes (pessoa_id)');
    }
}
