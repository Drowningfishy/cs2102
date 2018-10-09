<html>

<head>
<title>Submit Task</title>
</head>


<body>
<div><a href = "homepage.php"><button>return</button></a> </div>
<div class = "submit" align="center">
<fieldset>
<legend>Submit Task</legend> 
<form action = "user/homepage" method="post">   
    Your Email*: <input type="text" name="email" placeholder = "Please enter email" required="required" />
    <br />
    <br />
    Task Name*: <input type="text" name="taskname" placeholder = "Please enter taskname" required="required">
    <br />
    <br />
    Task Description: <textarea cols="40" rows="5" placeholder = "Please enter task description"></textarea >
    <br />
    <br />
    Expect Point*: <input type="text" name="point" placeholder = "Please enter expect point" required="required">

    <br />
    <br />
    <input type="reset" value="reset">
    <input type="submit" value="submit">
</form>
</fieldset>
</div>





</body>
</html>
