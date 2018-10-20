<html><head>
    <title>ReadTask</title>

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8"> 
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/detail.css">  
    
  </head>
  <body>
      
      <div class ="background">
        <div class ="background2">
          <div class = "task" align="center">
      <ul id="incompleted-tasks">
          
          <!--task2 and so on need to be changed by the task name-->
          <fieldset>
          <legend><label>Task Name: <?php echo htmlspecialchars($task->task_name, ENT_QUOTES, 'UTF-8');?></label></legend>
          <div class="clear"></div>
          <label>Task Id:111 <?php echo htmlspecialchars($task->task_id, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label>Expect Point: <?php echo htmlspecialchars($task->expect_point, ENT_QUOTES, 'UTF-8');?> </label>
                <div class="clear"></div>
                <label>Task Description: <?php echo htmlspecialchars($task->description, ENT_QUOTES, 'UTF-8');?> </label>
                <div class="clear"></div>
                <label>Task Owner: <?php echo htmlspecialchars($task->owner_email, ENT_QUOTES, 'UTF-8');?> </label>
                <div class="clear"></div>
                <?php if ($task && isset($_SESSION['login_user']) && ($task -> owner_email == $_SESSION['login_user'] -> email || (isset($_SESSION['login_user']) && $_SESSION['login_user'] -> is_admin))) { ?>
                  <a href="<?php echo URL; ?>task/delete/<?php echo $task -> task_id; ?>"><button>Delete</button></a>
                  <a href="<?php echo URL; ?>task/update/<?php echo $task -> task_id; ?>"><button>Update</button></a>
                <?php } ?>
          
        
      </ul>
    </div>
</fieldset>
<br />
<?php if (count($winner_email) > 0) {
  echo 'winner is:' . $winner_email[0] -> assignee_email;
} ?>
<?php if ($task && isset($_SESSION['login_user']) && ($task -> owner_email != $_SESSION['login_user'] -> email && !(isset($_SESSION['login_user']) && $_SESSION['login_user'] -> is_admin))) { ?>
  <form action = "/bid/createBid/<?php echo $task -> task_id;?>" method="post">   
    Bidding Point*: <input type="text" name="point" placeholder = "Please enter bidding point" required="required">
    <input type="reset" value="reset">
    <input type="submit" value="submit">
</form>
<br />

<?php } ?>
 
<ul id="incompleted-tasks">
<?php if (isset($bids) && $bids != null) {
    foreach($bids as $bid) { ?>
       <fieldset>
        <label> bidder email:<?php echo htmlspecialchars($bid->bidder_email, ENT_QUOTES, 'UTF-8');?> <label>
        <div class="clear"></div>
        <label> bidding point: <?php echo htmlspecialchars($bid->bidding_point, ENT_QUOTES, 'UTF-8');?> <label>
        <div class="clear"></div>
        <?php if ($task && isset($_SESSION['login_user']) && ($task -> owner_email == $_SESSION['login_user'] -> email || (isset($_SESSION['login_user']) && $_SESSION['login_user'] -> is_admin))) { ?>
          <a href="<?php echo URL; ?>bid/delete/<?php echo $bid -> task_id. '/'. $bid -> bidder_email;?>"><button class="delete2">Delete</button></a>
          <a href="<?php echo URL; ?>bid/pick/<?php echo $bid -> task_id. '/'. $bid -> bidder_email;?>"><button class="delete2">Pick</button></a>
          
        <?php } ?>
        
        </fieldset>
        <br />
     
<?php }
  }
  ?>
</ul>
</body></html>