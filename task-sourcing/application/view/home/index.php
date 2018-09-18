<div class="container">
    <h1>Home</h1>
    <h2><?php if (Mini\Libs\Helper::logged_in()) {echo $_SESSION['login_user'] -> name;} else {echo "not logged in.";};  ?></h2>
    <h2>You are in the View: application/view/home/index.php (everything in the box comes from this file)</h2>
    <p>In a real application this could be the homepage.</p>
</div>
