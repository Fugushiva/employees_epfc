<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240103143343 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dept_manager DROP FOREIGN KEY FK_C14AA78EA2F57F47');
        $this->addSql('DROP INDEX UNIQ_C14AA78EA2F57F47 ON dept_manager');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dept_manager ADD CONSTRAINT FK_C14AA78EA2F57F47 FOREIGN KEY (emp_no) REFERENCES employees (emp_no)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C14AA78EA2F57F47 ON dept_manager (emp_no)');
    }
}
