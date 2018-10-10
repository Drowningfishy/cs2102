<html><head>
<title>CreateTask</title>
</head>


<body>
<div><a href="/task/index"><button>return</button></a> </div>
<div class="submit" align="center">
<fieldset>
<legend>Create Task(Admin only)</legend> 
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