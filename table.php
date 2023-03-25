<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>profile</title>
</head>
<body>
    <form method="post">
    <input type="submit" name='insertbtn' value="insert+"></input>
        <table>
            <tr>
                <td>let</td>
                <td>terminál</td>
                <td>gate</td>
                <td>letadlo</td>
            </tr>
            <?php
                require('dbh.php');
                require('getSql.php');

                $sql = new Dotaz('select', 'let', '*');
                $result = $db->query($sql->getRequest());
                $i = 0;

                while ($row = mysqli_fetch_assoc($result)){
                    $i++;
                    echo "<tr id='$i'>";           
                    echo "<td>".$row['id']."<button type='submit' value='".$row['id'].'=id='.$row['id']."' name='edit' id='$i.edit'>E</button><button value=".'id='.$row['id']."' name='del'>D</button>";
                    echo "<td>".$row['terminal']."<button type='submit' value='".$row['id'].'=terminal='.$row['terminal']."' name='edit' id='$i.edit'>E</button></td><br>";
                    echo "<td>".$row['gate']."<button type='submit' value='".$row['id'].'=gate='.$row['gate']."' name='edit' id='$i.edit'>E</button></td>";
                    echo "<td>".$row['letadlo']."<button type='submit' value='".$row['id'].'=letadlo='.$row['letadlo']."' name='edit' id='$i.edit'>E</button></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </form>

    <?php
        if(isset($_POST['edit'])){
            $info = explode('=', $_POST['edit']);
            $id = $info[0];
            $column = $info[1];
            $data = $info[2];

            echo "<form action='applyChange.php' method='post'>";
            echo "<input type='hidden' name='post_data' value='$id=$column=$data'>";
            echo "<input type='text' name='new_value' placeholder='edit $column $data' required>";
            echo "<input type='submit' name='apply'>";
            echo "</form>";
        }
        if(isset($_POST['insertbtn'])){
            echo "<form action='applyChange.php' method='post'>";
            echo "<input type='text' name='id' placeholder='id'required>";
            echo "<input type='text' name='terminal' placeholder='terminal'required>";
            echo "<input type='text' name='gate' placeholder='gate'required>";
            echo "<input type='text' name='letadlo' placeholder='letadlo'required>";
            echo "<input type='submit' name='vlozit' value='přidat'>";
            echo "</form>";
        }
        if(isset($_POST['del'])){
            $id = $_POST['del'];
            echo "<form action='applyChange.php' method='post'>";
            echo "<input type='hidden' name='post_data' value='$id'>";
            echo "<input type='submit' name='yes-delete' value='Opravdu smazat?'>";
            echo "<input type='submit' name='no-delete' value='Nesmazat!'>";
            echo "</form>";
        }
    ?>
</body>
</html>