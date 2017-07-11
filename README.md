# php-super-mario

For Educational Purposes Only

Uses JSON instead of database since assignment called for no traditional database access. 
You should be able to download and run without any configuration.

index.php handles all of the page requests. 
For example, if you were to visit the about page (?page=about), index.php would authenticate the 
existance of the about page in the config.php file and then call the AboutController class.

For administrative demo
- Username: dinocajic
- Password: supermario

For non-administrative demo
- Username: someguy
- Password: something

Or you can create your own account by clicking on the register link next to the login button.

Features
- Custom, lightweight, MVC framework
- Custom CSS
- No JavaScript (All animations done with CSS)
- No Databases (All simulated with JSON files)
- User Registration System
- Login System
- Member Pages: Main, About, News, Contact, Profile and Messages
- Administrative Pages: Add/Remove News, Send Messages, User Management
- Games: Sudoku, Tic-Tac-Toe

Steps to creating a new page
Lets say you want to create a page named Services.
1. Open configuration/config.php and add services into the $_pages array
2. Create ServicesController.php page in the controller directory
3. Create a class within the ServicesController.php file named ServicesController
4. Add main() method to ServicesController

That's all that's required. After that, you can create ServicesModel.php page and ServicesView.php files. 
Although it's not necessary, for structure name your models "NameModel.php" and views "NameView.php." For 
consistency, name your classes the same as your file-names: ServicesModel and ServicesView in these cases.

If you have multiple words in your page, i.e. Privacy Policy, the procedure is identical. Concatenate the 
words with an underscore: privacy_policy. When visitors come to that page, they'll see ?page=privacy_policy 
in the address bar. Next,
1. Open configuration/config.php and add privacy_policy into the $_pages array
2. Create Privacy_policyController.php page in the controller directory
3. Create a class within the Privacy_policyController.php file named Privacy_policyController
4. Add main() method to Privacy_policyController
