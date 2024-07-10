<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708170857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create ItemPedido';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE itens_produtos_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE itens_produtos (id INT NOT NULL, pedido_id INT NOT NULL, produto_id INT NOT NULL, preco_unitario VARCHAR(255) NOT NULL, quantidade VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_ED7CF2FA4854653A ON itens_produtos (pedido_id)');
        $this->addSql('CREATE INDEX IDX_ED7CF2FA105CFD56 ON itens_produtos (produto_id)');
        $this->addSql('ALTER TABLE itens_produtos ADD CONSTRAINT FK_ED7CF2FA4854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE itens_produtos ADD CONSTRAINT FK_ED7CF2FA105CFD56 FOREIGN KEY (produto_id) REFERENCES produtos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE itens_produtos_id_seq CASCADE');
        $this->addSql('ALTER TABLE itens_produtos DROP CONSTRAINT FK_ED7CF2FA4854653A');
        $this->addSql('ALTER TABLE itens_produtos DROP CONSTRAINT FK_ED7CF2FA105CFD56');
        $this->addSql('DROP TABLE itens_produtos');
    }
}
