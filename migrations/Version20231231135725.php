<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231231135725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       
      
        $this->addSql('DROP INDEX `primary` ON dept_manager');
      
        $this->addSql('ALTER TABLE dept_manager ADD PRIMARY KEY (emp_no, dept_no)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BA82C300E7927C74 ON employees (email)');
      
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demand DROP FOREIGN KEY FK_428D7973A2F57F47');
        $this->addSql('ALTER TABLE dept_manager ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX UNIQ_BA82C300E7927C74 ON employees');
        $this->addSql('ALTER TABLE salaries MODIFY emp_no INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON salaries');
        $this->addSql('ALTER TABLE salaries CHANGE emp_no emp_no INT NOT NULL');
    }
}
