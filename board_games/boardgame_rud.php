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
            $res = $mysqli->query("SELECT * FROM board_games");
            echo "<table width=\"100%\">";
            echo "<tr> <th>Game ID</th> <th>Title</th> <th>Position</th> <th>Notes</th></tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                for ($column = 0; $column < count($row); $column++) {
                    echo "<td>" . $row[$column] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table> <hr>";

            echo "<h4>Delete a board game</h4>
            <form action='.\boardgame_delete.php' method='post' id='delete'> 
            <select name='todelete'>";
            $players = $mysqli->query("SELECT GameID FROM board_games");
            while($rows = mysqli_fetch_array($players)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[0] . "</option>"; 
            }
            echo "</select>"; 
            echo "<input type='submit' value='Delete'/>";
            echo "</form>";
        ?>

        <h4>Sort table</h4>
        <form action="boardgame_sort.php" method='post'>
        <select name="sortOn">
            <option value="gameID" selected="selected">Game ID</option>
            <option value="Boardgame">Title</option>
        </select>
        <select name="sortIn">
            <option value="asc" selected="selected">Ascending order</option>
            <option value="desc">Descending order</option>
        </select>
        <input type="submit" value='Sort'>
        </form>


        <h4>Update a board game's details</h4>
        <form action="\boardgame_update.php" method='post'>
            <label for="gameid">Game ID:</label>
            <input name="gameid" type="number" style="width: 4em" pattern="[0-9]{1,}">
            <label for="name">Title:</label>
            <input name="name" size="12" type="text" pattern="[A-Za-z0-9-: ]{1,100}">
            <label for="position">Position:</label>
            <input name="position" size="12" type="text" pattern="[A-Za-z0-9 ]{1,50}">
            <br>
            <label for="notes">Notes:</label>
            <input name="notes" size="12" type="text" style="width: 45%"pattern="[A-Za-z0-9.-:() ]{1,254}">
            <input type="submit" value="Update">
        </form>
    </main>
    <footer>
        <p>Board games aficionados</p>
        <p>1970-2015</p>
    </footer>
</body>

</html>
