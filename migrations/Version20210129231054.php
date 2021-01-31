<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210129231054 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE resume (id INT NOT NULL, fullname VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(15) NOT NULL, resume_status VARCHAR(50) NOT NULL, profession VARCHAR(255) NOT NULL, image_url VARCHAR(1100) NOT NULL, date_birth DATE NOT NULL, education_type VARCHAR(35) NOT NULL, education_list JSON DEFAULT NULL, salary NUMERIC(3, 2) NOT NULL, skills VARCHAR(255) NOT NULL, about TEXT DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE resume');
    }
}
