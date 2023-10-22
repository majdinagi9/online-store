Document name: Working prototype
File name: README.txt
Date: May 3, 2020
Team number :1
Team members:
Majdi Nagi
Karma Gurung
RIgsang Doma
Amjad Naji
ABout the document: 

The three working pages:
Login page
Registration Page
Home page

File Names:

Home folder:
    includes folder:
        connect.php
        db.php
        dbcontroller.php
        errors.php
        footer.php
        header.php
        server.php
    mailhost folder:
    images folder:
checkout.php
login-b.php
login.php
register.php
path.php
index.php
style.css
forms.css
akrm.sql
README.txt



The top level file used to Launch the application; login.php

In the folder called AKRM, there are the working prototype pages. 
This program, at this point, is capable of recognizing the user and also making 
the user register. The user will be in SESSION from the minute they log in until 
they logout. When the user logout the SESSION will be destroyed. The user will not be 
capable of viewing any pages until they log in. In the database called "AKRM," there are
two tables. The first table is a customer who has (id[Primary key], username, password, street, city, zip); 
Also, there is another table called item(item_num[Primary key], item, item_image,quantity, price, description);
which will display the items from in our stock to the customer. 
