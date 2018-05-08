# msgphp-debug
Test project to reproduce twig autowire Exception

Steps to reproduce $twig autowire Exception

_Controller "App\Controller\User\LoginController" requires that you provide a value for the "$twig" argument. Either the argument is nullable and no null value has been provided, no default value has been provided or because there is a non optional argument after this one._

1. composer install
2. Allow execute recipe with a (Yes for all packages)
3. php bin\console make:user
    Answer positive to all questions with default value, select credential type 2 (or any other)

4. Run server - php bin/console server:run
5. go to URL http://127.0.0.1:8000/login
    there it is - Exception.
6. clear:cache
7. same shit
