# bookstore

a simple bookstore management website

---

<a href="http://nibrash.liveblog365.com/books_store/" target="_blank">visitor panel live ink</a>

---
<a href="http://nibrash.liveblog365.com/books_store/admin" target="_blank">admin panel live ink</a>

---

### Version Requirment

---

- php >= 8.1.2
- phpmyadmin >= 5.1.1

---

## Installation Proccess

---
- [ ] Step - 1  

[Download the Project](https://github.com/code-with-Rashed/bookstore/archive/refs/heads/master.zip)  

- [ ] Step - 2  

Creaate a database like : <strong>bookstore</strong>  

### Export sql file in your (bookstore) database
- To open the sql folder. 
- choose/copy the bookstore.sql file. 
- then export in your database. 


- [ ] Step - 4 

### Set Environment Variables  
- To open the Configuration/env.php file.  
- You have to fill in your app url , app folder , database credentials and time zone.  
For Example...  

```php 
//application information
$APP_URL = "http://localhost/bookstore";
$APP_FOLDER = "/bookstore";
//-----------------------

//mysql database information
$MSDB_HOST = "localhost";
$MSDB_PORT = 3306;
$MSDB_USERNAME = "root";
$MSDB_PASSWORD = "";
$MSDB_NAME = "bookstore";
//--------------------------

// set default timezone
$DEFAULT_TIMEZONE = "Asia/Dhaka";
//---------------------
```

### Admin panel (dummy) credentials
- Hit this link http://yourhostname/admin

| Email              | Password |
|--------------------|----------|
| admin@gmail.com    | admin    |

### Required / key Features
![key-features](./Preview/sitemap/sitemap.png)

### database diagram
![schema-diagram](./Preview/diagram/schema-diagram.png)

### Preview for visitor panel
![home-page](./preview/showcase/visitorpanel/home-page.jpeg) <br><hr><br>
![cart-page](./preview/showcase/visitorpanel/cart-page.jpeg) <br><hr><br>
![privacy-policy-page](./preview/showcase/visitorpanel/invoice.jpeg) <br><hr><br>
![contact-page](./preview/showcase/visitorpanel/contact-page.jpeg)
<br><hr><br>


### Preview for admin panel
![dashboard](./preview/showcase/adminpanel/dashboard.jpeg) <br><hr><br>
![orders-management](./preview/showcase/adminpanel/orders-management.jpeg) <br><hr><br>
![orders-details](./preview/showcase/adminpanel/order-details.jpeg) <br><hr><br>
![books-management](./preview/showcase/adminpanel/books-management.jpeg) <br><hr><br>
![add-books](./preview/showcase/adminpanel/add-book.jpeg) <br><hr><br>
![books-image](./preview/showcase/adminpanel/add-book-image-modal.jpeg) <br><hr><br>
![orders-management](./preview/showcase/adminpanel/orders-management.jpeg) <br><hr><br>
![order-details](./preview/showcase/adminpanel/order-details.jpeg) <br><hr><br>
![banner-management](./preview/showcase/adminpanel/banner-page.jpeg) <br><hr><br>
![message-management](./preview/showcase/adminpanel/message-page.jpeg) <br><hr><br>
![message-details](./preview/showcase/adminpanel/message-details-page.jpeg) <br><hr><br>
![settings-management](./preview/showcase/adminpanel/settings-page.jpeg) <br><hr><br>
![prifile-management](./preview/showcase/adminpanel/profile.jpeg) <br><hr><br>