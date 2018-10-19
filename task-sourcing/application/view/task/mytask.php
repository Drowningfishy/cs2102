<html><head>
    <title>ReadTask</title>

        <link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">   
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/mytask.css">


  </head>
  </head>
  <body align = "center">
    <div class = "background">
    <div class = "tasks">
      <a class="home" id="home" href="<?php echo URL; ?>task/new">Create Task</a>
      <fieldset>
      <legend><h3>My created tasks</h3></legend>
      <ul id="incompleted-tasks">
      <?php 
        if (isset($my_tasks)) {
          foreach($my_tasks as $task) { 		?>
            
                <label> Task id: <?php echo htmlspecialchars($task->task_id, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> Task name: <?php echo htmlspecialchars($task->task_name, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> Expect point: <?php echo htmlspecialchars($task->expect_point, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> Description: <?php echo htmlspecialchars($task->description, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> Owner email: <?php echo htmlspecialchars($task->owner_email, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <a href="<?php echo URL; ?>task/detail/<?php echo $task -> task_id ?>"><button class="delete2">Detail</button></a>
                <br>
            
        <?php }
          } ?>
      </ul>
     </fieldset>

     <br />
     <br />
    <fieldset>
      <legend><h3>My assigned tasks</h3></legend>
      <ul id="incompleted-tasks">
      <?php 
        if (isset($assign_tasks)) {
          foreach($assign_tasks as $task) { 		?>
           
                <label> Task id: <?php echo htmlspecialchars($task->task_id, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> Task name: <?php echo htmlspecialchars($task->task_name, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> Expect point: <?php echo htmlspecialchars($task->expect_point, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> Description: <?php echo htmlspecialchars($task->description, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> Owner point: <?php echo htmlspecialchars($task->owner_email, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <a href="<?php echo URL; ?>task/detail/<?php echo $task -> task_id ?>"><button class="delete2" >Detail</button> </a>
                <br>
           
        <?php }
          } ?>
      </ul>
</fieldset>
  
</body></html>