<?php 
  
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
            padding:35px;
        }
        body {
            background-color: lightgrey;
        }
        div.card-title {
            color: blue;
        }
        div.card-header{
            background-color: yellowgreen;
        }
        div.card-body {
            background-color: peachpuff;
        }
        div.card-footer{
            background-color: rosybrown;
        }
    </style>
</head>
<body>
    <?php 
        /*Date and time
        date_default_timezone_set('Asia/Rangoon');
        $now = new DateTime();
        echo $now ->format('Y-m-d |h:i:s');
        echo $now ->getTimestamp();*/






        $nameError = "";
        $priceError = "";
        $descError = "";
        $typeError = "";
        $input_name = "";
        $price = "";
        $created_atError = "";
        $description = "";
        
        //Php Current Date 
            date_default_timezone_set('Asia/Rangoon');
            $date = date("Y-m-d");
            $time = date("H:i:s");
            $datetime = $date."T".$time;    
            
        
       
        
        
        require "connect.php";
        if(isset($_POST['Daily-create-button'])){
            $input_name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $type = $_POST['type'];
            $datetime = $_POST['created_at'];
        
            
            //$created_at = $_POST['created_at'];

            /*//Php current Date;
            date_default_timezone_set('Asia/Rangoon');
            $now = new DateTime();
            $now ->format('Y-m-d |h:i:s');
            $now ->format('Y-m-d |h:i:s');*/



            if(empty($input_name)){
                $nameError = "Please input the type of Daily expense name!";
            }
            if(empty($price)){
                $priceError = "Please input the price of costing!";
            }
            if(empty($description)){
                $descError = "Please input the description!";
            }
            if(empty($type)){
                $typeError = "Please choose the type of expenses!";
            }
            /*if(empty($created_at)){
                $created_atError = "Please choose the date!";
            }*/


            if(!empty($input_name) && !empty($price) && !empty($description) && !empty($type)){
                $query = "INSERT INTO daily_expenses (name,description,price,type,created_at) VALUES('$input_name','$description','$price','$type','$datetime')";
                mysqli_query($db,$query);
                header("location:index.php");
                $_SESSION['successMsg'] = 'A list of Daily expense created successfully*';
        }
            }

    ?>
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">Daily expenses Create Form</div>
                                </div>
                                <div class="col-md-6">
                                    <a href="index.php" class="btn btn-info"> << Back </a>
                                </div>
                                
                            </div>
                        </div>
                        <form action="Daily-create.php" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control mb-3<?php if($nameError != ''): ?> is-invalid <?php endif ?>" value="<?php echo $input_name; ?>"  placeholder="Enter name..."> 
                                <span class="text-danger"><?php echo $nameError ?></span>
                                <input type="integer" name="price" class="form-control mb-3 <?php if($priceError != ''): ?>is-invalid <?php endif ?>" value="<?php echo $price; ?>" placeholder="Enter Price...">
                                <span class="text-danger"><?php echo $priceError ?></span>
                                <div class="selection mb-3">
                                <label for="type" class="mb-3">Expenses Type :</label>
                                    <select name="type" id="type">
                                        <option value="">Select A Type</option>
                                        <option value="Food expense costs">Food expense costs</option>
                                        <option value="Living expense cost">Living expense costs</option>
                                        <option value="Transportation expense cost">Transportation expense costs</option>
                                    </select>
                                    <span class="text-danger"><?php echo $typeError ?></span>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea type="text" name="description" class="form-control <?php if($descError != ''):?>is-invalid <?php endif ?>" placeholder="Description..."><?php echo $description ?></textarea>
                                <span class="text-danger"><?php echo $descError ?></span>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-success" name="Daily-create-button" type ="submit">Create</button>
                                </div>
                                <div class="col-md-3">
                                   
                                </div>
                                <div class="col-md-3">
                                    <input type="datetime-local" name="created_at" class="form-control <?php if($created_atError != ''): ?>is-invalid <?php endif ?>" style="background:AntiqueWhite;" value="<?php echo $datetime;
                                    ?>">
                                    <span class="text-danger"><?php echo $created_atError ?></span>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>