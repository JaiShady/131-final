<?php  include('backend_Adminnavbar.php');

include 'connect.php';


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display data</title>
    <!-- bootstarp css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <table class="table mt-5 table-bordered">
<thead>
    <tr>
        
                    <th>Transaction ID</th>
                    <th>Customer ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Description</th>
                    
    </tr>
<?php




        $customer_id = $_GET['transactionsid'];
        $sql= "Select * from `transactions` where customer_id=$customer_id";
        $result=mysqli_query($con,$sql);
        
        if($result){
            
            while($row=mysqli_fetch_assoc($result)){
                
                $transaction_id=$row['transaction_id'];
                $customer_id=$row['customer_id'];
                $transaction_date=$row['transaction_date'];
                $amount=$row['amount'];
                $description=$row['description'];
                

                
                echo '<tr>
                <th scope="row">'.$transaction_id.'</th>
                <td>'.$customer_id.'</td>
                <td>'.$transaction_date.'</td>
                <td>'.$amount.'</td>
                <td>'.$description.'</td>
                
                
               
                
                
                
              </tr>';
                
        }
                
            
            
        }
       
    

?>


</tbody>
</table>
</div>
</body>
</html>
