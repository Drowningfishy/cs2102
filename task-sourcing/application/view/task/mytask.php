<html><head>
    <title>ReadTask</title>

        <link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">   
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/mytask.css">


  </head>
  </head>
  <body>
    <div class = "background">
    <div class = "background2">
      
      <h2 align="center">My Created Tasks</h2>
      <br />
      <a class="home" id="home" href="<?php echo URL; ?>task/new" style = "text-decoration:none; color:#000000; text-align:center"><h3>Go to Create Task!</h3></a>
      <ul id="incompleted-tasks">
      <?php 
        if (isset($my_tasks)) {
          foreach($my_tasks as $task) { 		?>
              <fieldset>
                <legend>
                <label> <h3>Task name: <?php echo htmlspecialchars($task->task_name, ENT_QUOTES, 'UTF-8');?> </h3></label>   </legend>
                <div class="clear"></div>
                <br />
                <label> Task Description: <?php echo htmlspecialchars($task->description, ENT_QUOTES, 'UTF-8');?> </label>
                <div class="clear"></div>
                <br />
                <label> Expect point: <?php echo htmlspecialchars($task->expect_point, ENT_QUOTES, 'UTF-8');?> </label>
                <div class="clear"></div>
                <br />
                <label> Task type: <?php echo htmlspecialchars($task->task_type, ENT_QUOTES, 'UTF-8');?> </label>
                <br />
                <a href="<?php echo URL; ?>task/detail/<?php echo $task -> task_id ?>"><button class="detail">Detail</button></a>
                <br>
                </fieldset>
                <br />
        <?php }
          } ?>
      </ul>

     <br />
     <br />
   
      <h2 align="center">My Assigned Tasks</h2>
      <br />
      <a class="home" id="home" href="<?php echo URL; ?>task/index" style = "text-decoration:none; color:#000000; text-align:center"><h3>Go to Bid Task!</h3></a>
      <ul id="incompleted-tasks">
      <?php 
        if (isset($assign_tasks)) {
          foreach($assign_tasks as $task) { 		?>
                <fieldset>
                  <legend>
                 <label><h3> Task name: <?php echo htmlspecialchars($task->task_name, ENT_QUOTES, 'UTF-8');?></h3> </label>
                <div class="clear"></div>
               </legend>
               <br />
                <label> Task Description: <?php echo htmlspecialchars($task->description, ENT_QUOTES, 'UTF-8');?> </label>
                <div class="clear"></div>
                <label> Owner point: <?php echo htmlspecialchars($task->owner_email, ENT_QUOTES, 'UTF-8');?> </label>
                <div class="clear"></div>
                <br />
                <a href="<?php echo URL; ?>task/detail/<?php echo $task -> task_id ?>"><button class="detail" >Detail</button> </a>
                <br>
                </fieldset>
        <?php }
          } ?>
      </ul>
</fieldset>
  
</body></html>