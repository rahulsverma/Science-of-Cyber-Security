1. Start XAMPP, then start Apache and MySQL servers.

2. Go to "localhost/phpmyadmin" in your browser and import "naivebayes.sql" in "naivebayes" database(needs to be created manually) and import "userpass.sql" in "test" database.

3. Copy the folder "sqli2" to "C:\xampp\phpMyAdmin".

4. Go to "127.0.0.1/phpmyadmin/sqli2/index.php" in your browser.

5. Enter a normal username as input username and password for checking if the detector is working
   a) rahul
   b) user1

6. Enter a  SQLI query or long username with spaces as username and password to check if its being detected
   a) 1' or '1' = '1
   b) 1' or '1' = '1' and user<>'user1
   c) 105; DROP TABLE example
   d) 105 OR 1=1
   e) "" or ""=""

7. SQLI detector will show if the entered username is SQLI attempt or not.