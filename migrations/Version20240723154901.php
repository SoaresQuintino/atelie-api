<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240723154901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Relação entre produtos e coleções';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE colecoes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE colecoes (id INT NOT NULL, nome VARCHAR(255) NOT NULL, descricao VARCHAR(255) NOT NULL, imagem VARCHAR(255) DEFAULT NULL, ativo VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE colecao_produto (colecao_id INT NOT NULL, produto_id INT NOT NULL, PRIMARY KEY(colecao_id, produto_id))');
        $this->addSql('CREATE INDEX IDX_436EC9DED43D97B8 ON colecao_produto (colecao_id)');
        $this->addSql('CREATE INDEX IDX_436EC9DE105CFD56 ON colecao_produto (produto_id)');
        $this->addSql('ALTER TABLE colecao_produto ADD CONSTRAINT FK_436EC9DED43D97B8 FOREIGN KEY (colecao_id) REFERENCES colecoes (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE colecao_produto ADD CONSTRAINT FK_436EC9DE105CFD56 FOREIGN KEY (produto_id) REFERENCES produtos (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pessoas ALTER reservista DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    
        $this->addSql('DROP SEQUENCE colecoes_id_seq CASCADE');
        $this->addSql('ALTER TABLE colecao_produto DROP CONSTRAINT FK_436EC9DED43D97B8');
        $this->addSql('ALTER TABLE colecao_produto DROP CONSTRAINT FK_436EC9DE105CFD56');
        $this->addSql('DROP TABLE colecoes');
        $this->addSql('DROP TABLE colecao_produto');
        $this->addSql('ALTER TABLE pessoas ALTER reservista SET NOT NULL');
    }
}
