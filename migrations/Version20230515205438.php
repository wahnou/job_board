<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230515205438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tag_job_offer (tag_id INT NOT NULL, job_offer_id INT NOT NULL, PRIMARY KEY(tag_id, job_offer_id))');
        $this->addSql('CREATE INDEX IDX_39BD0069BAD26311 ON tag_job_offer (tag_id)');
        $this->addSql('CREATE INDEX IDX_39BD00693481D195 ON tag_job_offer (job_offer_id)');
        $this->addSql('ALTER TABLE tag_job_offer ADD CONSTRAINT FK_39BD0069BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tag_job_offer ADD CONSTRAINT FK_39BD00693481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE job_offer ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_offer ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('COMMENT ON COLUMN job_offer.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_288A3A4E12469DE2 ON job_offer (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE tag_job_offer');
        $this->addSql('ALTER TABLE job_offer DROP CONSTRAINT FK_288A3A4E12469DE2');
        $this->addSql('DROP INDEX IDX_288A3A4E12469DE2');
        $this->addSql('ALTER TABLE job_offer DROP category_id');
        $this->addSql('ALTER TABLE job_offer DROP created_at');
    }
}
