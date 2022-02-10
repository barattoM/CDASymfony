<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220210135007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products ADD picture VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customers CHANGE company_name company_name VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contact_name contact_name VARCHAR(30) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contact_title contact_title VARCHAR(30) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE address address VARCHAR(60) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE city city VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE region region VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE postal_code postal_code VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE country country VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone VARCHAR(24) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE fax fax VARCHAR(24) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE orders CHANGE ship_name ship_name VARCHAR(40) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ship_address ship_address VARCHAR(60) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ship_city ship_city VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ship_region ship_region VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ship_postal_code ship_postal_code VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ship_country ship_country VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE products DROP picture, CHANGE product_name product_name VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE quantity_per_unit quantity_per_unit VARCHAR(20) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE suppliers CHANGE company_name company_name VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contact_name contact_name VARCHAR(30) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contact_title contact_title VARCHAR(30) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE address address VARCHAR(60) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE city city VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE region region VARCHAR(15) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE postal_code postal_code VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE country country VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone VARCHAR(24) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE fax fax VARCHAR(24) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE home_page home_page VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
