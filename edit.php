<?php

include_once('connection.php');

$eid = $_GET['eid'];
$edit_query = "select * from info where id='{$eid}'";
$eq = mysqli_query($con, $edit_query);
$edata = mysqli_fetch_array($eq);
 ?>


 <html>
 <body>

   <form method="post">
     <input type="hidden" class="input-box" value="<?php echo $edata['id']; ?>">

     <?php

        if ($edata['cashflow'] == 'Income') { ?>
          <div class="radio-group">
             <label class="radio">
             <input type="radio" value="Income" name="cashflow" required checked>Income
             <span></span>
             </label>
             <label class="radio">
             <input type="radio" value="Expense" name="cashflow">Expense
             <span></span>
             </label>
          </div>

      <?php  } else { ?>
        <div class="radio-group">
           <label class="radio">
           <input type="radio" value="Income" name="cashflow" required>Income
           <span></span>
           </label>
           <label class="radio">
           <input type="radio" value="Expense" name="cashflow" checked>Expense
           <span></span>
           </label>
        </div>
    <?php  } ?>

      <input id="amount" type="number" step="0.01" name="amount" class="input-box" value="<?php echo $edata['amount']; ?>" required>
      <input type="text" name="description" class="input-box" placeholder="Description" value="<?php echo $edata['description']; ?>" required>
      <div class="select">
         <select name="category" id="format">
            <option value=" <?php echo $edata['category'];?> "> <?php echo $edata['category']; ?> </option>
            <option value="Housing"> Housing</option>
            <option value="Transportation"> Transportation</option>
            <option value="Food"> Food</option>
            <option value="Utilities"> Utilities</option>
            <option value="Medical/Healthcare"> Medical/Healthcare</option>
            <option value="Insurance"> Insurance</option>
            <option value="Personal"> Personal</option>
            <option value="Education"> Education</option>
            <option value="Gifts/Donations"> Gifts/Donations</option>
            <option value="Entertainment"> Entertainment</option>
         </select>
      </div>
      <input type="submit" name="submit" id="info-submit" class="btn" value="Submit" onclick="addedSuccess()">
   </form>
 </body>
 </html>



 <?php

 if ($_POST) {

   $id = $_POST['id'];
   $cashflow = $_POST['cashflow'];
   $amount = $_POST['amount'];
   $description = $_POST['description'];
   $category = $_POST['category'];


   $update_query = "UPDATE info SET cashflow='{$cashflow}', amount='{$amount}',
                   description='{$description}', category='{$category}' WHERE id = '{$_GET['eid']}'";
   mysqli_query($con, $update_query);

   header("location:index.php");
 }
  ?>
