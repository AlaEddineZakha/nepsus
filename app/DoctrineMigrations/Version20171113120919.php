<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171113120919 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bon_commande_client (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, statut VARCHAR(255) NOT NULL, totalht DOUBLE PRECISION NOT NULL, totalttc DOUBLE PRECISION NOT NULL, created DATETIME NOT NULL, dateecheance DATETIME NOT NULL, INDEX IDX_B235C53B19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bon_livraison_client (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, depth INT NOT NULL, INDEX IDX_64C19C1727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, capital DOUBLE PRECISION NOT NULL, matriculefiscale VARCHAR(255) NOT NULL, raison VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, region VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) NOT NULL, telephone INT DEFAULT NULL, mobile INT NOT NULL, fax INT DEFAULT NULL, siteweb VARCHAR(255) DEFAULT NULL, registre VARCHAR(255) NOT NULL, formejuridique VARCHAR(255) NOT NULL, created DATETIME NOT NULL, UNIQUE INDEX UNIQ_C7440455E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE configuration (id INT AUTO_INCREMENT NOT NULL, administrateur_id INT DEFAULT NULL, raison VARCHAR(255) NOT NULL, init TINYINT(1) NOT NULL, ville VARCHAR(255) NOT NULL, siteweb VARCHAR(255) NOT NULL, logo LONGBLOB DEFAULT NULL, adresse VARCHAR(255) NOT NULL, telephone INT DEFAULT NULL, fax INT DEFAULT NULL, pays VARCHAR(255) NOT NULL, formejuridique VARCHAR(255) NOT NULL, codedouane VARCHAR(255) DEFAULT NULL, matriculefiscale VARCHAR(255) NOT NULL, registredecommerce VARCHAR(255) NOT NULL, iban VARCHAR(255) DEFAULT NULL, bic VARCHAR(255) DEFAULT NULL, rib VARCHAR(255) DEFAULT NULL, abreviation VARCHAR(255) DEFAULT NULL, created DATETIME NOT NULL, lastmodified DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_A5E2A5D77EE5403C (administrateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_client (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, nom VARCHAR(255) NOT NULL, created DATETIME NOT NULL, INDEX IDX_57D633D419EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_devis (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrepot (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, capacite INT NOT NULL, created DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture_client (id INT AUTO_INCREMENT NOT NULL, bc_id INT DEFAULT NULL, statut VARCHAR(255) NOT NULL, totalht DOUBLE PRECISION NOT NULL, totalttc DOUBLE PRECISION NOT NULL, created DATETIME NOT NULL, dateecheance DATETIME NOT NULL, INDEX IDX_92D316F2954397FF (bc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, matriculefiscale VARCHAR(255) NOT NULL, raison VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, region VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) NOT NULL, telephone INT DEFAULT NULL, mobile INT NOT NULL, fax INT DEFAULT NULL, siteweb VARCHAR(255) DEFAULT NULL, registre VARCHAR(255) NOT NULL, formejuridique VARCHAR(255) NOT NULL, created DATETIME NOT NULL, UNIQUE INDEX UNIQ_369ECA32E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique_client (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, action VARCHAR(255) NOT NULL, time DATETIME NOT NULL, INDEX IDX_E06A40919EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journal (id INT AUTO_INCREMENT NOT NULL, action VARCHAR(255) NOT NULL, user VARCHAR(255) NOT NULL, time DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_bcc (id INT AUTO_INCREMENT NOT NULL, bc_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, quatity INT NOT NULL, totalht DOUBLE PRECISION NOT NULL, totalttc DOUBLE PRECISION NOT NULL, tva INT NOT NULL, INDEX IDX_FC9131CE954397FF (bc_id), INDEX IDX_FC9131CEF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_fc (id INT AUTO_INCREMENT NOT NULL, facture_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, quatity INT NOT NULL, totalht DOUBLE PRECISION NOT NULL, totalttc DOUBLE PRECISION NOT NULL, tva INT NOT NULL, INDEX IDX_43BF071A7F2DEE08 (facture_id), INDEX IDX_43BF071AF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modules (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devise (id INT AUTO_INCREMENT NOT NULL, libele VARCHAR(255) NOT NULL, created DATETIME NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE methode_transaction (id INT AUTO_INCREMENT NOT NULL, libele VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, created DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, facture_id INT DEFAULT NULL, devise_id INT DEFAULT NULL, methodetransaction_id INT DEFAULT NULL, datepaiement DATE NOT NULL, montant DOUBLE PRECISION NOT NULL, note VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, INDEX IDX_723705D17F2DEE08 (facture_id), INDEX IDX_723705D1F4445056 (devise_id), INDEX IDX_723705D1389B2500 (methodetransaction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permission (id INT AUTO_INCREMENT NOT NULL, libele VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, tva_id INT DEFAULT NULL, category_id INT DEFAULT NULL, libele VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, limitestock VARCHAR(255) NOT NULL, codedouane VARCHAR(255) NOT NULL, origine VARCHAR(255) NOT NULL, prixvente DOUBLE PRECISION NOT NULL, prixachat DOUBLE PRECISION NOT NULL, created DATE NOT NULL, INDEX IDX_29A5EC274D79775F (tva_id), INDEX IDX_29A5EC2712469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_permission (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, permission_id INT DEFAULT NULL, INDEX IDX_6F7DF886D60322AC (role_id), INDEX IDX_6F7DF886FED90CCA (permission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxe (id INT AUTO_INCREMENT NOT NULL, montant DOUBLE PRECISION NOT NULL, active VARCHAR(255) NOT NULL, created DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D64992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_8D93D649A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_8D93D649C05FB297 (confirmation_token), INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bon_commande_client ADD CONSTRAINT FK_B235C53B19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1727ACA70 FOREIGN KEY (parent_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D77EE5403C FOREIGN KEY (administrateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contact_client ADD CONSTRAINT FK_57D633D419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE facture_client ADD CONSTRAINT FK_92D316F2954397FF FOREIGN KEY (bc_id) REFERENCES bon_commande_client (id)');
        $this->addSql('ALTER TABLE historique_client ADD CONSTRAINT FK_E06A40919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE ligne_bcc ADD CONSTRAINT FK_FC9131CE954397FF FOREIGN KEY (bc_id) REFERENCES bon_commande_client (id)');
        $this->addSql('ALTER TABLE ligne_bcc ADD CONSTRAINT FK_FC9131CEF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_fc ADD CONSTRAINT FK_43BF071A7F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture_client (id)');
        $this->addSql('ALTER TABLE ligne_fc ADD CONSTRAINT FK_43BF071AF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D17F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture_client (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1F4445056 FOREIGN KEY (devise_id) REFERENCES devise (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1389B2500 FOREIGN KEY (methodetransaction_id) REFERENCES methode_transaction (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC274D79775F FOREIGN KEY (tva_id) REFERENCES taxe (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE role_permission ADD CONSTRAINT FK_6F7DF886D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE role_permission ADD CONSTRAINT FK_6F7DF886FED90CCA FOREIGN KEY (permission_id) REFERENCES permission (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE facture_client DROP FOREIGN KEY FK_92D316F2954397FF');
        $this->addSql('ALTER TABLE ligne_bcc DROP FOREIGN KEY FK_FC9131CE954397FF');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1727ACA70');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2712469DE2');
        $this->addSql('ALTER TABLE bon_commande_client DROP FOREIGN KEY FK_B235C53B19EB6921');
        $this->addSql('ALTER TABLE contact_client DROP FOREIGN KEY FK_57D633D419EB6921');
        $this->addSql('ALTER TABLE historique_client DROP FOREIGN KEY FK_E06A40919EB6921');
        $this->addSql('ALTER TABLE ligne_fc DROP FOREIGN KEY FK_43BF071A7F2DEE08');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D17F2DEE08');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1F4445056');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1389B2500');
        $this->addSql('ALTER TABLE role_permission DROP FOREIGN KEY FK_6F7DF886FED90CCA');
        $this->addSql('ALTER TABLE ligne_bcc DROP FOREIGN KEY FK_FC9131CEF347EFB');
        $this->addSql('ALTER TABLE ligne_fc DROP FOREIGN KEY FK_43BF071AF347EFB');
        $this->addSql('ALTER TABLE role_permission DROP FOREIGN KEY FK_6F7DF886D60322AC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC274D79775F');
        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D77EE5403C');
        $this->addSql('DROP TABLE bon_commande_client');
        $this->addSql('DROP TABLE bon_livraison_client');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE configuration');
        $this->addSql('DROP TABLE contact_client');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE ligne_devis');
        $this->addSql('DROP TABLE entrepot');
        $this->addSql('DROP TABLE facture_client');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE historique_client');
        $this->addSql('DROP TABLE journal');
        $this->addSql('DROP TABLE ligne_bcc');
        $this->addSql('DROP TABLE ligne_fc');
        $this->addSql('DROP TABLE lot');
        $this->addSql('DROP TABLE modules');
        $this->addSql('DROP TABLE devise');
        $this->addSql('DROP TABLE methode_transaction');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE permission');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_permission');
        $this->addSql('DROP TABLE taxe');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE user');
    }
}
