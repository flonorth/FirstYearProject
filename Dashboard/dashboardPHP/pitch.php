<?php
session_start();

require_once '../../Login/db.php';



function renderPlayerButton($slot, $buttonCssClass, $sessionData, $emptyPlayer,$defaultPos = '???') {
    // 1. Get player data
    $p = $sessionData[$slot] ?? $emptyPlayer;

    $displayPos = ($p['position'] === '???') ? $defaultPos : $p['position'];

    // 2. Map position to shirt color
    $classMap = ['GK' => 'gk', 'DEF' => 'def', 'MID' => 'mid', 'FWD' => 'fwd'];
    $shirtColor = $classMap[$displayPos] ?? '';

    // 3. Generate the HTML
    echo '
    <button class="' . $buttonCssClass . '" onclick="window.location.href=\'playerspage.php?slot=' . $slot . '\';">
        <div class="price">£' . htmlspecialchars($p['price']) . 'm</div>
        <div class="shirt ' . $shirtColor . '">' . htmlspecialchars($displayPos) . '</div>
        <div>' . htmlspecialchars($p['player_name']) . '</div>
        <div class="fixture">' . htmlspecialchars($p['teamName'] ?? '---') . '</div>
    </button>';
}


if (isset($_POST['player'],$_POST['slot']) && !empty($_POST['player'])) {
    $playerID = $_POST['player'];
    $slot = $_POST['slot'];
    
    // JOIN allows us to get the 'position_name' from the other table
    $stmt = $conn->prepare("
        SELECT p.player_name, p.price, t.teamName, pos.position 
        FROM player p
        JOIN position pos ON p.position = pos.ID 
        JOIN teamTable t ON p.team_id = t.ID
        
        WHERE p.ID = ?
    ");
    
    $stmt->bind_param("i", $playerID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($playerData = $result->fetch_assoc()) {
        // Store the whole array in the session for easy access
        $_SESSION['team'][$slot] = $playerData; 
    }
}

// Fallback defaults if no player is selected yet
$emptyPlayer = [
    'player_name' => 'Select Player',
    'position'    => '???',
    'teamName'    => '---',
    'price'       => '0.0'
];

$Goalies = [
    'gk' => ['player_name'=> 'Select GK','position'=>'GK','teamName'=> '---', 'price'=> '0.0'],
    'gk2' => ['player_name'=> 'Select GK','position'=>'GK','teamName'=> '---', 'price'=> '0.0']
];
?>






<!DOCTYPE html>
<html lang="en">
<!-- I used a file from github - might be ethical considerations-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../dashboardCSS/pitchStyles.css">
</head>



<body>
    <div class="top-panel">
        <span class="panel-title">HOME</span>
    </div>
    
    <div class="container">
        <div class="field">
            <div class="left">
                <span class="halfway-line"></span>
                <span class="centre-circle"></span>
                <span class="centre-mark"></span>
                <span class="penalty-area"></span>
                <span class="penalty-mark"></span>
                <span class="penalty-arc"></span>
                <span class="goal-area"></span>
                <span class="corner-arc"></span>
                
            </div>
            <div class="right">
                <span class="halfway-line"></span>
                <span class="centre-circle"></span>
                <span class="centre-mark"></span>
                <span class="penalty-area"></span>
                <span class="penalty-mark"></span>
                <span class="penalty-arc"></span>
                <span class="goal-area"></span>
                <span class="corner-arc"></span>
                
            </div>

          <!-- Making the buttons-->
            
                    
           <?php renderPlayerButton('gk', 'goal-text', $_SESSION['team'], $emptyPlayer,'GK'); ?>
           <?php renderPlayerButton('gk2', 'goal-text2', $_SESSION['team'], $emptyPlayer,'GK'); ?>
           <?php renderPlayerButton('lb', 'leftback-text', $_SESSION['team'],$emptyPlayer); ?>
           <?php renderPlayerButton('rb', 'rightback-text', $_SESSION['team'],$emptyPlayer); ?>
           <?php renderPlayerButton('mid', 'mid-text', $_SESSION['team'],$emptyPlayer); ?>
           <?php renderPlayerButton('fwd', 'center-text', $_SESSION['team'],$emptyPlayer); ?>
           <?php renderPlayerButton('lb2', 'leftback2-text', $_SESSION['team'],$emptyPlayer); ?>
           <?php renderPlayerButton('rb2', 'rightback2-text', $_SESSION['team'],$emptyPlayer); ?>

            
                
            

            
            

          
           
               
            

                
            

         
                
           

            
            
            
          

           
            

        </div>
    </div>
</body>

</html>