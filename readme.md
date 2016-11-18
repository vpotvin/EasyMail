EasyMail is an email list management system completed as a term project for UCO's Software Engineering I class. The project was
completed using the CodeIgnitor Framework in PHP. 

-----------------------------------------------------------------------------------

Local install and setup

$ means at the command line, don’t type the $

Get Git from http://git-scm.com/downloads

Once git is installed run these commands

$ git config --global user.name "Your Name"
$ git config –-global user.email “Your@emailaddress.com” 

You can install PHP, and MySQL on their own, or you can use MAMP or XAMPP for PHP, MySQL, and apache, if you want that too. 

Install PHP on your computer
Install MySQL on your computer

Start MySQL

Login to MySQL as root, if the commands are the same on windows it should be:
$ mysql -uroot

Setup database to test if everything is working. 

CREATE USER ‘se’@’localhost’ IDENTIFIED BY ‘seproject’;
CREATE USER 'se'@'localhost' IDENTIFIED BY 'seproject';

GRANT ALL PRIVELEGES ON *.* TO ‘se’@’localhost’ WITH GRANT OPTION;

CREATE DATABASE SE;

USE SE

CREATE TABLE Emails(
		Addr varchar(50));
INSERT INTO Emails VALUES(“ANYTHING YOU WANT”);
EXIT

Create a folder where you will work on the project. 

At the command line CD into the project

$ git init
$ git remote add origin https://github.com/barnettlynn/SEproject
$ git remote add live ssh://root@ 104.131.114.140/var/www/site.git
$ git pull origin master
$ php –S localhost:3000 
If your using apache locally you can just start apache instead of using PHP build in server like about. 

in you browser got to localhost:3000, you should see a welcome to Codeigniter message

in your browser got to localhost:3000/contacts/contactlist, you should see the value you inserted in to the database. 

Make a comment in the info.php file in the top directory and save it. 

$ git add –A
$ git commit –m “say what you did’
$ git push origin master
$ git push live master

go to https://github.com/barnettlynn/SEproject/blob/master/index.php and confirm that your change in the info.php was made in the repo. 

If all that worked you everything should be set up to work locally. 

Workflow

Always before you start working you should run:
$ git pull origin master
this will get all the changes others have made. 

Make what ever changes you want inside you git directory 
You can use the app in your local  browser with the PHP built in server, php –S localhost:3000, or apache.

Once your changes are working you can submit with the following commands. It is good to push and pull in small increments  so everyone gets the changes. 

Run:
$ git add –A
This means add everything in to the directory your changes, you can add individual files, but if find this easier. 

$ git commit –m “say what you did’
This commits the changes you’ve made to code your going to commit and documents what changes you have made

$ git push origin master
This pushes your changed to the github repo so other can pull it down

$ git push live master
This pushed your changes to the actual server running the application. 

CodeIgnitor

These are just some basics of codeignitor we have to use Google and the documentation a lot.

Routes
o	Routes map the URL visited to code you want to run on the server. 
o	The routes file is located at Application/config/routes.php in you application
o	In initial code $route['contacts/listcontacts'] = 'contacts/listcontacts'; matches the route contacts/listcontacts to the contacts class(controller) and listcontacs method.
o	You typically create a new file for each controller class, but it isn’t required. 
o	Routes can be much more flexible see the docs.
	
Controller
o	Controller map how you control what happens, typically you map a route to a controller the controller accesses a model to get data and the creates a view(an html file) and sends it back to the client.
o	Controllers are located at application/controllers. 
Model
o	Model is where you set up your methods to get data from the database
o	Models are located at application/models
o	You typically create a separate file for each table/class/model.
o	Codeigniter has ORM which means you can get data out of the database without using SQL, but you can use SQL too if you prefer
o	See the docs on how to the ORM. 
Views
o	Views are the HTML templates that you send back to the client. 
o	Views are located at. Application/views in you application
o	Commonly reused templates often start with an underscore, already made a header and footer in the application. 

Live Server
o	You should be able to SSH into the live server with your name as your initial username and password.
o	You can also SSH in as the route user with seproject as the password, but you shouldn’t need to. 
o	You can login to the live database with $ MySQL –use –p and then when prompted the password is seproject
o	The github repo is located at /var/www/site.git
o	The live application is located at /var/www/html
o	The apache config files are located at /etc/apache2/
o	If you need to restart apache(the web server) you can run $ service apache2 restart
