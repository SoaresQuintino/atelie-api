<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240705185546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create table empresa funcionario';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE empresa_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE funcionario_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE empresa (id INT NOT NULL, endereco_id INT NOT NULL, nome VARCHAR(255) NOT NULL, cnpj VARCHAR(255) NOT NULL, telefone VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, setor VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B8D75A50C8C6906B ON empresa (cnpj)');
        $this->addSql('CREATE INDEX IDX_B8D75A501BB76823 ON empresa (endereco_id)');
        $this->addSql('CREATE TABLE funcionario (id INT NOT NULL, pessoa_id INT NOT NULL, empresa_id INT NOT NULL, cargo VARCHAR(255) NOT NULL, salario VARCHAR(255) NOT NULL, hora_entrada TIME(0) WITHOUT TIME ZONE NOT NULL, hora_saida TIME(0) WITHOUT TIME ZONE NOT NULL, data_admissao TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, data_saida TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, regime_de_trabalho VARCHAR(255) NOT NULL, turno VARCHAR(255) NOT NULL, ferias VARCHAR(255) NOT NULL, falta VARCHAR(255) NOT NULL, beneficio VARCHAR(255) DEFAULT NULL, hora_extra VARCHAR(255) DEFAULT NULL, banco_de_horas VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7510A3CFDF6FA0A5 ON funcionario (pessoa_id)');
        $this->addSql('CREATE INDEX IDX_7510A3CF521E1991 ON funcionario (empresa_id)');
        $this->addSql('ALTER TABLE empresa ADD CONSTRAINT FK_B8D75A501BB76823 FOREIGN KEY (endereco_id) REFERENCES enderecos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE funcionario ADD CONSTRAINT FK_7510A3CFDF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES pessoas (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE funcionario ADD CONSTRAINT FK_7510A3CF521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE empresa_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE funcionario_id_seq CASCADE');
        $this->addSql('ALTER TABLE empresa DROP CONSTRAINT FK_B8D75A501BB76823');
        $this->addSql('ALTER TABLE funcionario DROP CONSTRAINT FK_7510A3CFDF6FA0A5');
        $this->addSql('ALTER TABLE funcionario DROP CONSTRAINT FK_7510A3CF521E1991');
        $this->addSql('DROP TABLE empresa');
        $this->addSql('DROP TABLE funcionario');
    }
}
