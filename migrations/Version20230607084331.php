<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230607084331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE intervention_sapeur_pompier (intervention_id INT NOT NULL, sapeur_pompier_id INT NOT NULL, INDEX IDX_BF3698678EAE3863 (intervention_id), INDEX IDX_BF369867172CC69C (sapeur_pompier_id), PRIMARY KEY(intervention_id, sapeur_pompier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE intervention_sapeur_pompier ADD CONSTRAINT FK_BF3698678EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervention_sapeur_pompier ADD CONSTRAINT FK_BF369867172CC69C FOREIGN KEY (sapeur_pompier_id) REFERENCES sapeur_pompier (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intervention_sapeur_pompier DROP FOREIGN KEY FK_BF3698678EAE3863');
        $this->addSql('ALTER TABLE intervention_sapeur_pompier DROP FOREIGN KEY FK_BF369867172CC69C');
        $this->addSql('DROP TABLE intervention_sapeur_pompier');
    }
}
