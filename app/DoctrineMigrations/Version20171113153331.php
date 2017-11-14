<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171113153331 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bon_commande_fournisseur (id INT AUTO_INCREMENT NOT NULL, fournisseur_id INT DEFAULT NULL, lot_id INT DEFAULT NULL, statut VARCHAR(255) NOT NULL, totalht DOUBLE PRECISION NOT NULL, totalttc DOUBLE PRECISION NOT NULL, created DATETIME NOT NULL, dateecheance DATETIME NOT NULL, INDEX IDX_D91605A9670C757F (fournisseur_id), UNIQUE INDEX UNIQ_D91605A9A8CBA5F7 (lot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture_fournisseur (id INT AUTO_INCREMENT NOT NULL, bf_id INT DEFAULT NULL, statut VARCHAR(255) NOT NULL, totalht DOUBLE PRECISION NOT NULL, totalttc DOUBLE PRECISION NOT NULL, created DATETIME NOT NULL, dateecheance DATETIME NOT NULL, INDEX IDX_311911C4A29D67CD (bf_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique_fournisseur (id INT AUTO_INCREMENT NOT NULL, fournisseur_id INT DEFAULT NULL, action VARCHAR(255) NOT NULL, time DATETIME NOT NULL, INDEX IDX_EF30C454670C757F (fournisseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_bcf (id INT AUTO_INCREMENT NOT NULL, bf_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, quatity INT NOT NULL, totalht DOUBLE PRECISION NOT NULL, totalttc DOUBLE PRECISION NOT NULL, tva INT NOT NULL, INDEX IDX_8CFBC541A29D67CD (bf_id), INDEX IDX_8CFBC541F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_ff (id INT AUTO_INCREMENT NOT NULL, facture_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, quatity INT NOT NULL, totalht DOUBLE PRECISION NOT NULL, totalttc DOUBLE PRECISION NOT NULL, tva INT NOT NULL, INDEX IDX_33D5F3957F2DEE08 (facture_id), INDEX IDX_33D5F395F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bon_commande_fournisseur ADD CONSTRAINT FK_D91605A9670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE bon_commande_fournisseur ADD CONSTRAINT FK_D91605A9A8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id)');
        $this->addSql('ALTER TABLE facture_fournisseur ADD CONSTRAINT FK_311911C4A29D67CD FOREIGN KEY (bf_id) REFERENCES bon_commande_fournisseur (id)');
        $this->addSql('ALTER TABLE historique_fournisseur ADD CONSTRAINT FK_EF30C454670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE ligne_bcf ADD CONSTRAINT FK_8CFBC541A29D67CD FOREIGN KEY (bf_id) REFERENCES bon_commande_fournisseur (id)');
        $this->addSql('ALTER TABLE ligne_bcf ADD CONSTRAINT FK_8CFBC541F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_ff ADD CONSTRAINT FK_33D5F3957F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture_fournisseur (id)');
        $this->addSql('ALTER TABLE ligne_ff ADD CONSTRAINT FK_33D5F395F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE lot ADD entrepot_id INT DEFAULT NULL, ADD nbproduits INT NOT NULL, ADD prix DOUBLE PRECISION NOT NULL, ADD etat VARCHAR(255) NOT NULL, ADD created DATE NOT NULL');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B72831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id)');
        $this->addSql('CREATE INDEX IDX_B81291B72831E97 ON lot (entrepot_id)');
        $this->addSql('ALTER TABLE transaction ADD facturefournisseur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D19BBB7FB1 FOREIGN KEY (facturefournisseur_id) REFERENCES facture_fournisseur (id)');
        $this->addSql('CREATE INDEX IDX_723705D19BBB7FB1 ON transaction (facturefournisseur_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE facture_fournisseur DROP FOREIGN KEY FK_311911C4A29D67CD');
        $this->addSql('ALTER TABLE ligne_bcf DROP FOREIGN KEY FK_8CFBC541A29D67CD');
        $this->addSql('ALTER TABLE ligne_ff DROP FOREIGN KEY FK_33D5F3957F2DEE08');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D19BBB7FB1');
        $this->addSql('DROP TABLE bon_commande_fournisseur');
        $this->addSql('DROP TABLE facture_fournisseur');
        $this->addSql('DROP TABLE historique_fournisseur');
        $this->addSql('DROP TABLE ligne_bcf');
        $this->addSql('DROP TABLE ligne_ff');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B72831E97');
        $this->addSql('DROP INDEX IDX_B81291B72831E97 ON lot');
        $this->addSql('ALTER TABLE lot DROP entrepot_id, DROP nbproduits, DROP prix, DROP etat, DROP created');
        $this->addSql('DROP INDEX IDX_723705D19BBB7FB1 ON transaction');
        $this->addSql('ALTER TABLE transaction DROP facturefournisseur_id');
    }
}
