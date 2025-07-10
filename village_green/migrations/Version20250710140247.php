<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250710140247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client CHANGE nom nom VARCHAR(100) DEFAULT NULL, CHANGE prenom prenom VARCHAR(100) DEFAULT NULL, CHANGE raison_sociale raison_sociale VARCHAR(255) DEFAULT NULL, CHANGE type_client type_client VARCHAR(20) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone VARCHAR(20) DEFAULT NULL, CHANGE coefficient coefficient NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE commande CHANGE date_commande date_commande DATETIME DEFAULT NULL, CHANGE reduction reduction NUMERIC(5, 2) DEFAULT NULL, CHANGE mode_paiement mode_paiement VARCHAR(50) DEFAULT NULL, CHANGE date_reglement date_reglement DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE commercial CHANGE nom nom VARCHAR(100) DEFAULT NULL, CHANGE specialite specialite VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE facture CHANGE date_facture date_facture DATE DEFAULT NULL, CHANGE total_ht total_ht NUMERIC(10, 2) DEFAULT NULL, CHANGE tva tva NUMERIC(10, 2) DEFAULT NULL, CHANGE total_ttc total_ttc NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE fournisseur CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE contact contact VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne ADD produit_id INT NOT NULL, ADD commande_id INT NOT NULL, CHANGE prix_unitaire prix_unitaire NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne ADD CONSTRAINT FK_57F0DB83F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne ADD CONSTRAINT FK_57F0DB8382EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_57F0DB83F347EFB ON ligne (produit_id)');
        $this->addSql('CREATE INDEX IDX_57F0DB8382EA2E54 ON ligne (commande_id)');
        $this->addSql('ALTER TABLE livraison ADD commande_id INT NOT NULL, CHANGE date_livraison date_livraison DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_A60C9F1F82EA2E54 ON livraison (commande_id)');
        $this->addSql('ALTER TABLE produit CHANGE libelle_court libelle_court VARCHAR(100) DEFAULT NULL, CHANGE reference_fourn reference_fourn VARCHAR(100) DEFAULT NULL, CHANGE prix_achat prix_achat NUMERIC(10, 2) DEFAULT NULL, CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE rubrique CHANGE photo photo VARCHAR(255) DEFAULT NULL, CHANGE nom_rubrique nom_rubrique VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE sous_rubrique CHANGE nom_sous_rubrique nom_sous_rubrique VARCHAR(100) DEFAULT NULL, CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE statut_commande CHANGE libelle libelle VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE statut_livraison CHANGE libelle libelle VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE statut_commande CHANGE libelle libelle VARCHAR(50) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sous_rubrique CHANGE nom_sous_rubrique nom_sous_rubrique VARCHAR(100) DEFAULT \'NULL\', CHANGE photo photo VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE statut_livraison CHANGE libelle libelle VARCHAR(50) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE fournisseur CHANGE nom nom VARCHAR(255) DEFAULT \'NULL\', CHANGE contact contact VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE ligne DROP FOREIGN KEY FK_57F0DB83F347EFB');
        $this->addSql('ALTER TABLE ligne DROP FOREIGN KEY FK_57F0DB8382EA2E54');
        $this->addSql('DROP INDEX IDX_57F0DB83F347EFB ON ligne');
        $this->addSql('DROP INDEX IDX_57F0DB8382EA2E54 ON ligne');
        $this->addSql('ALTER TABLE ligne DROP produit_id, DROP commande_id, CHANGE prix_unitaire prix_unitaire NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE facture CHANGE date_facture date_facture DATE DEFAULT \'NULL\', CHANGE total_ht total_ht NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE tva tva NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE total_ttc total_ttc NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE produit CHANGE libelle_court libelle_court VARCHAR(100) DEFAULT \'NULL\', CHANGE reference_fourn reference_fourn VARCHAR(100) DEFAULT \'NULL\', CHANGE prix_achat prix_achat NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE photo photo VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE commercial CHANGE nom nom VARCHAR(100) DEFAULT \'NULL\', CHANGE specialite specialite VARCHAR(50) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE rubrique CHANGE photo photo VARCHAR(255) DEFAULT \'NULL\', CHANGE nom_rubrique nom_rubrique VARCHAR(100) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F82EA2E54');
        $this->addSql('DROP INDEX IDX_A60C9F1F82EA2E54 ON livraison');
        $this->addSql('ALTER TABLE livraison DROP commande_id, CHANGE date_livraison date_livraison DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE client CHANGE nom nom VARCHAR(100) DEFAULT \'NULL\', CHANGE prenom prenom VARCHAR(100) DEFAULT \'NULL\', CHANGE raison_sociale raison_sociale VARCHAR(255) DEFAULT \'NULL\', CHANGE type_client type_client VARCHAR(20) DEFAULT \'NULL\', CHANGE email email VARCHAR(255) DEFAULT \'NULL\', CHANGE telephone telephone VARCHAR(20) DEFAULT \'NULL\', CHANGE coefficient coefficient NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE commande CHANGE date_commande date_commande DATETIME DEFAULT \'NULL\', CHANGE reduction reduction NUMERIC(5, 2) DEFAULT \'NULL\', CHANGE mode_paiement mode_paiement VARCHAR(50) DEFAULT \'NULL\', CHANGE date_reglement date_reglement DATE DEFAULT \'NULL\'');
    }
}
