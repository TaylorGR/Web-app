<!DOCTYPE html>
<html lang="en-GB">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Member Table</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
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
            <img  id="left_semcircle" src="..\half_circle_left.gif" alt="h2_semicircle_image">
            <img  id="right_semcircle" src="..\half_circle_right.gif" alt="h2_semicircle_image">
            <h2 >Member Form</h2>
        </section>
        <?php

            $mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            $res = $mysqli->query("SELECT * FROM players");
            echo "<table width=\"100%\">";
            echo "<tr> <th>Member ID</th> <th>First Name</th> <th>Last Name</th> <th>Email</th>
            <th>Phone No.</th> </tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                for ($column = 0; $column < count($row); $column++) {
                    echo "<td>" . $row[$column] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table> <hr>";

            echo "<h4>Delete a member</h4>
            <form action='.\player_delete.php' method='post' id='delete'> 
            <select name='todelete'>";
            $players = $mysqli->query("SELECT MemberID FROM players");
            while($rows = mysqli_fetch_array($players)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[0] . "</option>"; 
            }
            echo "</select>"; 
            echo "<input type='submit' value='Delete'/>";
            echo "</form>";
            
        ?>

        <h4>Sort table</h4>
        <form action=".\player_sort.php" method='post'>
        <select name="sortOn">
            <option value="memberid" selected="selected">Member ID</option>
            <option value="fname">First name</option>
            <option value="lname">Last name</option>
        </select>
        <select name="sortIn">
            <option value="asc" selected="selected">Ascending order</option>
            <option value="desc">Descending order</option>
        </select>
        <input type="submit" value='Sort'>
        </form>


        <h4>Update member's details</h4>
        <form action=".\player_update.php" method='post'>
            <label for="memberid">Member ID:</label>
            <input name="memberid" type="number" style="width: 4em" pattern="[0-9]{1,}">
            <label for="fname">First Name:</label>
            <input name="fname" size="12" type="text" pattern="[A-Z a-z]{1,}">
            <label for="lname">Last Name:</label>
            <input name="lname" size="12" type="text" pattern="[A-Z a-z]{1,}">
            <label for="email">Email:</label>
            <input name="email" size="12" type="email" pattern="[A-Z a-z 0-9]{1,}@{1}[A-Z a-z 0-9]{1,}[.]{1}.{1,}">
            <br>
            <label for="phone">Phone:</label>
            <input name="phone" size="12" type="phone" pattern="[0-9]{7,}">
            <input type="submit" value="Update">
        </form>
    </main>
    <footer>
        <p>Board games aficionados</p>
        <p>1970-2015</p>
    </footer>
</body>

</html>
