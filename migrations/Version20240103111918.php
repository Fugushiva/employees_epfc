<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240103111918 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dept_emp ADD CONSTRAINT FK_B2592B4DE6B0AD08 FOREIGN KEY (dept_no) REFERENCES departments (dept_no)');
        $this->addSql('CREATE INDEX IDX_B2592B4DE6B0AD08 ON dept_emp (dept_no)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dept_emp DROP FOREIGN KEY FK_B2592B4DE6B0AD08');
        $this->addSql('DROP INDEX IDX_B2592B4DE6B0AD08 ON dept_emp');
    }
}
