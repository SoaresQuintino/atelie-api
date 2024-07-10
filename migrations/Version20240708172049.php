<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708172049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create Ralacao';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produto_material (produto_id INT NOT NULL, material_id INT NOT NULL, PRIMARY KEY(produto_id, material_id))');
        $this->addSql('CREATE INDEX IDX_EF8DB455105CFD56 ON produto_material (produto_id)');
        $this->addSql('CREATE INDEX IDX_EF8DB455E308AC6F ON produto_material (material_id)');
        $this->addSql('ALTER TABLE produto_material ADD CONSTRAINT FK_EF8DB455105CFD56 FOREIGN KEY (produto_id) REFERENCES produtos (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE produto_material ADD CONSTRAINT FK_EF8DB455E308AC6F FOREIGN KEY (material_id) REFERENCES materiais (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE produto_material DROP CONSTRAINT FK_EF8DB455105CFD56');
        $this->addSql('ALTER TABLE produto_material DROP CONSTRAINT FK_EF8DB455E308AC6F');
        $this->addSql('DROP TABLE produto_material');
    }
}
