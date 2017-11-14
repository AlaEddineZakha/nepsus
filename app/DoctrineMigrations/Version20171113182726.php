<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171113182726 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bon_commande_fournisseur DROP FOREIGN KEY FK_D91605A9A8CBA5F7');
        $this->addSql('DROP INDEX UNIQ_D91605A9A8CBA5F7 ON bon_commande_fournisseur');
        $this->addSql('ALTER TABLE bon_commande_fournisseur DROP lot_id');
        $this->addSql('ALTER TABLE lot ADD commandefournisseur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B296851E9 FOREIGN KEY (commandefournisseur_id) REFERENCES bon_commande_fournisseur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B81291B296851E9 ON lot (commandefournisseur_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bon_commande_fournisseur ADD lot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bon_commande_fournisseur ADD CONSTRAINT FK_D91605A9A8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D91605A9A8CBA5F7 ON bon_commande_fournisseur (lot_id)');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B296851E9');
        $this->addSql('DROP INDEX UNIQ_B81291B296851E9 ON lot');
        $this->addSql('ALTER TABLE lot DROP commandefournisseur_id');
    }
}
