<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231228154531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        
        $this->addSql('ALTER TABLE employees CHANGE emp_no emp_no INT AUTO_INCREMENT NOT NULL, CHANGE gender gender VARCHAR(1) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
       
        $this->addSql('ALTER TABLE employees CHANGE emp_no emp_no INT NOT NULL, CHANGE gender gender VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE roles roles JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
    }
}
