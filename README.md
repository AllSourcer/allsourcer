# allsourcer
Currently The allsourcer folder contains all what is required to deploy the web version of the Allsourcer project built using laravel
To Run the app you need
* create a database in your system (give it what ever name you want)
* make sure your update the database file located inside config/database.php with the information about the database you created

*Endeavor to update only the array that contains mysql not sqlite or posgrsql or any other.
if done move to the root of the project and run the command ` php artisan migrate `
* when done run the command ` php artisan serv `
* now the allsourcer app will be running on your localhost on port 8000.
