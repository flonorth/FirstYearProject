<?php
session_start();
require_once '../../Login/db.php';
$team_id = $_GET['team'] ?? '';
$pos_id = $_GET['position'] ?? '';
$women = $_GET['women'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../dashboardCSS/playersStyles.css">
</head>
<body>
    <header>
        <button  onclick= "window.location.href='pitch.php';">Back</button>
    </header>

    <div class= "container">
       <div class="filterBox">
            <h3>Filter Players</h3>
            
            <!-- Filter Form (Uses GET so it reloads the list) -->
            <form method="GET" action="playerspage.php">
                <!-- IMPORTANT: Keep the slot ID so we don't lose it on refresh -->
                <input type="hidden" name="slot" value="<?php echo htmlspecialchars($_GET['slot'] ?? ''); ?>">

                <select class="boxDeco" name="team">
                    <option value="">All Teams</option>
                    <?php
                        $teamResult = $conn->query("SELECT ID, teamName FROM teamtable");
                        while($team = $teamResult->fetch_assoc()) {
                            $selected = ($team_id == $team['ID']) ? 'selected' : '';
                            echo "<option value='{$team['ID']}' $selected>{$team['teamName']}</option>";
                            
                        }
                    ?>
                    
                </select>

                <select class="boxDeco" name="position">
                    <option value="">All Positions</option>
                    <option value="1"<?php if($pos_id == '1') echo 'selected'; ?>>Goalkeeper</option>
                    <option value="2"<?php if($pos_id == '2') echo 'selected'; ?>>Defender</option>
                    <option value="3"<?php if($pos_id == '3') echo 'selected'; ?>>Midfielder</option>
                    <option value="4"<?php if($pos_id == '4') echo 'selected'; ?>>Forward</option>
                </select>

                

                <button type="submit" class="filterBtn">Apply Filters</button>
                <button type="button" class="filterBtn" style="background-color: #666;" 
                    onclick="window.location.href='playerspage.php?slot=<?php echo urlencode($_GET['slot'] ?? ''); ?>'">
                    Reset
                </button>
            </form>
        </div>

    <!-- BOTTOM CONTAINER: VIEWING/CONFIRMING -->
        <div class="playersBox">
            <form action="pitch.php" method="POST">
                <input type="hidden" name="slot" value="<?php echo htmlspecialchars($_GET['slot'] ?? ''); ?>">
                
                <h3>Select Player</h3>
                    <table class="playerTable">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Team</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // 1. Updated Query to get Team Name and Price
                                $query = "SELECT p.ID, p.player_name, p.price, t.teamName 
                                        FROM player p
                                        JOIN teamtable t ON p.team_id = t.ID
                                        WHERE 1=1";
                                
                                $params = [];
                                $types = "";

                                if (!empty($team_id)) {
                                    $query .= " AND p.team_id = ?";
                                    $params[] = $team_id; $types .= "i";
                                }
                                if (!empty($pos_id)) {
                                    $query .= " AND p.position = ?";
                                    $params[] = $pos_id; $types .= "i";
                                }

                                $stmt = $conn->prepare($query);
                                if (!empty($params)) { $stmt->bind_param($types, ...$params); }
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>" . htmlspecialchars($row['player_name']) . "</td>
                                                <td>" . htmlspecialchars($row['teamName']) . "</td>
                                                <td>£" . htmlspecialchars($row['price']) . "m</td>
                                                <td>
                                                    <button type='submit' name='player' value='{$row['ID']}' class='selectBtn'>
                                                        Select
                                                    </button>
                                                </td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No players found</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                
            </form>
        </div>

    </div>
    

   
    
</body>
</html>
