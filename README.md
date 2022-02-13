# Notes

- PROJ : http://api.symfony.car-rental.local/api

- Regenerate **Entity** from an existing database by :
- https://symfony.com/doc/current/doctrine/reverse_engineering.html (How to Generate Entities from an Existing Database)
- - `php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity` - asks Doctrine to introspect the database and generate new PHP classes with annotation metadata into `src/Entity`.
- - `php bin/console make:entity --regenerate App` - generates getter/setter methods for all Entities
- - Maker bundle : `composer require symfony/maker-bundle --dev`
- Install debugging tools
- - `composer req symfony/web-profiler-bundle` and `composer require profiler --dev`
- 

# Dev

- ` @ApiResource()` with data added in *Testimonials.php*

# JWT

- Install `composer require lexik/jwt-authentication-bundle`
- Use *cygwin*
- - `mkdir -p config/jwt`
- - `openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096`
- - `openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout`
- **Car Rental API** postman collection name
- **Car Rental API ENV** postman environment for dynamicall save email as variable & token for futur queries