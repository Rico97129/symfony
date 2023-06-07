<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230607092957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        
        $this->addSql('ALTER TABLE role ADD role_intervention_id INT NOT NULL, ADD sapeur_pompier_id INT DEFAULT NULL, ADD intervention_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A417D24C9 FOREIGN KEY (role_intervention_id) REFERENCES sapeur_pompier (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A172CC69C FOREIGN KEY (sapeur_pompier_id) REFERENCES sapeur_pompier (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A8EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id)');
        $this->addSql('CREATE INDEX IDX_57698A6A417D24C9 ON role (role_intervention_id)');
        $this->addSql('CREATE INDEX IDX_57698A6A172CC69C ON role (sapeur_pompier_id)');
        $this->addSql('CREATE INDEX IDX_57698A6A8EAE3863 ON role (intervention_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A417D24C9');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A172CC69C');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A8EAE3863');
        $this->addSql('DROP INDEX IDX_57698A6A417D24C9 ON role');
        $this->addSql('DROP INDEX IDX_57698A6A172CC69C ON role');
        $this->addSql('DROP INDEX IDX_57698A6A8EAE3863 ON role');
        $this->addSql('ALTER TABLE role DROP role_intervention_id, DROP sapeur_pompier_id, DROP intervention_id');
    }
}
