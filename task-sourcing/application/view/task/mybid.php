<html><head>
    <title>ReadTask</title>

   <link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">   
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/mybidded.css">
  </head>
  <body>
     <div class = "background">
      <div class = "background2">
      <h1  align ="center">My Bidded Tasks</h1>
      <ul id="incompleted-tasks">
      <?php 
        if (isset($bided_tasks)) {
          foreach($bided_tasks as $task) { 		?>
                <fieldset>
                <legend><label><h4>Task Name: <?php echo htmlspecialchars($task->task_name, ENT_QUOTES, 'UTF-8');?></h4></legend>
                <div class="clear"></div>
                <br />
                <label>Task Description: <?php echo htmlspecialchars($task->description, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <br />
                <label>Task Type: <?php echo htmlspecialchars($task->task_type, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <br /> 
                <label>Your Bidding Point: <?php echo htmlspecialchars($task->my_bid, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <br />
                <a href="<?php echo URL; ?>task/detail/<?php echo $task -> task_id ?>"><button class="detail">Details</button></a>
                <br />
              </fieldset>
              <br />
        <?php }
          } ?>
      </ul>
</body></html>