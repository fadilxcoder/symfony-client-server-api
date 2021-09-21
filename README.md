# Notes

- PROJ : http://api.symfony.car-rental.local/

- Regenerate **Entity** from an existing database by :
- https://symfony.com/doc/current/doctrine/reverse_engineering.html (How to Generate Entities from an Existing Database)
- - `php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity` - asks Doctrine to introspect the database and generate new PHP classes with annotation metadata into `src/Entity`.
- - `php bin/console make:entity --regenerate App` - generates getter/setter methods for all Entities
- - Maker bundle : `composer require symfony/maker-bundle --dev`

# Dev

- ` @ApiResource()` in *Testimonials.php*
