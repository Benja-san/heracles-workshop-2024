<?php

// First Labour : Heracles vs Nemean Lion
// use your Figher class here
require_once("src/Fighter.php");

$heracles = new Fighter(strength: 20, name:"Heracles", dexterity: 6);
$nemeeLion = new Fighter("Lion de Némée", 25, 2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo $heracles->getName() ?> has <?php echo $heracles->getLife() ?> hp</p>
    <p><?php echo $nemeeLion->getName() ?> has <?php echo $nemeeLion->getLife() ?> hp</p>

    <div>
        <?php 
            $round = 1;
            do {
        ?>
            <h2><?php echo $round ?></h2>
            <p><?php echo $heracles->getName() . " attacks " . $nemeeLion->getName() ?></p>
            <?php 
                $heracles->fight($nemeeLion);
                echo $nemeeLion->getName() ." has ". $nemeeLion->getLife() . " remaining life";
                if($heracles->isAlive() && !$nemeeLion->isAlive()){
                    echo $nemeeLion->getName() . " has lost, " . $heracles->getName() . " won ! ";
                    exit;
                }
                echo $nemeeLion->getName() . " attacks " . $heracles->getName();
                $nemeeLion->fight($heracles);
                echo $heracles->getName() ." has ". $heracles->getLife() . " remaining life";
                if(!$heracles->isAlive() && $nemeeLion->isAlive()){
                    echo $heracles->getName() . " has lost, " . $nemeeLion->getName() . " won ! ";
                    exit;
                }
            ?>
        <?php 
            $round++;
            }while($heracles->isAlive() && $nemeeLion->isAlive())
        ?>
    </div>
</body>
</html>