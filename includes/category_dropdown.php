<?php
    $resultSet = $mysqli->query("Select category From `transaction`");
    while ($rows = $resultSet->fetch_assoc()){
        $category_name = $rows['category'];
        echo "<option value='$category_name'>$category_name</option>";
    }
?>