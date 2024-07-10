<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240705212808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create usuarios ';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE empresa_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE funcionario_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE empresas_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE funcionarios_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE usuarios_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE empresas (id INT NOT NULL, endereco_id INT NOT NULL, nome VARCHAR(255) NOT NULL, cnpj VARCHAR(255) NOT NULL, telefone VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, setor VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_70DD49A5C8C6906B ON empresas (cnpj)');
        $this->addSql('CREATE INDEX IDX_70DD49A51BB76823 ON empresas (endereco_id)');
        $this->addSql('CREATE TABLE funcionarios (id INT NOT NULL, pessoa_id INT NOT NULL, empresa_id INT NOT NULL, cargo VARCHAR(255) NOT NULL, salario VARCHAR(255) NOT NULL, hora_entrada TIME(0) WITHOUT TIME ZONE NOT NULL, hora_saida TIME(0) WITHOUT TIME ZONE NOT NULL, data_admissao TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, data_saida TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, regime_de_trabalho VARCHAR(255) NOT NULL, turno VARCHAR(255) NOT NULL, ferias VARCHAR(255) NOT NULL, falta VARCHAR(255) NOT NULL, beneficio VARCHAR(255) DEFAULT NULL, hora_extra VARCHAR(255) DEFAULT NULL, banco_de_horas VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_10A00089DF6FA0A5 ON funcionarios (pessoa_id)');
        $this->addSql('CREATE INDEX IDX_10A00089521E1991 ON funcionarios (empresa_id)');
        $this->addSql('CREATE TABLE usuarios (id INT NOT NULL, pessoa_id INT NOT NULL, login VARCHAR(255) NOT NULL, senha VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EF687F2AA08CB10 ON usuarios (login)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EF687F2DF6FA0A5 ON usuarios (pessoa_id)');
        $this->addSql('ALTER TABLE empresas ADD CONSTRAINT FK_70DD49A51BB76823 FOREIGN KEY (endereco_id) REFERENCES enderecos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE funcionarios ADD CONSTRAINT FK_10A00089DF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES pessoas (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE funcionarios ADD CONSTRAINT FK_10A00089521E1991 FOREIGN KEY (empresa_id) REFERENCES empresas (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE usuarios ADD CONSTRAINT FK_EF687F2DF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES pessoas (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('DROP SEQUENCE empresas_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE funcionarios_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE usuarios_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE empresa_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE funcionario_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE empresas DROP CONSTRAINT FK_70DD49A51BB76823');
        $this->addSql('ALTER TABLE funcionarios DROP CONSTRAINT FK_10A00089DF6FA0A5');
        $this->addSql('ALTER TABLE funcionarios DROP CONSTRAINT FK_10A00089521E1991');
        $this->addSql('ALTER TABLE usuarios DROP CONSTRAINT FK_EF687F2DF6FA0A5');
        $this->addSql('DROP TABLE empresas');
        $this->addSql('DROP TABLE funcionarios');
        $this->addSql('DROP TABLE usuarios');
    }
}
