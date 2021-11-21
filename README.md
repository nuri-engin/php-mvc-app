# php-mvc-app
#### How to start the application 
- Clone to repo to your local, `cd` into `public` folder and run the command: `php -S localhost:8080`
- Open a browser and direct to the `http://localhost:8080`

#### Database schema
```
    Database:products_crud - Table: products
    +---------------+--------------+------+----------+-----------+
    | Field         | Type          | Null | Default | Extra     |
    +---------------+--------------+-------+---------+-----------+
    | id            | int(11)       | NO   | None    | auto .inc |
    | title         | varchar(512)  | NO   | None    |           |
    | description   | longtext      | YES  | NULL    |           |
    | image         | varchar(2048) | YES  | NULL    |           |
    | price         | decimal(10,2) | NO   | None    |           |
    | create_date   | datetime      | YES  | None    |           |
    +---------------+--------------+-------+---------+-----------+
```

#### Good to know notes 
- Ensure to install XAMPP to your computer
- Ensure to run the XAMPP for MySQL 
- Ensure to create a MySQL database with name of `products_crud`

---
#### Some useful command for the Ubuntu/Linux
- Run the XAMPP Panel: `sudo /opt/lampp/manager-linux-x64.run`
- Start the LAMPP: `sudo /opt/lampp/lampp start`
- Stop the LAMPP: `sudo /opt/lampp/lampp stop`
- Stop the Apache server: `sudo /etc/init.d/apache2 stop`
- Restart the LAMPP: `sudo /opt/lampp/lampp restart`   
- Destroy 8080 port: `sudo lsof -t -i:8080`

#### Some useful code snippets 
- Echo the variables  
    ```          
    echo 'Describe here...';
    echo '<pre>';
    var_dump($any_variable);
    echo '</pre>';
    exit;
    ```          


