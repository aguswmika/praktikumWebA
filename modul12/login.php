<?php 
    include_once 'includes/functions.php';
    include_once 'includes/connect.php';
    include_once 'models/User.php';

    if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST'){
        $user = new User($db);

        $user->login();
    }
?>
<?php include 'header.php'; ?>
<div class="container container-login">
    <h3 class="text-center" style="margin-bottom: 20px">Login</h3>
    <?php 
        if ( $_SESSION['error'] ) {
            print $_SESSION['error'];
            unset($_SESSION['error']);
        }   
    ?>
    <form method="POST" action="<?php echo base_url() ?>">
        <div class="form-group">
            <input type="text" name="username" placeholder="Username" class="form-input">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-input">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block">Submit</button>
        </div>
    </form>
</div>
<?php include 'footer.php'; ?>