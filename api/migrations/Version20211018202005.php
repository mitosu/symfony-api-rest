<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018202005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE `living_place`(
                id CHAR(36) NOT NULL PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                description VARCHAR(100) DEFAULT NULL,
                number_rooms CHAR(5) NOT NULL,
                city VARCHAR(50) NOT NULL,
                province VARCHAR(50) NOT NULL,
                postal_code CHAR(10) NOT NULL,
                address VARCHAR(100) NOT NULL,
                cover_photo VARCHAR(100) DEFAULT NULL,
                active TINYINT(1) DEFAULT 0,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                INDEX IDX_name_living_place (name),
                CONSTRAINT U_name_living_place UNIQUE KEY (name)
    ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE living_place');
    }
}
