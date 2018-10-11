<html><head>
    <title>UpdateTasks</title>
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">   
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/updatetaskstyle.css">
  </head>
  <body>
      
      
<div class = "background">
<fieldset>
<legend><h2>UPDATE TASKS</h2></legend> 
      
      <div class = "form" align="center">
      <br>
        
        <form action="/task/updateTask/<?php echo $task -> task_id;?>" method="post">  
            <br />
            Task ID*: <?php echo $task -> task_id; ?>
            <br>
            <br>
            Task Name*: <input type="text" name="newTaskname" placeholder="Please enter new taskname" required="required">
            <br>
            <br>
            Task Description: <textarea name="newDes" cols="40" rows="5" placeholder="Please enter new task description"></textarea>
            <br>
            <br>
            Lowest Required Point*: <input type="text" name="newPoint" placeholder="Please enter new point" required="required">
            <br>
            <br>
            <br />
            <input type="reset" value="reset">
            <input type="submit" value="update">
        </form>
     </div>
 </div>

</body></html>