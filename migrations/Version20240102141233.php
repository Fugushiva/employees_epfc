<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240102141233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       
       
       
        
       
     
      
        $this->addSql('ALTER TABLE employees CHANGE email email VARCHAR(255) NOT NULL');
       
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dept_emp ADD CONSTRAINT dept_emp_ibfk_1 FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dept_emp ADD CONSTRAINT dept_emp_ibfk_2 FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON UPDATE CASCADE');
        $this->addSql('CREATE INDEX dept_no ON dept_emp (dept_no)');
        $this->addSql('CREATE INDEX IDX_B2592B4DA2F57F47 ON dept_emp (emp_no)');
        $this->addSql('ALTER TABLE dept_manager ADD CONSTRAINT dept_manager_ibfk_1 FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE dept_manager ADD CONSTRAINT dept_manager_ibfk_2 FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX dept_no ON dept_manager (dept_no)');
        $this->addSql('CREATE INDEX IDX_C14AA78EA2F57F47 ON dept_manager (emp_no)');
        $this->addSql('ALTER TABLE employees CHANGE email email VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE INDEX emp_no ON emp_titles (emp_no, title_id, from_date)');
        $this->addSql('ALTER TABLE salaries MODIFY emp_no INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON salaries');
        $this->addSql('ALTER TABLE salaries CHANGE emp_no emp_no INT NOT NULL');
        $this->addSql('ALTER TABLE salaries ADD CONSTRAINT salaries_ibfk_1 FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_E6EEB84BA2F57F47 ON salaries (emp_no)');
        $this->addSql('ALTER TABLE salaries ADD PRIMARY KEY (emp_no, from_date)');
    }
}
