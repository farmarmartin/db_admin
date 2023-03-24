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
    <button onclick="'insert.php';">+</button>
    <form method="post">
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
                    echo "<td>".$row['id']."<button type='submit' value='".'id='.$row['id']."' name='edit' id='$i.edit'>E</button><button onclick="."location.href='table.php' "."value=".'id='.$row['id']."' name='del'>D</button>";
                    echo "<td>".$row['terminal']."<button type='submit' value='".'terminál='.$row['terminal']."' name='edit' id='$i.edit'>E</button></td><br>";
                    echo "<td>".$row['gate']."<button type='submit' value='".'gate='.$row['gate']."' name='edit' id='$i.edit'>E</button></td>";
                    echo "<td>".$row['letadlo']."<button type='submit' value='".'letadlo='.$row['letadlo']."' name='edit' id='$i.edit'>E</button></td>";
                    echo "</tr>";
                }


        
                if(isset($_POST['edit'])){
                    $info = explode('=', $_POST['edit']);
                    $column = $info[0];
                    $data = $info[1];

                    echo "<input type='text' placeholder='edit $column $data' required>";
                    echo "<input type='submit' name='apply'>";

                    if(isset($_POST['apply'])){
                        applyChanges($column, $data);
                    }
                }
            
                elseif(isset($_POST['del'])){
                    $info = explode("=", $_POST['del']);
                    $column = $info[0];
                    $data = $info[1];
                    header("Location: ../api/index.php/delete/let/NULL/NULL/$column='$data");
                }

                function applyChanges($column, $data){
                    header("Location: ../api/index.php/update/let/$column/$data/$column=$data");
                }
                

            
            ?>
        </table>
    </form>
</body>
</html>