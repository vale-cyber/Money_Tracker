<?php
    require_once 'db.php';

    if(!isset($_POST['month'])){
        $month = date('m');
    }else{
        $month = $_POST['month'];
    }

    $sql = "SELECT * FROM `transaction` WHERE month(date) = '".$month."'";
    $result = $mysqli->query($sql);
    $dateObj = DateTime::createFromFormat('!m', number_format($month));
    $monthName = $dateObj->format('F');
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0){
        $total = 0;
        while($row = mysqli_fetch_assoc($result)){
            $total = $total + $row['amount'];
        }
    }else{
        echo 'No results fetched';
    }
?>

<h2>
    <?php
        echo 'Total for '.$monthName.": $".$total;
    ?>
</h2>