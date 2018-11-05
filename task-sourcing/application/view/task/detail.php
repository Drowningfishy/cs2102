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
          <label>Task Id:<?php echo htmlspecialchars($task->task_id, ENT_QUOTES, 'UTF-8');?> <label>
                <div class="clear"></div>
                <label>Expect Point: <?php echo htmlspecialchars($task->expect_point, ENT_QUOTES, 'UTF-8');?> </label>
                <div class="clear"></div>
                <label>Task Type: <?php echo htmlspecialchars($task->task_type, ENT_QUOTES, 'UTF-8');?> </label>
                <div class="clear"></div>
                <label>Task Description: <?php echo htmlspecialchars($task->description, ENT_QUOTES, 'UTF-8');?> </label>
                <div class="clear"></div>
                <label>Task Owner: <?php echo htmlspecialchars($task->owner_email, ENT_QUOTES, 'UTF-8');?> </label>
                <div class="clear"></div>
                <br />
                <?php if ($task && isset($_SESSION['login_user']) && ($task -> owner_email == $_SESSION['login_user'] -> email || (isset($_SESSION['login_user']) && $_SESSION['login_user'] -> is_admin))) { ?>
                  <div class="clear"></div>
                  <div class = "button">
                    <input type ="button" value = "Delete" class ="detail3">
                    <a href="<?php echo URL; ?>task/delete/<?php echo $task -> task_id; ?>"><input type = "button" value="Delete" class ="detail" style="margin-left:30%"></a>
                    <a href="<?php echo URL; ?>task/update/<?php echo $task -> task_id; ?>"><input type = "button" value="Update" class = "detail2"></a>
                  </div>
                  <div class = "clear"></div>
                <?php } ?>
          
        
      </ul>
    </div>
</fieldset>
<br />
<?php if (count($winner_email) > 0) {
  echo 'winner is:' . $winner_email[0] -> assignee_email;
} ?>
<?php if($winner_email == null){?>
<?php if ($task && isset($_SESSION['login_user']) && ($task -> owner_email != $_SESSION['login_user'] -> email && !(isset($_SESSION['login_user']) && $_SESSION['login_user'] -> is_admin))) { ?>
  
  <form action = "/bid/createBid/<?php echo $task -> task_id;?>" method="post">   
    Bidding Point*: <input type="text" name="point" placeholder = "Please enter bidding point" required="required">
    <input type="reset" value="reset">
    <input type="submit" value="submit">
</form>
<br />
<?php } ?>
<?php } ?>


<ul id="incompleted-tasks">
   <?php if($winner_email == null){?>
    <b>===Only bidders whose bidding point larger than expected point will be shown below===</b>
    <br />
<?php if (isset($bids) && $bids != null) {
    foreach($bids as $bid) { ?>
     
        
       <fieldset>
        <label> bidder email:<?php echo htmlspecialchars($bid->bidder_email, ENT_QUOTES, 'UTF-8');?> <label>
        <div class="clear"></div>
        <label> bidding point: <?php echo htmlspecialchars($bid->bidding_point, ENT_QUOTES, 'UTF-8');?> <label>
        <div class="clear"></div>
        <br />
        <?php if ($task && isset($_SESSION['login_user']) && ($task -> owner_email == $_SESSION['login_user'] -> email || (isset($_SESSION['login_user']) && $_SESSION['login_user'] -> is_admin))) { ?>
          <input type ="button" value = "Delete" class ="detail3">
          <a href="<?php echo URL; ?>bid/delete/<?php echo $bid -> task_id. '/'. $bid -> bidder_email;?>"><button class="detail" style="margin-left:30%">Delete</button></a>
          <?php if($bid->bidding_point <= (Mini\Libs\Helper::getAccountBalance($_SESSION['login_user'] -> email))){?>
          <a href="<?php echo URL; ?>bid/pick/<?php echo $bid -> task_id. '/'. $bid -> bidder_email. '/'. $bid -> bidding_point;?>"><button class="detail">Pick</button></a>
         <?php } ?> 
         <?php } ?> 
        <?php } ?>
        
        </fieldset>
        <br />
     
<?php }
  }
  ?>
</ul>
</body></html>