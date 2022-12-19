# **UserHistory**

* Clone the repository:  
  _- git clone https://github.com/ipenev92/user-history.git_  
* Run the following commands:  
  _- composer update (Requires Composer)_  
  _- npm install (Requires Node.js)_  

* Rename ".env.example" to ".env" and update the database values as follows:  
  _DB_CONNECTION=mysql_  
  _DB_HOST=127.0.0.1_
  _DB_PORT=3306_  
  _DB_DATABASE=userhistory_  
  _DB_USERNAME=root_  
  _DB_PASSWORD=_  

* Run the following commands:  
  _- php artisan migrate (answer "yes" to create database)_  
  _- php artisan db:seed_  
  _- php artisan key:generate_  

* Run the servers:  
  _- php artisan serve_  
  _- npm run dev_  

* The application should be ready and working at your localhost.
