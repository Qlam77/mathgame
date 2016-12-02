<?php include("include/header.php"); extract($_POST); session_start()?>
<?php 
if (!isset($_SESSION['verification'])) {
    header('Location: authentication.php');
}
?>

<?php
if (!(isset($_SESSION['correctScore']) && isset($_SESSION['totalScore']))) {
    $_SESSION['correctScore'] = 0;
    $_SESSION['totalScore'] = 0;
}
?>
<?php
$_SESSION['FI'] = rand(0, 20);
$_SESSION['LI'] = rand(0, 20);
if (isset($answer)) {
    $nNextFI = rand(0, 20);
    $nNextSigned = rand(0, 1);
    $nNextLI = rand(0, 20);
    $nNOperator = "";
    $nNAnswer = 0;
    switch ($nNextSigned) {
        case 0:
            $nNOperator = "+";
            break;
        case 1:
            $nNOperator = "-";
            break;
    
    }
}

if (!isset($answer)) {
$nNextFI = rand(0, 20);
$nNextSigned = rand(0, 1);
$nNextLI = rand(0, 20);
$nNOperator = "";
$nNAnswer = 0;
switch ($nNextSigned) {
    case 0:
        $nNOperator = "+";
        $_SESSION['answer'] = $nNextFI + $nNextLI;
        break;
    case 1:
        $nNOperator = "-";
        $_SESSION['answer'] = $nNextFI - $nNextLI;
        break;
}
$_SESSION['firstInt'] = $nNextFI;
$_SESSION['secondSign'] = $nNextSigned;
$_SESSION['thirdInt'] = $nNextLI;
$_SESSION['operator'] = $nNOperator;

/*$nextFI = $nNextFI;
$nOperator = $nNOperator;
$nextLI = $nNextLI;
$cAnswer = $nNAnswer; */
}
?>

<div class="container">
    <h1 class="gameHead visible-xs">Math Game</h1>
    <form method="post" action="logout.php" class="hidden-xs logoutLG">
        <input type="submit" value="Logout" class="btn btn-muted"/>
    </form>
    <h1 class="gameHead3 hidden-xs">Math Game</h1>
    <form method="post" action="logout.php" class="visible-xs">
        <input type="submit" value="Logout" class="btn btn-muted"/>
    </form>
    <form method="post" action="index.php" class="visible-xs">
        <div class="row">
            <div class="col-xs-1 firstNum">
                <?php echo $nNextFI ?>
            </div>
            <div class="col-xs-1 secondNum">
                <?php echo $nNOperator ?>
            </div>
            <div class="col-xs-1">
                <?php echo $nNextLI ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <input type="text" name="answer" placeholder="Enter Answer" class="smallAnswer"/>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-xs-offset-1 col-xs-11">
            <input type="submit" class="btn btn-primary" />
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-xs-12">
                <?php
                    if (isset($answer)) {
                        if (is_numeric($answer)) {
                            if ($_SESSION['answer'] == $answer) {
                                printf("<p class=\"correct\">Correct</p>");
                                $_SESSION['correctScore']++;
                                $_SESSION['totalScore']++;
                            } else {
                                printf("<p class=\"ansChecker\">" . "Incorrect: " . $_SESSION['firstInt'] . " " . $_SESSION['operator'] . " ". $_SESSION['thirdInt'] . " is " . $_SESSION['answer']. "." . "</p>");
                                $_SESSION['totalScore']++;
                            }
                        } else {
                            printf("<p class=\"ansChecker\">" . "You must enter a number for your answer." . "</p>");

                        }
                    }
                ?>            
            </div>
        </div>        
        <div class="row">
            <div class="col-xs-12">
                <p>Score: <?php echo $_SESSION['correctScore']; ?> / <?php echo $_SESSION['totalScore']?></p>
            </div>
        </div>
    </form>

    <form method="post" action="index.php" class="hidden-xs">
        <div class="row">
            <div class="col-xs-5 firstNum">
                <?php echo $nNextFI ?>
            </div>
            <div class="col-xs-2 secondNum">
                <?php echo $nNOperator ?>
            </div>
            <div class="col-xs-5">
                <?php echo $nNextLI ?>
            </div>
        </div>
        <div class="row answerBox">
            <input type="text" name="answer" placeholder="Enter Answer"/>
        </div>
        <br />
        <div class="row answerBox">
            <input type="submit" class="btn btn-primary"/>
        </div>
        <hr />
        <div class="row">
            <div class="col-xs-12 answerBox">
                <?php
                    if (isset($answer)) {
                        if (is_numeric($answer)) {
                            if ($_SESSION['answer'] == $answer) {
                                printf("<p class=\"correct\">Correct</p>");
                            } else {
                                printf("<p class=\"ansChecker\">" . "Incorrect: " . $_SESSION['firstInt'] . " " . $_SESSION['operator'] . " ". $_SESSION['thirdInt'] . " is " . $_SESSION['answer']. "." . "</p>");
                            }
                        } else {
                            printf("<p class=\"ansChecker\">" . "You must enter a number for your answer." . "</p>");

                        }
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 answerBox">
                <p>Score: <?php echo $_SESSION['correctScore']; ?> / <?php echo $_SESSION['totalScore']?></p>
            </div>
        </div>
    </form>
<?php 
    $_SESSION['firstInt'] = $nNextFI;
    $_SESSION['secondSign'] = $nNextSigned;
    $_SESSION['thirdInt'] = $nNextLI;
    $_SESSION['operator'] = $nNOperator;
    switch ($_SESSION['secondSign']) {
        case 0:
            $_SESSION['answer'] = $_SESSION['firstInt'] + $_SESSION['thirdInt'];
            break;
        case 1:
            $_SESSION['answer'] = $_SESSION['firstInt'] - $_SESSION['thirdInt'];
            break;
}?>
<?php include("include/footer.php")?>