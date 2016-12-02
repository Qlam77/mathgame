<?php include("include/header.php"); session_start()?>
<?php extract($_POST);
$ePattern = '/^a@a\.a$/';
$pPattern = '/^a{3}$/';
if (isset($email) && isset($password)) {
$emailVeri = preg_match($ePattern, $email);
$passVeri = preg_match($pPattern, $password);
}
?>
<?php
    if (isset($emailVeri) && isset($passVeri)) {
        if (($emailVeri == 1) && ($passVeri == 1)) {
            $_SESSION['verification'] = true;
            $_SESSION['firstInt'] = 0;
            $_SESSION['secondSign'] = 0;
            $_SESSION['thirdInt'] = 0;
            $_SESSION['answer'] = 0; 
            $_SESSION['operator'] = "";
            header('Location: index.php');
        }
    }
?>
<?php
    if (isset($emailVeri) && isset($passVeri)) {
            if (($emailVeri == 0) && ($passVeri == 0)) {
            header('Location: authentication.php?msg=Invalid%20login%20credentials');
        }
    }
?>

<div class="container">
    <h1 class="gameHead visible-xs">Please enjoy our math game</h1>
    <h1 class="gameHead2 hidden-xs">Please enjoy our math game</h1>
    <form class="form-horizontal visible-xs" method="POST">
        <div class="mainLogin">
            <div class="form-group">
                <label class="loginLabel" for="email">Email: </label> 
            </div>
                <input type="text" name="email" class="formEntry" placeholder="Email"/>
            <br />
            <br />
            <div class="form-group">
                <label class="loginLabel" for="password">Password:</label>
            </div>
                <input type="text" name="password" class="formEntry" placeholder="Password"/>
            <br />
            <br />
            <div class="form-group">
                <input type="submit" name="submit" value="login" class="btn btn-primary loginBtn"/>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class="loginNote">
                        <?php    
                            if (isset($_GET['msg'])) {
                                echo $_GET['msg'];
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </form>
    <form class="form-horizontal hidden-xs" method="POST">
        <div class="mainLogin2">
            <div class="row">
                <div class="col-xs-3  loginLabel2">
                    <label for="email">Email: </label> 
                </div>
                <div class="col-xs-9">
                       <input type="text" name="email" class="formEntry2" placeholder="Email"/>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-xs-3  loginLabel2">
                    <label for="password">Password: </label>
                </div>
                <div class="col-xs-9">
                 <input type="text" name="password" class="formEntry2" placeholder="Password"/>
                 </div>
            </div>
            <br />
            <div class="row">
                <div class="col-xs-offset-3 col-xs-9">
                    <input type="submit" name="submit" value="Login" class="btn btn-primary loginBtn2" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-offset-3 col-xs-9">
                    <p class="loginNote">
                        <?php    
                            if (isset($_GET['msg'])) {
                                echo $_GET['msg'];
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include("include/footer.php")?>