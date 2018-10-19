<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Search For Task</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="refresh" content="180">
		 <link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">   
		<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/SearchForTask.css">
	</head>
     <div class = "background">
	<body>
        <div  align="center">
		<from action="/task/searchTask">
			<br>
			<br>
			<br>
			<fieldset>
				<legend><h2 > Search For Task</h2></legend>

				<form class="example" action="/task/searchTask" method="post">
  				<input type="text" placeholder="Type in the  key words..." name="search">
 				<button type="submit"><i class="fa fa-search">Search</i></button>
				</form>
			</fieldset>
		</from>
</div>
		<br>
		<div class="searchResult" >Search Result</div>
		<?php 
			if (isset($tasks)) {
				foreach($tasks as $task) { 		?>
			<li>
			<label> Task Name: <?php echo htmlspecialchars($task->task_name, ENT_QUOTES, 'UTF-8');?> </label>
			<div class="clear"></div>
			<button class="detail"> <a href="<?php echo URL; ?>task/detail/<?php echo $task -> task_id ?>">View detail</a></button>
			
					</li>
			<?php }
				} ?>
			<!--
		 <li>
          task1need to be changed by the task name
          <label>task1</label>
          <button class="detail" a href="#">View Detail</button>
        </li>
				-->
			
		</div>
	</body>
</html>
