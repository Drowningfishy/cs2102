## TODOS  
#### 1. Install PHP dev environment. See project description. Set the username and password to "postgres".  
This must include:  
1. A PHP runtime.  
2. Apache web server.  
3. **Postgres** Database  
#### 2. Go to localhost, see whether the installation is successful or not. Go to localhost/phpMyAdmin or localhost/phpPgAdmin to see whether can connect to the database. (must with username and password both set to postgres)  
#### 3. Install Composer (php package admin tool).  
#### 4. Copy the project files to your Apache server application directory (For me it's \apache2\htdocs) and delete everything originally there.  
#### 5. Run "composer install" **in project directory, i.e. cs2102\task-sourcing)**.  
#### 6. Go to localhost again, and see if there's anything out.  
#### 7. **Get familiar with php syntax and mini3 "framework"(search it on github, and see others project based on mini3).**  
#### 8. Look at the design below, and **Point out the problems, please!**.   
#### 9. Search google to understand "MVC", "CRUD"   
## During the meeting we will discuss:  
#### 1. Task distribution.  
#### 2. Detailed design of database (important, as this is a database module)  
#### 3. Design of controller functions  
#### 4. Design of views  
#### 5. Design of exception handling, and testing  
#### 6. Pre-alpha demo and future report.  


## Task to be completed:
1. Modify view/user/index.php and view/user/register.php. I copied these two forms from somewhere else.
2. Add some error desplaying and tracking system. Maybe include error messages in $_Get super parameter and desplay them in header?


#### Models:
##### 1. User  
has many tasks  
has many bids  
- Email, primary key, lowercase  
- nickname, unique  
- account value  

##### 2. Task  
belongs to user  
has many bids  
- title  
- description  
- release time  

##### 3. Bid  
belongs to user  
belongs to task  
- amount  
- remark  
- bidding time  

#### Controllers:  
##### 1. User controller  
- CRUD, index  

##### 2. Task controller  
- CRUD, index  

##### 3. Bid controller
- CRUD, index  

##### 4. Cookie/Session controller  
- CRUD  
  
#### Views:  
##### 1. Static pages:  
- Index  
- Help  
- About  
- License  
##### 2. Login page:  
- Login, handler: Session controller create  
##### 3. all tasks  
- See all tasks(maybe with categories or my tasks), handler: Task controller index  
##### 4. Task view (maybe split into different pages)  
- Create new task, handler: Task controller create  
- See the detail of a task, handler: Task controller read  
- See all bidding associated with this task, handler: Bid controller index  
- Create new bid to the task, handler: Bid controller create  
- Retrieve current bid if any, handler: Bid controller delete  
- Delete the task, handler: Task controller delete  
- Update task info, handler: Task controller update  
##### 5. Bid view  
- My bid, handler: Bid controller index  
- View bid details, handler: Bid controller read  
##### 6. Admin page  
- Add account value, handler: (not sure, to be discussed)  