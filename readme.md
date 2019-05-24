## Readme 

This is built using laravel 5.8. Redis is used for caching. Outside of that, the project doesn't depend on any external library outside of the `laravel/php` requirements

- `php artisan route:list`  to view all the existing endpoints defined
- `app/Cache` for my caching strategy to reduce latency
- `app/Repositories` I decided to go with the repository pattern. All of the endpoints repositories are inside there.
- `app/constants.php` To hold all the constants, in this case the endpoints url. This makes it easier to change them if we have to instead of digging into source files.
- `test/Feature/ApiTest` test file for the tests I wrote. Ofcause I could have added more tests give enough time.
- I used Guzzle as my network request library

### Improvements points
- Have api transformers to hide fields that the consumer shouldn't have access to unless if they have to. Or to hide the database structure (internal data structure).
- Schedule a Job to run to update the cache, fire an even when new data is added.

#### Question:
Consume the respective API resources:
1. Users: https://jsonplaceholder.typicode.com/users 
2. Posts: https://jsonplaceholder.typicode.com/posts 
3. Comments: https://jsonplaceholder.typicode.com/comments  
4. And render on the homepage to replace the respective placeholder information provided Focus of assessment (HINTS): 
- Testing 
- Performance(Caching, Eventing, etc.)
- SOLID code 
