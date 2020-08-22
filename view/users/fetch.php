<?php

$q = $_GET["query"];

$con = mysqli_connect('localhost', 'root', '', 'helloWorld1');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, 'users');

$sql = "SELECT * FROM users WHERE name LIKE '%" . $q . "%'";
$result = mysqli_query($con, $sql);

echo "<table id=\"txtHint\" class=\"table table-bordered\">
    <tr>
         <tr>
                    <th>
                        <span class=\"custom-checkbox\">
                            <input type=\"checkbox\" id=\"selectAll\">
                            <label for=\"selectAll\"></label>
                        </span>
                    </th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Birthday</th>
                    <th>Avatar</th>
                    <th>Role_id</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>

    </tr>

</tr>";
while ($row = mysqli_fetch_array($result)) {
    echo "<td>
              <span class=\"custom-checkbox\">
                  <input type=\"checkbox\" id=\"checkbox1\" name=\"options[]\" value=\"1\">
                    <label for=\"checkbox1\"></label>
               </span>
          </td>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['birthday'] . "</td>";
    echo "<td>" . $row['avatar'] . "</td>";


    if ($row['role_id'] == 0) {
        echo "<td>" . "Admin" . "</td>";;
    } else {
        echo "<td>" . "User " . "</td>";
    }

    echo "<td>" . $row['created'] . "</td>";
    echo "<td>" . $row['updated'] . "</td>";
    echo "<td>
           <a href=\"#editEmployeeModal\" class=\"edit\" data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></a>
           <a href=\"#deleteEmployeeModal\" class=\"delete\" data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a>
         </td>";

    echo "</tr>";
}
echo "</table>";


