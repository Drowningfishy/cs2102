<html><head>
<title>CreateTask</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">   
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/Create.css">
</head>


<body>
<div class = "background">
<div class ="background2">
<div class="submit" align="center">
<fieldset>
<legend><h2>Create Task</h2></legend> 
<form action="/task/createTask" method="post">   
    <br />
    <br />
    Task Name*: <input type="text" name="taskname" placeholder = "Please enter taskname" required="required">
    <br />
    <br />
    Task Description: 
    <br />
    <textarea cols="80" rows="10" placeholder = "Please enter task description"></textarea >
    <br />
    <br />
    Expect Point*: <input type="text" name="point" placeholder = "Please enter expect point" required="required">

    <br />
    <br />
    <input type="reset" value="reset">
    <input type="submit" value="submit">
</form>
</fieldset>


</body>
</html>