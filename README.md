## Temporary repository to show possible bug to Laravel Attributes developers

### About environemt
 - This example uses fresh Laravel V.5.8 installation with default auth
 - Only one third party package is installed, `rinvex/laravel-attributes` V. 2.1
 - 2 attribute types are used (Integer & Varchar), what extends default types (I needed to make attribute content to NOT REQUIRED)
 - One attribute is flagged as "is_collection"

### About issue
Sometimes, when I want to unset entity attribute values, it does not work. When I delete value from one attribute, I must clear cache manually to see correct value. When I try to reset values for multiple attributes, in reality it deletes values only from one attribute, whats more, I must manually delete cache to see changes.

### Setup
- Clone repository
- Install dependencies `composer install`
- Update database config
- Set app key `php artisan key:generate`
- Run migration `php artisan migrate`
- Run command `php artisan rinvex:migrate:attributes`
- Run Seed `php artisan db:seed`

### Steps to replicate
- Visit site
- Login as `test@example.com` with password `123456`
- You will see user object with 2 attributes (More about attributes in `PrepareDataSeeder::class`)
- Fill form fields and click `update` to set attribute values
- You will see that attribute values are updated correctly.
- Now delete attribute values by deleting text from text fields and click `update`
- You will see that attributes are still set with previous values
- Now click link `Clear cache` or run `php artisan cache:clear` from commandline to clear cache
- After reloading page value from one of attributes dissapeared. And not for second attribute. To clear second attribute I must reset attribute value again and click `update`. After that I need clear cache again
