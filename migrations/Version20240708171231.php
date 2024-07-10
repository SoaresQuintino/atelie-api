<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240708171231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create Pagamento';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE pagamentos_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE pagamentos (id INT NOT NULL, metodo_pagamento_id INT NOT NULL, pedido_id INT NOT NULL, data DATE NOT NULL, parcelamento VARCHAR(255) NOT NULL, valor VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EFE4651182C2D759 ON pagamentos (metodo_pagamento_id)');
        $this->addSql('CREATE INDEX IDX_EFE465114854653A ON pagamentos (pedido_id)');
        $this->addSql('ALTER TABLE pagamentos ADD CONSTRAINT FK_EFE4651182C2D759 FOREIGN KEY (metodo_pagamento_id) REFERENCES metodos_de_pagamento (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pagamentos ADD CONSTRAINT FK_EFE465114854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('DROP SEQUENCE pagamentos_id_seq CASCADE');
        $this->addSql('ALTER TABLE pagamentos DROP CONSTRAINT FK_EFE4651182C2D759');
        $this->addSql('ALTER TABLE pagamentos DROP CONSTRAINT FK_EFE465114854653A');
        $this->addSql('DROP TABLE pagamentos');
    }
}
