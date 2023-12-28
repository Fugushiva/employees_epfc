<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231228145649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demand (id INT AUTO_INCREMENT NOT NULL, emp_no INT NOT NULL, type VARCHAR(60) NOT NULL, about VARCHAR(30) NOT NULL, status TINYINT(1) DEFAULT NULL, INDEX IDX_428D7973A2F57F47 (emp_no), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employees CHANGE gender gender VARCHAR(1) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE departments (dept_no CHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, dept_name VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, roi VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, UNIQUE INDEX dept_name (dept_name), PRIMARY KEY(dept_no)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
       
        $this->addSql('ALTER TABLE employees CHANGE gender gender VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE roles roles JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
    }
}
