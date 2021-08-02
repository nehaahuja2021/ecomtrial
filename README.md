
## Starting the Project

1) For accessing laravel framewok,
-  one needs to be in project folder. For windows : C:\laravel\ecomtrial>php artisan serve ( This starts the server at http://127.0.0.1:8000)
-  For views, we have welcome.blade, master.blade(HomePage), header.blade, footer.blade,login.blade ( As of now, Bootstrap has been used for basic layout)
 
-  For DB, in .env file, DB name should be ecomtrial. Simultaneously, create a DB in Xampp inside phpmyadmin.
-  To create a table , we need to check migrations folder. Delete all the migrations that exist.
-  Create a new migration using cmd : C:\laravel\ecomtrial>php artisan make:migration create_users_table. ( A table will be created inside migrations)
-  Inside this migrations, Set up columns that are required. e.g for ## USERS TABLE :  public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }


- Now to migrate this table to DB, use cmd : C:\laravel\ecomtrial>php artisan migrate  & VOILA !! Table is migrated to DB.
- To add Dummy Data in DB, we use Seeder and cmd is C:\laravel\ecomtrial>php artisan make:seeder UserSeeder ( This can de added through XAMPP GUI also)
- Check userseeder file and then use C:\laravel\ecomtrial>php artisan db:seed --class UserSeeder  to insert data to DB table.
