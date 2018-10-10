<html><head>
    <title>ReadTask</title>

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">   
    <link rel="stylesheet" href="SubmitTask.css"> 
  </head>
  <body>
      
      <ul id="incompleted-tasks">
        <li>
          <!--task2 and so on need to be changed by the task name-->
          <label> <?php echo htmlspecialchars($task->task_id, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> <?php echo htmlspecialchars($task->task_name, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> <?php echo htmlspecialchars($task->expect_point, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> <?php echo htmlspecialchars($task->description, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> <?php echo htmlspecialchars($task->owner_email, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <button class="delete2" href="<?php echo URL; ?>task/delete/<?php echo $task -> task_id ?>">Delete</button>
                <button class="delete3" href="<?php echo URL; ?>task/update/<?php echo $task -> task_id ?>">Update</button>
        </li>
      </ul>

  
</body></html>