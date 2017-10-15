<?php
        $sortOn = $_POST['sortOn'];
        $sortIn = $_POST['sortIn'];
        echo "<h1>Sorting by " . $sortOn . " " . $sortIn . "</h1>";
        
        $mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
        
    $res = $mysqli->query("SELECT * FROM board_game_owners ORDER BY $sortOn $sortIn");
    echo "<table>";
    echo "<tr> <th>Game ID</th> <th>Title</th> <th>Position</th> <th>Notes</th>";
    while ($row = mysqli_fetch_array($res)) {
        echo "<tr>";
        for ($column = 0; $column < count($row); $column++) {
            echo "<td>" . $row[$column] . "</td>";
        }
        echo "</tr>";
    }
            echo "</table>";
        
        
    ?>