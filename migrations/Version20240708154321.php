<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708154321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return ' Create Cartao';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE cartoes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE cartoes (id INT NOT NULL, numero VARCHAR(255) NOT NULL, nome_titular VARCHAR(255) NOT NULL, data_validade DATE NOT NULL, codigo_seguranca VARCHAR(255) NOT NULL, bandeira VARCHAR(255) NOT NULL, tipo VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('DROP SEQUENCE cartoes_id_seq CASCADE');
        $this->addSql('DROP TABLE cartoes');
    }
}
