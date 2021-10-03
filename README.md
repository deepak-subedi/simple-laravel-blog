# Simple-laravel-blog

### Please find the project in master branch.

1. Language: PHP (7.4)
2. Framework: Laravel (8.54)
3. DB: MySQL / MariaDB

### Website Modules:

1. User
    - Login
    - Create / Modify / Delete own blog posts
    - <b>Registration [Basically user is create by admin only, but this functionality will be added soon]</b>
    - <b>Create / Modify / Delete own Comments [This functionaly will be added soon]</b>

2. Admin
    - Login [Basically admin is created by seeding the database]
      Please use below command after cloning this project:
      - php artisan migrate
      - php artisan migrate:fresh --seed
    - Create / Modify / Delete Users

3. Blog Display
    - List all the blog posts on the role basis[Admin can see all the blog post but user can only see their own blog post]
    - Detail blog page
    - List all the blog post on the basis of category and author
    - Search the blog post on the basis of "title and description"
    - <b>Search by category and author will be implement later on.</b>
    - <b>Comments on blog post display will be implemented later on.</b>
