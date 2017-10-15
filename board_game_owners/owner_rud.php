<!DOCTYPE html>
<html lang="en-GB">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Member Table</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="..\style.css" rel="stylesheet" type="text/css" />
</head>
<header>
    <h1>Board games aficionados</h1>
    <nav id="follow_me">
        <ul>
            <li><a href="Events.html">Weekly Calender</a>
            </li>
            <li><a>About Us</a>
            </li>
        </ul>
    </nav>
</header>

<body>
    <main>
        <section class="form_page">
            <img id="left_semcircle" src="..\half_circle_left.gif" alt="h2_semicircle_image">
            <img id="right_semcircle" src="..\half_circle_right.gif" alt="h2_semicircle_image">
            <h2>Board Games Table</h2>
        </section>
        <?php

            $mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            $res = $mysqli->query("Select GameID, board_game_owners.MemberID, boardgame, name from board_game_owners 
            JOIN (Select Boardgame FROM board_games) AS BG 
            JOIN (Select concat(Fname,' ', Lname)  AS name, memberid FROM players) as player ON player.memberid = board_game_owners.memberid
            ");
            echo "<table width=\"100%\">";
            echo "<tr> <th>Game ID</th> <th>Member ID</th> <th>Board game</th> <th>Full Name</th></tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                for ($column = 0; $column < count($row); $column++) {
                    echo "<td>" . $row[$column] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table> <hr>";

            echo "<h4>Assign a board game to a member</h4>
            <form action='.\owner_add.php' method='post' id='add'>
            <label for='member'>Member:</label> 
            <select name='member'>";
            $players = $mysqli->query("SELECT MemberID, Fname, Lname FROM players");
            while($rows = mysqli_fetch_array($players)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[1] .' ' . $rows[2] ."</option>"; 
            }
            echo "</select>
            <label for='game'>Game:</label>";
            echo "<select name='game'>";
            $games = $mysqli->query("SELECT GameID, boardgame FROM board_games");
            while($rowws = mysqli_fetch_array($games)) { 
                echo "<option value=\"" . $rowws[0] . "\">" . $rowws[1] . "</option>"; 
            }
            echo "</select>"; 
            
            echo "<input type='submit' value='Add'/>";
            echo "</form>";

            echo "<h4>Remove board game association</h4>
            <form action='.\owner_delete.php' method='post' id='delete'>
             
            <label for='todelete'>Member:</label>
            <select name='member'>";
            $deletemember = $mysqli->query("SELECT MemberID FROM board_game_owners");
            while($rows = mysqli_fetch_array($deletemember)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[0] . "</option>"; 
            }
            echo "</select><label for='todeletegame'>Game:</label>"; 
            echo "<select name='game'>";
            $deletegame = $mysqli->query("SELECT GameID FROM board_game_owners");
            while($rows = mysqli_fetch_array($deletegame)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[0] . "</option>"; 
            }
            echo "</select>"; 
            echo "<input type='submit' value='Delete'/>";
            echo "</form>";

            
        ?>

        <h4>Sort table</h4>
        <form action="owner_sort.php" method='post'>
        <select name="sortOn">
            <option value="GameID" selected="selected">Game ID</option>
            <option value="MemberID">Member ID</option>
        </select>
        <select name="sortIn">
            <option value="asc" selected="selected">Ascending order</option>
            <option value="desc">Descending order</option>
        </select>
        <input type="submit" value='Sort'>
        </form>
    </main>
    <footer>
        <p>Board games aficionados</p>
        <p>1970-2015</p>
    </footer>
</body>

</html>
