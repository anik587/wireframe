
## Clone a repository

1. Create A Empty Repository In Your Computer.
2. Open Terminal In Your Computer 
3. Now Login Into Bitbucket (Assuming that you have accepted my invitation)
4. You’ll see the clone button under the **Source** heading. Click that button.
5. Run That Command In Your Terminal
6. You Will Find Project Necessary Files In Your Directory(Use cd command to access into sub directory)
7. Run `composer install` Command In Your Terminal Then All Dependencies Will Get Downloaded.
8. Now Create A Database  Called `wireframe` (For this project Mysql Database is used)
9. In .env File Configure Your Database

## Sample Configuration
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=wireframe
	DB_USERNAME=root
	DB_PASSWORD=nopass
	
10. Now Run `php artisan migrate` Which Will Create Necessary Tables In Your Dataase
11. Now Run `php artisan serve` This Command Will Run This Project In Your Local Machine And Will Provide An Ip Address (Like http://127.0.0.1:8000)
12. Access Corresponding IP From Your Favourite Browser
	
	