<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231228165635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dept_emp DROP FOREIGN KEY dept_emp_ibfk_2');
        $this->addSql('ALTER TABLE dept_manager DROP FOREIGN KEY dept_manager_ibfk_2');
        $this->addSql('ALTER TABLE dept_title DROP FOREIGN KEY dept_title_ibfk_1');
        $this->addSql('ALTER TABLE dept_title DROP FOREIGN KEY dept_title_ibfk_2');
        $this->addSql('CREATE TABLE emp_title (id INT AUTO_INCREMENT NOT NULL, emp_no INT NOT NULL, title_id INT DEFAULT NULL, from_date DATE NOT NULL, to_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE link (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partner (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(60) NOT NULL, url VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salary (emp_no INT AUTO_INCREMENT NOT NULL, salary INT NOT NULL, from_date DATE NOT NULL, to_date DATE NOT NULL, PRIMARY KEY(emp_no)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE title (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE salaries DROP FOREIGN KEY salaries_ibfk_1');
        $this->addSql('DROP TABLE departments');
        $this->addSql('DROP TABLE emp_titles');
        $this->addSql('DROP TABLE links');
        $this->addSql('DROP TABLE partners');
        $this->addSql('DROP TABLE salaries');
        $this->addSql('DROP TABLE titles');
        $this->addSql('ALTER TABLE demand ADD CONSTRAINT FK_428D7973A2F57F47 FOREIGN KEY (emp_no) REFERENCES employees (emp_no)');
        $this->addSql('ALTER TABLE dept_emp DROP FOREIGN KEY dept_emp_ibfk_1');
        $this->addSql('DROP INDEX dept_emp_ibfk_2 ON dept_emp');
        $this->addSql('DROP INDEX IDX_B2592B4DA2F57F47 ON dept_emp');
        $this->addSql('ALTER TABLE dept_emp ADD id INT AUTO_INCREMENT NOT NULL, CHANGE dept_no dept_no VARCHAR(4) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE dept_manager DROP FOREIGN KEY dept_manager_ibfk_1');
        $this->addSql('DROP INDEX dept_no ON dept_manager');
        $this->addSql('DROP INDEX IDX_C14AA78EA2F57F47 ON dept_manager');
        $this->addSql('ALTER TABLE dept_manager ADD id INT AUTO_INCREMENT NOT NULL, DROP from_date, DROP to_date, CHANGE dept_no dept_no VARCHAR(4) NOT NULL, CHANGE emp_no title_id INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX dept_no ON dept_title');
        $this->addSql('DROP INDEX title_id ON dept_title');
        $this->addSql('ALTER TABLE dept_title CHANGE dept_no dept_no VARCHAR(4) NOT NULL');
        $this->addSql('ALTER TABLE employees CHANGE gender gender VARCHAR(1) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE departments (dept_no CHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, dept_name VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, roi VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, UNIQUE INDEX dept_name (dept_name), PRIMARY KEY(dept_no)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE emp_titles (id INT AUTO_INCREMENT NOT NULL, emp_no INT NOT NULL, title_id INT DEFAULT NULL, from_date DATE NOT NULL, to_date DATE DEFAULT NULL, UNIQUE INDEX emp_no (emp_no, title_id, from_date), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE links (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE partners (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(60) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, url VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, logo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE salaries (emp_no INT NOT NULL, from_date DATE NOT NULL, salary INT NOT NULL, to_date DATE NOT NULL, INDEX IDX_E6EEB84BA2F57F47 (emp_no), PRIMARY KEY(emp_no, from_date)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE titles (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE salaries ADD CONSTRAINT salaries_ibfk_1 FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON DELETE CASCADE');
        $this->addSql('DROP TABLE emp_title');
        $this->addSql('DROP TABLE link');
        $this->addSql('DROP TABLE partner');
        $this->addSql('DROP TABLE salary');
        $this->addSql('DROP TABLE title');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE demand DROP FOREIGN KEY FK_428D7973A2F57F47');
        $this->addSql('ALTER TABLE dept_emp MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON dept_emp');
        $this->addSql('ALTER TABLE dept_emp DROP id, CHANGE dept_no dept_no CHAR(4) NOT NULL');
        $this->addSql('ALTER TABLE dept_emp ADD CONSTRAINT dept_emp_ibfk_1 FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dept_emp ADD CONSTRAINT dept_emp_ibfk_2 FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX dept_emp_ibfk_2 ON dept_emp (dept_no)');
        $this->addSql('CREATE INDEX IDX_B2592B4DA2F57F47 ON dept_emp (emp_no)');
        $this->addSql('ALTER TABLE dept_emp ADD PRIMARY KEY (emp_no, dept_no)');
        $this->addSql('ALTER TABLE dept_manager MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON dept_manager');
        $this->addSql('ALTER TABLE dept_manager ADD from_date DATE NOT NULL, ADD to_date DATE NOT NULL, DROP id, CHANGE dept_no dept_no CHAR(4) NOT NULL, CHANGE title_id emp_no INT NOT NULL');
        $this->addSql('ALTER TABLE dept_manager ADD CONSTRAINT dept_manager_ibfk_2 FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dept_manager ADD CONSTRAINT dept_manager_ibfk_1 FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX dept_no ON dept_manager (dept_no)');
        $this->addSql('CREATE INDEX IDX_C14AA78EA2F57F47 ON dept_manager (emp_no)');
        $this->addSql('ALTER TABLE dept_manager ADD PRIMARY KEY (emp_no, dept_no)');
        $this->addSql('ALTER TABLE dept_title CHANGE dept_no dept_no CHAR(4) NOT NULL');
        $this->addSql('ALTER TABLE dept_title ADD CONSTRAINT dept_title_ibfk_1 FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dept_title ADD CONSTRAINT dept_title_ibfk_2 FOREIGN KEY (title_id) REFERENCES titles (id) ON UPDATE CASCADE');
        $this->addSql('CREATE INDEX dept_no ON dept_title (dept_no)');
        $this->addSql('CREATE INDEX title_id ON dept_title (title_id)');
        $this->addSql('ALTER TABLE employees CHANGE gender gender VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE roles roles JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
    }
}
