<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240102153047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dept_emp DROP FOREIGN KEY FK_B2592B4DCCF9E01E');
        $this->addSql('DROP INDEX IDX_B2592B4DCCF9E01E ON dept_emp');
        $this->addSql('ALTER TABLE dept_emp DROP departement_id');
    }
}
