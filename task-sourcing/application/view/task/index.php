<html><head>
  <title>ReadTask</title>

  <link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">   
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/index.css">
</head>
<body>
  <div class = "background"> 
    <div class = "background2">

      <div align="center"><h1>TASK LIST</h1></div>
      <ul id="incompleted-tasks">
        <form action="/task/index" method="post">   
          Select task type*:
          <select name = "taskType">
            <option value="All Tasks"> All tasks </option>
            <option value="Chores">Chores</option>
            <option value="Heavy Lifting">Heavy Lifting</option>
            <option value="Moving & Packing">Moving & Packing</option>
            <option value="Home improvement">Home improvement</option>
            <option value="Delivery">Delivery</option>
            <option value="Mounting & Installation">Mounting & Installation</option>
            <option value="Others">Others</option>
          </select>
          <input type="reset" value="reset">
          <input type="submit" value="submit">
        </form>

        <?php
        if(isset($type)&&isset($number)){ ?>
          <div><?php echo $type;?> number: <?php echo $number;?>.</div>
        <?php }?>

        <?php 
        if (isset($tasks)) {
          foreach($tasks as $task) { 		?>
            <div class = "tasks">

              <fieldset>
                <legend>
                  <label><h3>Task Name: <?php echo htmlspecialchars($task->task_name, ENT_QUOTES, 'UTF-8');?> </h3></label></legend>
                  <div class="clear"></div>
                  <br />
                  <label>Status: <?php if ((Mini\Controller\TaskController::winner($task->task_id))==null) {echo 'unallocated';} else{echo 'allocated';}?> </label>
                  <div class="clear"></div>
                  <label>Expect Point: <?php echo htmlspecialchars($task->expect_point, ENT_QUOTES, 'UTF-8');?> </label>
                  <div class="clear"></div>
                  <label>Task Type: <?php echo htmlspecialchars($task->task_type, ENT_QUOTES, 'UTF-8');?> </label>
                  <div class="clear"></div>
                  <label>Task Description: <?php echo htmlspecialchars($task->description, ENT_QUOTES, 'UTF-8');?> </label>
                  <div class="clear"></div>
                  <br />
                  <a href="<?php echo URL; ?>task/detail/<?php echo $task -> task_id ?>"> <button class = "detail">View Detail</button></a>
                  <br />
                </fieldset>
                <br />

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
  </div>
</div>


</body></html>