<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708180351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Atuliazacao';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pedido ADD cliente_id INT NOT NULL');
        $this->addSql('ALTER TABLE pedido ADD metodo_pagamento_id INT NOT NULL');
        $this->addSql('ALTER TABLE pedido ADD status_pedido_id INT NOT NULL');
        $this->addSql('ALTER TABLE pedido ADD data VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pedido ADD entrega VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pedido ADD total VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CEDE734E51 FOREIGN KEY (cliente_id) REFERENCES clientes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CE82C2D759 FOREIGN KEY (metodo_pagamento_id) REFERENCES metodos_de_pagamento (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CEC0C1E57B FOREIGN KEY (status_pedido_id) REFERENCES status_pedidos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C4EC16CEDE734E51 ON pedido (cliente_id)');
        $this->addSql('CREATE INDEX IDX_C4EC16CE82C2D759 ON pedido (metodo_pagamento_id)');
        $this->addSql('CREATE INDEX IDX_C4EC16CEC0C1E57B ON pedido (status_pedido_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE pedido DROP CONSTRAINT FK_C4EC16CEDE734E51');
        $this->addSql('ALTER TABLE pedido DROP CONSTRAINT FK_C4EC16CE82C2D759');
        $this->addSql('ALTER TABLE pedido DROP CONSTRAINT FK_C4EC16CEC0C1E57B');
        $this->addSql('DROP INDEX IDX_C4EC16CEDE734E51');
        $this->addSql('DROP INDEX IDX_C4EC16CE82C2D759');
        $this->addSql('DROP INDEX IDX_C4EC16CEC0C1E57B');
        $this->addSql('ALTER TABLE pedido DROP cliente_id');
        $this->addSql('ALTER TABLE pedido DROP metodo_pagamento_id');
        $this->addSql('ALTER TABLE pedido DROP status_pedido_id');
        $this->addSql('ALTER TABLE pedido DROP data');
        $this->addSql('ALTER TABLE pedido DROP entrega');
        $this->addSql('ALTER TABLE pedido DROP total');
    }
}
