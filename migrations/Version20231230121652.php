<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231230121652 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demand ADD CONSTRAINT FK_428D7973A2F57F47 FOREIGN KEY (emp_no) REFERENCES employees (emp_no)');
        $this->addSql('DROP INDEX dept_name ON departments');
        $this->addSql('ALTER TABLE departments ADD id INT AUTO_INCREMENT NOT NULL, CHANGE dept_no dept_no VARCHAR(4) NOT NULL, CHANGE description description LONGTEXT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE dept_emp DROP FOREIGN KEY dept_emp_ibfk_3');
        $this->addSql('ALTER TABLE dept_emp DROP FOREIGN KEY dept_emp_ibfk_2');
        $this->addSql('DROP INDEX dept_emp_ibfk_2 ON dept_emp');
        $this->addSql('DROP INDEX IDX_B2592B4DA2F57F47 ON dept_emp');
        $this->addSql('ALTER TABLE dept_emp ADD id INT AUTO_INCREMENT NOT NULL, CHANGE dept_no dept_no VARCHAR(4) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE dept_manager DROP FOREIGN KEY dept_manager_ibfk_2');
        $this->addSql('ALTER TABLE dept_manager DROP FOREIGN KEY dept_manager_ibfk_3');
        $this->addSql('DROP INDEX dept_no ON dept_manager');
        $this->addSql('DROP INDEX IDX_C14AA78EA2F57F47 ON dept_manager');
        $this->addSql('ALTER TABLE dept_manager ADD id INT AUTO_INCREMENT NOT NULL, DROP from_date, DROP to_date, CHANGE dept_no dept_no VARCHAR(4) NOT NULL, CHANGE emp_no title_id INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE dept_title DROP FOREIGN KEY dept_title_ibfk_1');
        $this->addSql('ALTER TABLE dept_title DROP FOREIGN KEY dept_title_ibfk_2');
        $this->addSql('DROP INDEX dept_no ON dept_title');
        $this->addSql('DROP INDEX title_id ON dept_title');
        $this->addSql('ALTER TABLE dept_title CHANGE dept_no dept_no VARCHAR(4) NOT NULL');
        $this->addSql('DROP INDEX emp_no ON emp_titles');
        $this->addSql('ALTER TABLE employees CHANGE gender gender VARCHAR(1) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE salaries DROP FOREIGN KEY salaries_ibfk_1');
        $this->addSql('DROP INDEX IDX_E6EEB84BA2F57F47 ON salaries');
        $this->addSql('DROP INDEX `primary` ON salaries');
        $this->addSql('ALTER TABLE salaries CHANGE emp_no emp_no INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE salaries ADD PRIMARY KEY (emp_no)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE demand DROP FOREIGN KEY FK_428D7973A2F57F47');
        $this->addSql('ALTER TABLE departments MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON departments');
        $this->addSql('ALTER TABLE departments DROP id, CHANGE dept_no dept_no CHAR(4) NOT NULL, CHANGE description description TEXT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX dept_name ON departments (dept_name)');
        $this->addSql('ALTER TABLE departments ADD PRIMARY KEY (dept_no)');
        $this->addSql('ALTER TABLE dept_emp MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON dept_emp');
        $this->addSql('ALTER TABLE dept_emp DROP id, CHANGE dept_no dept_no CHAR(4) NOT NULL');
        $this->addSql('ALTER TABLE dept_emp ADD CONSTRAINT dept_emp_ibfk_3 FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE dept_emp ADD CONSTRAINT dept_emp_ibfk_2 FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX dept_emp_ibfk_2 ON dept_emp (dept_no)');
        $this->addSql('CREATE INDEX IDX_B2592B4DA2F57F47 ON dept_emp (emp_no)');
        $this->addSql('ALTER TABLE dept_emp ADD PRIMARY KEY (emp_no, dept_no)');
        $this->addSql('ALTER TABLE dept_manager MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON dept_manager');
        $this->addSql('ALTER TABLE dept_manager ADD from_date DATE NOT NULL, ADD to_date DATE NOT NULL, DROP id, CHANGE dept_no dept_no CHAR(4) NOT NULL, CHANGE title_id emp_no INT NOT NULL');
        $this->addSql('ALTER TABLE dept_manager ADD CONSTRAINT dept_manager_ibfk_2 FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dept_manager ADD CONSTRAINT dept_manager_ibfk_3 FOREIGN KEY (emp_no) REFERENCES employees (emp_no)');
        $this->addSql('CREATE INDEX dept_no ON dept_manager (dept_no)');
        $this->addSql('CREATE INDEX IDX_C14AA78EA2F57F47 ON dept_manager (emp_no)');
        $this->addSql('ALTER TABLE dept_manager ADD PRIMARY KEY (emp_no, dept_no)');
        $this->addSql('ALTER TABLE dept_title CHANGE dept_no dept_no CHAR(4) NOT NULL');
        $this->addSql('ALTER TABLE dept_title ADD CONSTRAINT dept_title_ibfk_1 FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dept_title ADD CONSTRAINT dept_title_ibfk_2 FOREIGN KEY (title_id) REFERENCES titles (id) ON UPDATE CASCADE');
        $this->addSql('CREATE INDEX dept_no ON dept_title (dept_no)');
        $this->addSql('CREATE INDEX title_id ON dept_title (title_id)');
        $this->addSql('ALTER TABLE employees CHANGE gender gender VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE roles roles JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('CREATE UNIQUE INDEX emp_no ON emp_titles (emp_no, title_id, from_date)');
        $this->addSql('ALTER TABLE salaries MODIFY emp_no INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON salaries');
        $this->addSql('ALTER TABLE salaries CHANGE emp_no emp_no INT NOT NULL');
        $this->addSql('ALTER TABLE salaries ADD CONSTRAINT salaries_ibfk_1 FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_E6EEB84BA2F57F47 ON salaries (emp_no)');
        $this->addSql('ALTER TABLE salaries ADD PRIMARY KEY (emp_no, from_date)');
    }
}
