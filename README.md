Installation:

1.Install the dependencies:
- sudo apt install php libapache2-mod-php php-mysql -y && sudo apt-get install mysql -y && sudo apt-get install apache2 -y

2.Copy project to /var/www/html (mv sql-injection/* /var/www/html)

3.Create the database of the project:
- sudo mysql -u root -e "CREATE DATABASE main_db;"

4.Load the database into your local mysql server (sudo mysql -u root main_db < /var/www/html/database.sql)

5.Start the apache and mysql server (sudo service apache2 start && sudo service mysql start)

6.Done

Notes:
It's best to delete/hide database.sql after step 4 so the user can't find the file containing the passwords.