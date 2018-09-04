#### Models:
##### 1. User  
has many tasks  
has many bids  
-Email, primary key, lowercase  
-nickname, unique  
-account value  

##### 2. Task  
belongs to user  
has many bids  
-title  
-description  
-release time  

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