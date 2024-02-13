<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240213112441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reserva ADD valoracion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BD29AA1AC FOREIGN KEY (valoracion_id) REFERENCES valoracion (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_188D2E3BD29AA1AC ON reserva (valoracion_id)');
        $this->addSql('ALTER TABLE valoracion DROP INDEX IDX_6D3DE0F4D67139E8, ADD UNIQUE INDEX UNIQ_6D3DE0F4D67139E8 (reserva_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BD29AA1AC');
        $this->addSql('DROP INDEX UNIQ_188D2E3BD29AA1AC ON reserva');
        $this->addSql('ALTER TABLE reserva DROP valoracion_id');
        $this->addSql('ALTER TABLE valoracion DROP INDEX UNIQ_6D3DE0F4D67139E8, ADD INDEX IDX_6D3DE0F4D67139E8 (reserva_id)');
    }
}
