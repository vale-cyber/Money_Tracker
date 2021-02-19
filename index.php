<?php
require_once 'includes/header.php'
?>
<div class="main-container">
    <!-- Data Input -->
    <button id="add-btn">Add</button>
    <div class="data-input-container">
        <!-- Form --> 
        <div class="form-wraper">
            <form action="includes/form_input.php" method="POST">
                <h1>Add Transaction</h1>
                <div class="data-input-amount">
                    <label for="amount">Amount</label><br>
                    <input type="text" name="amount">
                    <select id="category" name="category">
                        <?php
                            require 'includes/category_dropdown.php'
                        ?>
                    </select>
                </div>
                <div class="comments">
                    <label for="comments">Comments</label><br>
                    <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Insert any comments about the transaction"></textarea>
                </div>
                <div class="date">
                    <input type="date" name="date">
                </div>
                <button type="submit" name="submit">Submit</button>
            </form>            
        </div>
        <div class="add-bill-category">
            <label for="form">Add a Bill or Category</label>
            <form action="add-bill-category.php">
                <label for="bill">Add a Bill</label>
                <input type="text" name="bill">
            </form>
        </div>
        <?php 
            require_once 'includes/hide_form.php'
        ?>
    </div>
    <!-- Data Output -->
    <div class="data-output-container">
        <h1>Data Output</h1>
        <select name="month" id="month">
                <option value="1">Jan</option>
                <option value="2">Feb</option>
                <option value="3">Mar</option>
                <option value="4">Apr</option>
                <option value="5">May</option>
                <option value="6">Jun</option>
                <option value="7">Jul</option>
                <option value="8">Aug</option>
                <option value="9">Sep</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
            </select>
        <div class="interactive-data">
            <div id="progress-graph">
                <?php
                    require_once 'includes/month_selector.php'
                ?>
            </div>
            <div id="data-info">
                <h3 id="month-total"></h3>
                <h3 id="spending-total"></h3>
                <h3 id="savings-total"></h3>
            </div>

        </div>
    </div>
</div>
<?php
require_once 'includes/data_output.php'
?>

<?php
require_once 'includes/footer.php'
?>