<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018155322 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates `living_place` table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE `user` (
                id CHAR(36) NOT NULL PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL,
                password VARCHAR(100) DEFAULT NULL,
                avatar VARCHAR(255) DEFAULT NULL,
                token VARCHAR(100) DEFAULT NULL,
                active TINYINT(1) DEFAULT 0,
                reset_password_token VARCHAR(100) DEFAULT NULL,
                create_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                INDEX IDX_email_name (email),
                CONSTRAINT U_email_user UNIQUE KEY (email)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE user');
    }
}
