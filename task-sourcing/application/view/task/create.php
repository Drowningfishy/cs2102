<html>
  <head>
    <title>SubmittedTask</title>
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">   
    <link rel="stylesheet" href="SubmittedTask.css" > 
  </head>
  <body>
    <div class="container">
        <label for="new-task">Submit task</label>
        <div class = "submit" align="center">
        <form action = "user/homepage" method="post">   
            
            Task Name*: <input type="text" name="taskname" placeholder = "Please enter taskname" required="required">
            <br />
            <br />
            Task Description: <textarea cols="40" rows="5" name = "description" placeholder = "Please enter task description"></textarea >
            <br />
            <br />
            Expect Point*: <input type="text" name="point" placeholder = "Please enter expect point" required="required">

            <br />
            <br />
            <input type="reset" value="reset">
            <input type="submit" value="submit">
        </form>
        </div>
      
      <h3>UNASSIGENED TASKS</h3>
      <ul id="incomplete-tasks">
        /*should have unassigned tasks list here, task1 just an example*/
        <li>
          <!--task1need to be changed by the task name-->
          <label>task1</label>
          <div class="clear"></div>
          <div class="bidderId">BidderId: bidderId1</div>
          <div class="clear"></div>
          <div class="biddingPoint">Highest bidding point: bidding_point1</div>
           <div class="clear"></div>
          <button class="delete">Discard</button>
          <button class="assign">Assign</button>
          <br>
        </li>

      </ul>
      
      <h3>ASSIGNED TASKS</h3>
      <ul id="completed-tasks">
        <li>
          <!--task2 and so on need to be changed by the task name-->
          <label>task2</label>
          <div class="clear"></div>
          <div class="successfulBiddingPoint">Successful bidding point: bidding_point1</div>
          <div class="clear"></div>
          <button class="delete2">Delete</button>
        </li>
      </ul>

    </div>

    <script type="text/javascript" src="app.js"></script>

  </body>
</html>