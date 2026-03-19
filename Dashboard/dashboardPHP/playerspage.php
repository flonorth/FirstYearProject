


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <button  onclick= "window.location.href='pitch.php';">Back</button>
    </header>

    <form action ="pitch.php" method="POST">
        <input type="hidden" name="slot" value="<?php echo htmlspecialchars($_GET['slot'] ?? ''); ?>">
        
        <select name="players" id="players">
        <option value="">--Please select --</option>
        <?php
        session_start();
        require_once '../../Login/db.php';
        $selectPlayer = $conn->query("SELECT ID,player_name FROM player");
        if($selectPlayer->num_rows >0){
            while($row = $selectPlayer->fetch_assoc()){
                echo '<option value="'.$row['ID'] .'">' .htmlspecialchars($row["player_name"]).'</option>';
            }
        }

        else{
            echo '<option value="">No options available</option>';
            }
        
        ?>
        </select>

        <button type="submit">Confirm </button>
    </form>
    
</body>
</html>
