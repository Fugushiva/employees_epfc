<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240103130407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dept_title DROP FOREIGN KEY dept_title_ibfk_1');
        $this->addSql('DROP INDEX dept_no ON dept_title');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dept_title ADD CONSTRAINT dept_title_ibfk_1 FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON UPDATE CASCADE');
        $this->addSql('CREATE INDEX dept_no ON dept_title (dept_no)');
    }
}
