<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171111155116 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ligne_bcf DROP FOREIGN KEY FK_8CFBC541954397FF');
        $this->addSql('DROP TABLE bon_commande_fournisseur');
        $this->addSql('DROP TABLE ligne_bcf');
        $this->addSql('ALTER TABLE fournisseur DROP capital');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bon_commande_fournisseur (id INT AUTO_INCREMENT NOT NULL, fournisseur_id INT DEFAULT NULL, INDEX IDX_D91605A9670C757F (fournisseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_bcf (id INT AUTO_INCREMENT NOT NULL, bc_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, quatity INT NOT NULL, UNIQUE INDEX UNIQ_8CFBC541F347EFB (produit_id), INDEX IDX_8CFBC541954397FF (bc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ligne_bcf ADD CONSTRAINT FK_8CFBC541954397FF FOREIGN KEY (bc_id) REFERENCES bon_commande_fournisseur (id)');
        $this->addSql('ALTER TABLE fournisseur ADD capital DOUBLE PRECISION NOT NULL');
    }
}
