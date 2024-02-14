<?php
    require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Expenses list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
        body {
            padding: 35px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title"> Daily Expenses list </div>
                            </div>
                            <div class="col-md-6">
                                <a href="index.php"> << Return to Current </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Id</td>
                                        <td>Name</td>
                                        <td>Description</td>
                                        <td>Price</td>
                                        <td>Type</td>
                                        <td>Create-Date & Time</td>
                                        <td>Updated-Date & Time</td>
                                        <td>Action of informations</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                         ##date_default_timezone_set('Asia/Rangoon');
                                         ##$previous_month = date('M', strtotime('-1 month'));
                                         if(isset($_POST['lastmonth-btn'])){
                                            
                                         
                                        
                                         /*$query = "SELECT * FROM daily_expenses";
                                         $query_run = mysqli_query($db,$query);
                                        
                                         foreach($query_run as $post){*/
                                         
                                         
                                        
                                

                                    ?>

                                        <tr>
                                            <td><?php ##echo $post['id']; ?> </td>
                                            <td><?php ##echo $post['name']; ?></td>
                                            <td><?php ##echo $post['description']; ?></td>
                                            <td><?php ##echo $post['price']; ?></td>
                                            <td><?php ##echo $post['type']; ?></td>
                                            <td><?php ##echo $post['created_at']; ?></td>
                                            <td><?php ##echo $post['updated_at']; ?></td>
                                            <td>
                                                <a href="">Edit</a> |
                                                <a href="">Delete</a>
                                            </td>
                                        </tr>

                                    <?php
                                         ##}
                                         }
                                    ?>
                                </tbody>
                    </table>
                    </div>
                    <div class="card-footer">
                        sdalfjdf
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>