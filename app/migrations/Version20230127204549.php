<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230127204549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE airport_transfer_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE booking_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE contact_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE log_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE testimonials_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tours_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tours_booking_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE vehicles_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE airport_transfer (id SERIAL NOT NULL, fname TEXT NOT NULL, email TEXT NOT NULL, country TEXT NOT NULL, phone TEXT NOT NULL, no_person TEXT NOT NULL, pick_up_loc TEXT NOT NULL, date_pickup TEXT NOT NULL, time_pickup TEXT NOT NULL, date_drop_off TEXT NOT NULL, drop_off_time TEXT NOT NULL, drop_off_location TEXT NOT NULL, other_details TEXT DEFAULT NULL, total TEXT NOT NULL, pay_now TEXT NOT NULL, pay_later TEXT NOT NULL, ip_addr TEXT NOT NULL, ref_number TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE contact (id SERIAL NOT NULL, fname TEXT NOT NULL, email TEXT NOT NULL, phone TEXT NOT NULL, msg TEXT NOT NULL, ip_addr TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE vehicles (id SERIAL NOT NULL, vehicle_name VARCHAR(191) NOT NULL, slug TEXT NOT NULL, image_name VARCHAR(191) NOT NULL, price INT NOT NULL, transmission TEXT NOT NULL, vehicle_category INT NOT NULL, status INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE booking (id SERIAL NOT NULL, ref_number TEXT NOT NULL, ip_addr TEXT NOT NULL, fname TEXT NOT NULL, email TEXT NOT NULL, country TEXT NOT NULL, phone TEXT NOT NULL, total TEXT NOT NULL, pay_now TEXT NOT NULL, pay_later TEXT NOT NULL, pick_up_loc TEXT NOT NULL, date_pickup TEXT NOT NULL, time_pickup TEXT NOT NULL, date_drop_off TEXT NOT NULL, drop_off_location TEXT NOT NULL, drop_off_time TEXT NOT NULL, vehicle_id INT NOT NULL, vehicle_image TEXT NOT NULL, other_details TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE testimonials (id SERIAL NOT NULL, people TEXT NOT NULL, img TEXT NOT NULL, description TEXT NOT NULL, description_fr TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tours_booking (id SERIAL NOT NULL, fname TEXT NOT NULL, email TEXT NOT NULL, phone TEXT NOT NULL, no_person TEXT NOT NULL, location TEXT NOT NULL, places TEXT NOT NULL, pick_up_loc TEXT NOT NULL, date_pickup TEXT NOT NULL, time_pickup TEXT NOT NULL, other_details TEXT NOT NULL, ip_addr TEXT NOT NULL, ref_number TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tours (id SERIAL NOT NULL, tour_name VARCHAR(191) NOT NULL, tour_css_id VARCHAR(191) NOT NULL, tour_image_name VARCHAR(191) NOT NULL, status INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE log (id SERIAL NOT NULL, message TEXT, context TEXT, level INT, level_name TEXT, extra TEXT, created_at TEXT NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE airport_transfer_seq CASCADE');
        $this->addSql('DROP SEQUENCE booking_seq CASCADE');
        $this->addSql('DROP SEQUENCE contact_seq CASCADE');
        $this->addSql('DROP SEQUENCE log_seq CASCADE');
        $this->addSql('DROP SEQUENCE testimonials_seq CASCADE');
        $this->addSql('DROP SEQUENCE tours_seq CASCADE');
        $this->addSql('DROP SEQUENCE tours_booking_seq CASCADE');
        $this->addSql('DROP SEQUENCE vehicles_seq CASCADE');
        $this->addSql('DROP TABLE airport_transfer');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE vehicles');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE testimonials');
        $this->addSql('DROP TABLE tours_booking');
        $this->addSql('DROP TABLE tours');
        $this->addSql('DROP TABLE log');
    }
}
