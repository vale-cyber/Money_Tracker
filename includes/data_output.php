<?php
    require_once 'db.php';

    if(!isset($_POST['month'])){
        $month = date('m');
    }else{
        $month = $_POST['month'];
    }

    // Query
    $select_amount_category = "SELECT amount, category FROM `transaction` WHERE month(`date`) = '".$month."'";
    $select_spending = "SELECT SUM(amount) as spending_total FROM `transaction` WHERE category != 'savings' and month(`date`) = '".$month."'";
    $select_savings = "SELECT amount as savings FROM `transaction` WHERE category = 'savings' and month(`date`) = '".$month."'";
    $select_total = "SELECT SUM(amount) as total FROM `transaction` Where month(`date`) = '".$month."'";

    //Execute Query
    $result_exec = $mysqli->query($select_amount_category);
    $total_exec = $mysqli->query($select_total);
    $spending_exec = $mysqli->query($select_spending);
    $savings_exec = $mysqli->query($select_savings);
    
    //Get month name
    $dateObj = DateTime::createFromFormat('!m', number_format($month));
    $monthName = $dateObj->format('F');

    // for piechart
    $dataArray = array();
    $total = 0; // for month total
    while ($row = $result_exec->fetch_assoc()){
        $category = $row['category'];
        $amount = $row['amount'];
        $total = $toal + $row['amount']; // for month total
        array_push($dataArray, $category, $amount);
    }

    //data info variables
    $total = $total_exec->fetch_assoc();
    $spending = $spending_exec->fetch_assoc();
    $savings = $savings_exec->fetch_assoc();
?>


<script>
    //ouput data info
    $("#month-total").text(function(){
        return "Total amount: "+ <?php echo json_encode("$".number_format($total['total'], 2));?>;
    })

    $("#spending-total").text(function(){
        return "Spending total: "+ <?php echo json_encode("$".number_format($spending['spending_total'], 2));?>;
    })

    $("#savings-total").text(function(){
        return "Savings total: "+ <?php echo json_encode("$".number_format($savings['savings'], 2));?>;
    })


    //sort data for pie chart
    var dataArray = <?php echo json_encode($dataArray);?>;
    dataDic = [];
    for (i = 0; i < dataArray.length; i+=2){
        dataDic.push( {
            x: dataArray[i],
            value: dataArray[i+1]
        });
    }
    // create and upload piechart
    anychart.onDocumentReady(function () {

    var data = dataDic;

    var chart = anychart.pie();

    chart.title(<?php echo json_encode($monthName);?>);

    chart.data(data);

    chart.container('progress-graph');
    chart.draw();

});
</script>

