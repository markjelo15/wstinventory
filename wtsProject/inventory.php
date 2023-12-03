<?php
include "db_connection.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>title</title>
    <link rel="stylesheet" href="inventory.css" />
</head>

<body>
    <header>
        <h2></h2>
        <nav class="navigation">
            <a href="available.html">Available Dogs</a>
            <button class="btnlogout" id="logoutBtn">LogOut</button>
        </nav>
    </header>
    
    <div class="wrapperinventory">
        <div class="form-boxhome">
            <h2>DOG INVENTORY</h2>
            <table>
                <thead>
                    <tr>
                        <th>Dog_id</th>
                        <th>Dogname</th>
                        <th>Breed Id</th>
                        <th>DOB</th>
                        <th>wEIGHT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `inventory`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td><?php echo $row["Dog_id"] ?></td>
                        <td><?php echo $row["Dogname"] ?></td>
                        <td><?php echo $row["Dogbreed_id"] ?></td>
                        <td><?php echo $row["DateOfBirth"] ?></td>
                        <td><?php echo $row["Weight"] ?></td>
                        <td>
                          <a href="edit.php?id=<?php echo $row["Dog_id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                          <a href="delete.php?id=<?php echo $row["Dog_id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
            </table>
        </div>
        <div class="buttons-container">
            <input type="text" id="searchInput" placeholder="Search...">
            <button type="button" class="btnSearch" onclick="searchTable()">Search</button>
            <button type="submit" class="btnUpdate">Update</button>
            <button type="submit" class="btnDelete">Delete</button>
            <button type="submit" class="btnInsert">Insert</button>
        </div>
    </div>

    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0]; // Change index according to the column you want to search
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

         // Add an event listener to the logout button
         document.getElementById('logoutBtn').addEventListener('click', function() {
            // Redirect to main.html when the button is clicked
            window.location.href = 'main.html';
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
