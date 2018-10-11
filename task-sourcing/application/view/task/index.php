<html><head>
    <title>ReadTask</title>

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">   
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/index.css">
  </head>
  <body>
      <div class = "background"> 
<fieldset>
<legend><h2>ALL TASKS</h2></legend> 
      <ul id="incompleted-tasks">
      <?php 
        if (isset($tasks)) {
          foreach($tasks as $task) { 		?>
          <div class = "tasks">
            <li>
                <label>Task Id: <?php echo htmlspecialchars($task->task_id, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label>Task Name: <?php echo htmlspecialchars($task->task_name, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label>Expect Point: <?php echo htmlspecialchars($task->expect_point, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label>Task Description: <?php echo htmlspecialchars($task->description, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label>Task Owner: <?php echo htmlspecialchars($task->owner_email, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
               <a href="<?php echo URL; ?>task/detail/<?php echo $task -> task_id ?>"> <button class="delete2">Detail</button></a>
            </li>

        <?php }
          } ?>
          <!--
        <li>
          task2 and so on need to be changed by the task name
          <label>task_id</label>
          <div class="clear"></div>
          <label>task_name</label>
          <div class="clear"></div>
          <label>expect_point</label>
          <div class="clear"></div>
          <label>description</label>
          <div class="clear"></div>
          <label>email</label>
          <div class="clear"></div>
          <button class="delete2">Delete</button>
          <button class="delete3" href="#">Update</button>
        </li>
        -->
      </ul>

  
</body></html>