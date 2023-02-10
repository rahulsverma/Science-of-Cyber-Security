1. Start XAMPP, then start Apache and MySQL servers.

2. Go to "localhost/phpmyadmin" in your browser and import "userpass.sql" in "test" database.

3. Copy the folder "sqli1" to "C:\xampp\phpMyAdmin".

4. Go to "127.0.0.1/phpmyadmin/sqli1/index.php" in your browser.

5. Valid Username and Password combinations are:
   a) Username: user1, Password: 1111
   b) Username: user2, Password: 2222
   c) Username: user3, Password: 3333
   d) Username: user4, Password: 4444

6. For demo of SQL Injection enter any one of the statements as both username and password (without any spaces): 
   a) 1' or '1' = '1                                        (gives access to user1's account by default)
   b) 1' or '1' = '1' and user<>'user1                      (gives access to user2's account)
   c) 1' or '1' = '1' and user<>'user1' and user<>'user2    (gives access to user3's account and so on)