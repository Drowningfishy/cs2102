<html><head>
<title>CreateTask</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">   
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/CreateTask.css">
</head>


<body>
<div><a href="/task/index"><button>return</button></a> </div>
<div class="submit" align="center">
<fieldset>
<legend>Create Task</legend> 
<form action="/task/createTask" method="post">   
    <br>
    <br>
    Task Name*: <input type="text" name="taskname" placeholder="Please enter taskname" required="required">
    <br>
    <br>
    Task Description: <textarea name = "taskDes"cols="40" rows="5" placeholder="Please enter task description"></textarea>
    <br>
    <br>
    Lowest Required Point*: <input type="text" name="point" placeholder="Please enter point" required="required">
    <br>
    <br>
    <input type="reset" value="reset">
    <input type="submit" value="submit">
</form>
</fieldset>
</div>

</body></html>