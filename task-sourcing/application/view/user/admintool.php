<html><head>
    <title>Admin tool</title>

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">   
  </head>
  <body>
      
      <h3>All Users</h3>
      <ul id="incompleted-tasks">
      <?php 
        if (isset($users)) {
          foreach($users as $user) { 		?>
            <li>
                <label> <?php echo htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> <?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label> <?php echo htmlspecialchars($user->bidding_point_balance, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <form action = "/user/addValue/<?php echo $user -> email;?>" method="post">   
                    Value to Add*: <input type="text" name="point" placeholder = "Please enter bidding point to give" required="required">
                    <input type="submit" value="submit">
                </form>
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