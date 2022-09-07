# Notes

<img src="./app.png"  alt="App"/>

- URL : http://api.symfony.car-rental.local/ AND http://api.symfony.car-rental.local/api
- Install debugging tools - `composer req symfony/web-profiler-bundle` and `composer require profiler --dev`
- Apache Pack : `composer require symfony/apache-pack`
- Maker bundle : `composer require symfony/maker-bundle --dev`
- HTTP Client - `composer require symfony/http-client`
- Configure swagger UI routes in `config/routes.yaml` and `config/routes/api_platform.yaml`
- Name conversion (CamelCase to snake_case) configs below
```
# api/config/services.yaml
services:
    'Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter': ~
# api/config/packages/api_platform.yaml
api_platform:
    name_converter: 'Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter'
```
- ESX
- - Installation : `composer require elasticsearch/elasticsearch` -> `composer require elasticsearch/elasticsearch:^7.10` (Compatible with Bonsai)
- OpenApi
- - File `src\OpenApi\OpenApiFactory.php`
- - Register in `services.yaml`
```
services:
    App\OpenApi\OpenApiFactory:
        decorates: 'api_platform.openapi.factory'
        arguments: ['@App\OpenApi\OpenApiFactory.inner']
        autoconfigure: false
```
- - Using annotation
```
"openapi_context"={
     "summary"="hidden"
}
```
- Verify token in header with event subscriber
- - Command : `php bin/console generate-client-token`
- - Add `client-token` with value generated from CLI in header
- Swagger UI header verification config : `config/packages/api_platform.yaml`
- **PHPCS Fixer**
- - Install `composer require friendsofphp/php-cs-fixer`
- - Create `.php-cs-fixer.dist.php` if not present
- - RUN `./vendor/bin/php-cs-fixer fix --dry-run --verbose --config=.php-cs-fixer.dist.php src` : List all issues in code
- - RUN `./vendor/bin/php-cs-fixer fix --verbose --config=.php-cs-fixer.dist.php src` : Fix all issues
- POST / PUT for complex object schema
```
 *      collectionOperations={
 *          "post_contact": {
 *              "route_name"="",
 *              "path"="",
 *              "method"="",
 *              "openapi_context"={
 *                  "summary"="",
 *                  "description"="",
 *                  "requestBody": {
 *                      "content": {
 *                          "application/json": {
 *                              "schema": {
 *                                  "type": "object",
 *                                  "properties": {
 *                                      "email": {"type": "string", "example": "owner@email.com"},
 *                                      "name": {"type": "string", "example": "FX Inc."},
 *                                      "address": {"type": "string", "example": "123 Rue Jkl Collorado", "nullable": true},
 *                                      "address_junction": {
 *                                          "type": "array",
 *                                          "nullable": true,
 *                                          "items": {
 *                                              "type":"string", "example":"96KB", "nullable": true
 *                                          }
 *                                       },
 *                                      "address_city": {"type": "string", "example": "Sillicon Valley", "nullable": true},
 *                                      "phone": {"type": "string", "example": "05 04 03 02 01" ,"nullable": true},
 *                                      "type": {"type": "string", "example": "1-2-3", "nullable": true, "enum": {"1-2-3", "4-5", "other", "player-1", "multi-player"}},
 *                                      "any_date": {"type": "string", "example": "2025-01-01", "nullable": true},
 *                                      "levels": {"type": "integer", "example": 100, "nullable": true},
 *                                      "contacts": {
 *                                          "type": "array",
 *                                          "nullable": true,
 *                                          "items": {
 *                                              "type":"object",
 *                                              "properties": {
 *                                                  "firstname": {"type": "string", "example": "John", "nullable": true},
 *                                                  "lastname": {"type": "string", "example": "Doe", "nullable": true},
 *                                                  "phone": {"type": "string", "example": "02 04 02 05 01", "nullable": true},
 *                                                  "email": {"type": "string", "example": "contact@email.com", "nullable": true},
 *                                              }
 *                                          }
 *                                      },
 *                                      "comment": {"type": "string", "example": "Commentaire en cours !", "nullable": true},
 *                                  },
 *                              },
 *                          },
 *                      },
 *                  },
 *              }
 *          }
 *     },
```
- **POST** `/contact-us` : Customized JSON body in `src/ApiResources/Contact.php` and Controller `src/Controller/Contact/CreateContactController.php` persisting contact in DB

## Logs

- Install `composer require symfony/monolog-bundle`
- Add to `monoglog.yaml`
```
api_log:
    type: stream
    path: "%kernel.logs_dir%/api.log"
    level: info
    channels: [ "api_log_channel" ]
```
- `onKernelTerminate` event subscriber to log information

# Docs

- https://github.com/teohhanhui/api-platform-docs/blob/master/core/swagger.md **OpenAPI Specification Support (formerly Swagger)**
- https://api-platform.com/docs/core/configuration/ **API Platform Configuration**
- https://www.elastic.co/guide/en/elasticsearch/client/php-api/7.17/index.html **Elasticsearch PHP Client 7.17**
- https://github.com/symfony/symfony/blob/6.2/src/Symfony/Component/HttpFoundation/Response.php **HTTP Response Code**
- https://symfony.com/doc/current/doctrine.html **Databases and the Doctrine ORM**
- https://api-platform.com/docs/core/jwt/ **JWT Authentication / Swagger manipulation**
- https://swagger.io/docs/specification/describing-responses/ **Describing Responses**
- https://swagger.io/docs/specification/describing-request-body/ **Describing Request Body**
- https://swagger.io/docs/specification/2-0/describing-parameters/ **Describing Parameters**

# Tests

- **PHPUnit**
- Install `composer require phpunit/phpunit` and `composer req symfony/phpunit-bridge`
- Configuration for deprecated logs on console `SYMFONY_DEPRECATIONS_HELPER`
- List of tests
- - `php bin/phpunit --filter ElasticSearchTest`
- - `php bin/phpunit --filter EsxUserTest`
- - `php bin/phpunit`
- **EndToEnd testing**
- Install `composer require symfony/test-pack`
- - ` php bin/phpunit ./tests/EndToEnd/`

# Addons

### Reverse engineering entities

- Regenerate **Entity** from an existing database by :
- https://symfony.com/doc/current/doctrine/reverse_engineering.html (How to Generate Entities from an Existing Database)
- - `php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity` - asks Doctrine to introspect the database and generate new PHP classes with annotation metadata into `src/Entity`.
- - `php bin/console make:entity --regenerate App` - generates getter/setter methods for all Entities 

### Using JWT for authentication

- Install `composer require lexik/jwt-authentication-bundle`
- Use *cygwin*
- - `mkdir -p config/jwt`
- - `openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096`
- - `openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout`