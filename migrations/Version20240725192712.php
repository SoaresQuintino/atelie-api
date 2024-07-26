<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240725192712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Configurando tabela produto';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("
        UPDATE 
            produtos 
        SET 
            peso = '0.00',
            largura ='0.00',
            altura = '0.00',
            comprimento = '0.00'
        ");
        $this->addSql('ALTER TABLE produtos ALTER peso TYPE DOUBLE PRECISION USING peso::double precision');
        $this->addSql('ALTER TABLE produtos ALTER largura TYPE DOUBLE PRECISION USING largura::double precision');
        $this->addSql('ALTER TABLE produtos ALTER altura TYPE DOUBLE PRECISION USING altura::double precision');
        $this->addSql('ALTER TABLE produtos ALTER comprimento TYPE DOUBLE PRECISION USING comprimento::double precision');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE produtos ALTER peso TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE produtos ALTER largura TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE produtos ALTER altura TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE produtos ALTER comprimento TYPE VARCHAR(255)');
    }
}
