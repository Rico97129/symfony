<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230607082143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sapeur_pompier ADD appartenir_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sapeur_pompier ADD CONSTRAINT FK_2DFA1270E977E148 FOREIGN KEY (appartenir_id) REFERENCES caserne (id)');
        $this->addSql('CREATE INDEX IDX_2DFA1270E977E148 ON sapeur_pompier (appartenir_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sapeur_pompier DROP FOREIGN KEY FK_2DFA1270E977E148');
        $this->addSql('DROP INDEX IDX_2DFA1270E977E148 ON sapeur_pompier');
        $this->addSql('ALTER TABLE sapeur_pompier DROP appartenir_id');
    }
}
