<html><head>
    <title>UpdateTasks</title>
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">   
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/updatetaskstyle.css">
  </head>
  <body>
      
      
<div class = "background">
<div class = "background2" style="text-align:center">
<fieldset>
<legend><h2>UPDATE TASKS</h2></legend> 
        
        <form action="/task/updateTask/<?php echo $task -> task_id;?>" method="post">  
            <br />
            <br />
            Task ID*: <?php echo $task -> task_id; ?>
            <br>
            <br>
            Task Name*: <input type="text" name="newTaskname" placeholder="Please enter new taskname" required="required">
            <br>
            <br>
            Task Description: 
            <br />
            <textarea name="newDes" cols="80" rows="10" placeholder="Please enter new task description"></textarea>
            <br>
            <br>
            Task type*: <?php echo $task -> task_type;?>
            <br>
            <br>
            Lowest Required Point*: <input type="text" name="newPoint" placeholder="Please enter new point" required="required">
            <br>
            <br>
            <br />
            <input type="reset" value="reset" class="detail" style="margin-left: 37%">   
            <input type="submit" value="update" class="detail" style="margin-left: 5%">
        </form>
</fieldset>


</body></html>