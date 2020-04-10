<form method="GET">

    <input type=text name=input>


    <input type=submit name=submit value="submit">

</form>



<?php
    $con=mysqli_connect("localhost","newuser","password","interface");


    if (mysqli_connect_errno())
        echo "Failed to connect to the database: " . mysqli_connect_error();


    if (isset($_GET["submit"])) {
        $firstname = $_GET["input"];
        $active = 1;
        $sql = "SELECT * FROM users WHERE firstname LIKE ? AND active LIKE ?";
        $stmt = $con->prepare($sql); 
        $stmt->bind_param("si", $firstname, $active);
        $stmt->execute();
        $result = $stmt->get_result();

        echo "<table border='2' cellspacing='10'>
            <tr>
               <th>First Name</th>
               <th>Last Name</th>
            </tr>";



        while($row = $result->fetch_assoc())
        {
            echo "<tr>";
            echo "<td>" . $row['firstname'] . "</td>";
            echo "<td>" . $row['lastname'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
}



mysqli_close($con);

?>