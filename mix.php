<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Magic Mixerator Mix Results</title>
</head>
<body>
    <h1>Magic Mixerator Mix Results</h1>
    <?php
$validInput = true;

$output = "";


     if (
        isset($_POST["beans"]) &&
        isset($_POST["gems"]) &&
        isset($_POST["mixaction"])
    ) {
        $numberOfBeans = $_POST["beans"];
        $numberOfGems = $_POST["gems"];
        $mixaction = $_POST["mixaction"];

        if (
            !(filter_var($numberOfBeans, FILTER_VALIDATE_INT  === false) &&
            filter_var($numberOfGems, FILTER_VALIDATE_INT === false))
        ) {
            //NOTE, DOES NOT ACCEPT 0, FIX

            $output .= "<p>You mixed together {$numberOfBeans} beans</p>";
            $output .=  "<p>and {$numberOfGems} gems</p>";
            $output .=  "<p>to make ";

            $mixActions = ["shake", "blend", "stir", "boil"];

            switch ($mixaction) {
                case "shake":
                    $amount = $numberOfGems * $numberOfBeans - 3;
                    $output .=  "${amount} bouncy potions";
                    break;
                case "blend":
                    $amount = $numberOfGems - $numberOfBeans;
                    $output .=  "${amount} heaps of healing powder";
                    break;

                case "stir":
                    $amount = $numberOfGems / $numberOfBeans;
                    $output .=  "${amount} ounces of strength soup";
                    break;
                case "boil":
                    $amount = $numberOfGems + $numberOfBeans * 1000;
                    $output .=  "${amount} puffs of monster repellent perfume";
                    break;
                default:
                $validInput = false;
                break;
            }

            $output .=  ".</p>";
        }else{$validInput = false;}
    }else{$validInput = false;}


if($validInput === true){

  echo $output;
}else{

  echo "Invalid Input";
}

// $mixActions = array("shake", "blend", "stir", "boil");
//
// // echo "<p>You mixed together {$_POST['beans']} beans</p>";
// // echo "<p>and {$_POST['gems']} gems</p>";
// // echo "<p>to make ";
// if ($_POST['mixaction'] == "shake") {
//   $amount = $_POST['gems'] * $_POST['beans'] - 3;
//   // echo "${amount} bouncy potions";
// }
// elseif ($_POST['mixaction'] == "blend") {
//   $amount = $_POST['gems'] - $_POST['beans'];
//   // echo "${amount} heaps of healing powder";
// }
// elseif ($_POST['mixaction'] == "stir") {
//   $amount = $_POST['gems'] / $_POST['beans'];
//   // echo "${amount} ounces of strength soup";
// }
// elseif ($_POST['mixaction'] == "boil") {
//   $amount = ($_POST['gems'] + $_POST['beans']) * 1000;
//   // echo "${amount} puffs of monster repellent perfume";
// }
// // echo ".</p>";
?>
   <p><a href="magicmixerator.html">Again!</a></p>
</body>
</html>
