<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708170000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create Cliente';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE item_pedido_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE clientes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pedido_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE clientes (id INT NOT NULL, endereco_id INT NOT NULL, pessoa_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_50FE07D71BB76823 ON clientes (endereco_id)');
        $this->addSql('CREATE INDEX IDX_50FE07D7DF6FA0A5 ON clientes (pessoa_id)');
        $this->addSql('CREATE TABLE pedido (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE preco_produtos (id INT NOT NULL, produtos_id INT NOT NULL, preco VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_737BC26A65691519 ON preco_produtos (produtos_id)');
        $this->addSql('ALTER TABLE clientes ADD CONSTRAINT FK_50FE07D71BB76823 FOREIGN KEY (endereco_id) REFERENCES enderecos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE clientes ADD CONSTRAINT FK_50FE07D7DF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES pessoas (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE preco_produtos ADD CONSTRAINT FK_737BC26A65691519 FOREIGN KEY (produtos_id) REFERENCES produtos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('DROP SEQUENCE clientes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pedido_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE item_pedido_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE clientes DROP CONSTRAINT FK_50FE07D71BB76823');
        $this->addSql('ALTER TABLE clientes DROP CONSTRAINT FK_50FE07D7DF6FA0A5');
        $this->addSql('ALTER TABLE preco_produtos DROP CONSTRAINT FK_737BC26A65691519');
        $this->addSql('DROP TABLE clientes');
        $this->addSql('DROP TABLE pedido');
        $this->addSql('DROP TABLE preco_produtos');
    }
}
