<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240718150857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Atualização, diferencia do banco ';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE preco_produtos_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE pagamentos DROP CONSTRAINT fk_efe465114854653a');
        $this->addSql('ALTER TABLE empresa DROP CONSTRAINT fk_b8d75a501bb76823');
        $this->addSql('ALTER TABLE pedido DROP CONSTRAINT fk_c4ec16cede734e51');
        $this->addSql('ALTER TABLE pedido DROP CONSTRAINT fk_c4ec16ce82c2d759');
        $this->addSql('ALTER TABLE pedido DROP CONSTRAINT fk_c4ec16cec0c1e57b');
        $this->addSql('ALTER TABLE funcionario DROP CONSTRAINT fk_7510a3cfdf6fa0a5');
        $this->addSql('ALTER TABLE funcionario DROP CONSTRAINT fk_7510a3cf521e1991');
        $this->addSql('ALTER TABLE itens_produtos DROP CONSTRAINT fk_ed7cf2fa4854653a');
        $this->addSql('ALTER TABLE itens_produtos DROP CONSTRAINT fk_ed7cf2fa105cfd56');
        $this->addSql('DROP TABLE empresa');
        $this->addSql('DROP TABLE pedido');
        $this->addSql('DROP TABLE funcionario');
        $this->addSql('DROP TABLE itens_produtos');
        $this->addSql('ALTER TABLE pagamentos ADD CONSTRAINT FK_EFE465114854653A FOREIGN KEY (pedido_id) REFERENCES pedidos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_18A4F2AC3E3E11F0 ON pessoas (cpf)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE preco_produtos_id_seq CASCADE');
        $this->addSql('CREATE TABLE empresa (id INT NOT NULL, endereco_id INT NOT NULL, nome VARCHAR(255) NOT NULL, cnpj VARCHAR(255) NOT NULL, telefone VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, setor VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_b8d75a501bb76823 ON empresa (endereco_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_b8d75a50c8c6906b ON empresa (cnpj)');
        $this->addSql('CREATE TABLE pedido (id INT NOT NULL, cliente_id INT NOT NULL, metodo_pagamento_id INT NOT NULL, status_pedido_id INT NOT NULL, data VARCHAR(255) NOT NULL, entrega VARCHAR(255) NOT NULL, total VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_c4ec16cec0c1e57b ON pedido (status_pedido_id)');
        $this->addSql('CREATE INDEX idx_c4ec16ce82c2d759 ON pedido (metodo_pagamento_id)');
        $this->addSql('CREATE INDEX idx_c4ec16cede734e51 ON pedido (cliente_id)');
        $this->addSql('CREATE TABLE funcionario (id INT NOT NULL, pessoa_id INT NOT NULL, empresa_id INT NOT NULL, cargo VARCHAR(255) NOT NULL, salario VARCHAR(255) NOT NULL, hora_entrada TIME(0) WITHOUT TIME ZONE NOT NULL, hora_saida TIME(0) WITHOUT TIME ZONE NOT NULL, data_admissao TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, data_saida TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, regime_de_trabalho VARCHAR(255) NOT NULL, turno VARCHAR(255) NOT NULL, ferias VARCHAR(255) NOT NULL, falta VARCHAR(255) NOT NULL, beneficio VARCHAR(255) DEFAULT NULL, hora_extra VARCHAR(255) DEFAULT NULL, banco_de_horas VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_7510a3cf521e1991 ON funcionario (empresa_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_7510a3cfdf6fa0a5 ON funcionario (pessoa_id)');
        $this->addSql('CREATE TABLE itens_produtos (id INT NOT NULL, pedido_id INT NOT NULL, produto_id INT NOT NULL, preco_unitario VARCHAR(255) NOT NULL, quantidade VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_ed7cf2fa105cfd56 ON itens_produtos (produto_id)');
        $this->addSql('CREATE INDEX idx_ed7cf2fa4854653a ON itens_produtos (pedido_id)');
        $this->addSql('ALTER TABLE empresa ADD CONSTRAINT fk_b8d75a501bb76823 FOREIGN KEY (endereco_id) REFERENCES enderecos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT fk_c4ec16cede734e51 FOREIGN KEY (cliente_id) REFERENCES clientes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT fk_c4ec16ce82c2d759 FOREIGN KEY (metodo_pagamento_id) REFERENCES metodos_de_pagamento (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT fk_c4ec16cec0c1e57b FOREIGN KEY (status_pedido_id) REFERENCES status_pedidos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE funcionario ADD CONSTRAINT fk_7510a3cfdf6fa0a5 FOREIGN KEY (pessoa_id) REFERENCES pessoas (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE funcionario ADD CONSTRAINT fk_7510a3cf521e1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE itens_produtos ADD CONSTRAINT fk_ed7cf2fa4854653a FOREIGN KEY (pedido_id) REFERENCES pedido (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE itens_produtos ADD CONSTRAINT fk_ed7cf2fa105cfd56 FOREIGN KEY (produto_id) REFERENCES produtos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP INDEX UNIQ_18A4F2AC3E3E11F0');
        $this->addSql('ALTER TABLE pagamentos DROP CONSTRAINT fk_efe465114854653a');
        $this->addSql('ALTER TABLE pagamentos ADD CONSTRAINT fk_efe465114854653a FOREIGN KEY (pedido_id) REFERENCES pedido (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
