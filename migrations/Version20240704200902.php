<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240704200902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create table enderecos pessoas';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE enderecos_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pessoas_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE enderecos (id INT NOT NULL, rua VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, complemento VARCHAR(255) DEFAULT NULL, bairro VARCHAR(255) NOT NULL, cidade VARCHAR(255) NOT NULL, estado VARCHAR(255) NOT NULL, cep VARCHAR(255) NOT NULL, pais VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE pessoas (id INT NOT NULL, endereco_id INT NOT NULL, nome VARCHAR(255) NOT NULL, rg VARCHAR(255) NOT NULL, cpf VARCHAR(255) NOT NULL, data_nascimento VARCHAR(255) NOT NULL, telefone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, genero VARCHAR(255) NOT NULL, titulo_eleitoral VARCHAR(255) NOT NULL, reservista VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_18A4F2AC1BB76823 ON pessoas (endereco_id)');
        $this->addSql('ALTER TABLE pessoas ADD CONSTRAINT FK_18A4F2AC1BB76823 FOREIGN KEY (endereco_id) REFERENCES enderecos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE enderecos_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pessoas_id_seq CASCADE');
        $this->addSql('ALTER TABLE pessoas DROP CONSTRAINT FK_18A4F2AC1BB76823');
        $this->addSql('DROP TABLE enderecos');
        $this->addSql('DROP TABLE pessoas');
    }
}
