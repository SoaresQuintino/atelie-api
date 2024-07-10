<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708184235 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Arrumando ';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE pedido_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE itens_produtos_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE itens_pedidos_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pedidos_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE itens_pedidos (id INT NOT NULL, produto_id INT NOT NULL, pedido_id INT NOT NULL, preco_unitario VARCHAR(255) NOT NULL, quantidade VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F0A12FA8105CFD56 ON itens_pedidos (produto_id)');
        $this->addSql('CREATE INDEX IDX_F0A12FA84854653A ON itens_pedidos (pedido_id)');
        $this->addSql('CREATE TABLE pagamentos (id INT NOT NULL, metodo_pagamento_id INT NOT NULL, pedido_id INT NOT NULL, data DATE NOT NULL, parcelamento VARCHAR(255) NOT NULL, valor VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EFE4651182C2D759 ON pagamentos (metodo_pagamento_id)');
        $this->addSql('CREATE INDEX IDX_EFE465114854653A ON pagamentos (pedido_id)');
        $this->addSql('CREATE TABLE pedidos (id INT NOT NULL, cliente_id INT NOT NULL, metodo_pagamento_id INT NOT NULL, status_pedido_id INT NOT NULL, data VARCHAR(255) NOT NULL, entrega VARCHAR(255) NOT NULL, total VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6716CCAADE734E51 ON pedidos (cliente_id)');
        $this->addSql('CREATE INDEX IDX_6716CCAA82C2D759 ON pedidos (metodo_pagamento_id)');
        $this->addSql('CREATE INDEX IDX_6716CCAAC0C1E57B ON pedidos (status_pedido_id)');
        $this->addSql('ALTER TABLE itens_pedidos ADD CONSTRAINT FK_F0A12FA8105CFD56 FOREIGN KEY (produto_id) REFERENCES produtos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE itens_pedidos ADD CONSTRAINT FK_F0A12FA84854653A FOREIGN KEY (pedido_id) REFERENCES pedidos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pagamentos ADD CONSTRAINT FK_EFE4651182C2D759 FOREIGN KEY (metodo_pagamento_id) REFERENCES metodos_de_pagamento (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pagamentos ADD CONSTRAINT FK_EFE465114854653A FOREIGN KEY (pedido_id) REFERENCES pedidos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT FK_6716CCAADE734E51 FOREIGN KEY (cliente_id) REFERENCES clientes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT FK_6716CCAA82C2D759 FOREIGN KEY (metodo_pagamento_id) REFERENCES metodos_de_pagamento (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT FK_6716CCAAC0C1E57B FOREIGN KEY (status_pedido_id) REFERENCES status_pedidos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('DROP SEQUENCE itens_pedidos_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pedidos_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE pedido_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE itens_produtos_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE itens_pedidos DROP CONSTRAINT FK_F0A12FA8105CFD56');
        $this->addSql('ALTER TABLE itens_pedidos DROP CONSTRAINT FK_F0A12FA84854653A');
        $this->addSql('ALTER TABLE pagamentos DROP CONSTRAINT FK_EFE4651182C2D759');
        $this->addSql('ALTER TABLE pagamentos DROP CONSTRAINT FK_EFE465114854653A');
        $this->addSql('ALTER TABLE pedidos DROP CONSTRAINT FK_6716CCAADE734E51');
        $this->addSql('ALTER TABLE pedidos DROP CONSTRAINT FK_6716CCAA82C2D759');
        $this->addSql('ALTER TABLE pedidos DROP CONSTRAINT FK_6716CCAAC0C1E57B');
        $this->addSql('DROP TABLE itens_pedidos');
        $this->addSql('DROP TABLE pagamentos');
        $this->addSql('DROP TABLE pedidos');
    }
}
