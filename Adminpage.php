
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

        
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>ZIP</th>
                    <th>Driver License</th>
                    <th>SSN</th>
                    <th>Action</th>
    </tr>
<?php





        $sql= "Select * from `customers`";
        $result=mysqli_query($con,$sql);
        
        if($result){
            
            while($row=mysqli_fetch_assoc($result)){
                
                $customer_id=$row['customer_id'];
                $username=$row['username'];
                $password=$row['password'];
                $first=$row['first_name'];
                $last=$row['last_name'];
                $address=$row['address'];
                $city=$row['city'];
                $zip=$row['zip'];
                $DriverL=$row['DriverL'];
                $SSN=$row['SSN'];

                
                echo '<tr>
                <th scope="row">'.$customer_id.'</th>
                <td>'.$username.'</td>
                <td>'.$password.'</td>
                <td>'.$first.'</td>
                <td>'.$last.'</td>
                <td>'.$address.'</td>
                <td>'.$city.'</td>
                <td>'.$zip.'</td>
                <td>'.$DriverL.'</td>
                <td>'.$SSN.'</td>
                <td>

                <button class= "btn btn-primary"><a href="Admin_update_user.php?updateid='.$customer_id.'" class= "text-light">Update</a></button>
                <button class= "btn btn-danger"><a href="Admin_Transaction_reports.php?transactionsid='.$customer_id.'"class= "text-light">Transactions</a></button>


                </td>
                
                
                
              </tr>';
                
        }
                
            
            
        }
       
    

?>



</tbody>
</table>
</div>
</body>
</html>
