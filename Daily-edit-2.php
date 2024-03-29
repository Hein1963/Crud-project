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
        div.card-body{
            background-color: peachpuff;
        }
        div.card-footer{
            background-color: rosybrown;
        }
    </style>
</head>
<body>
    <?php 
        $nameError = "";
        $priceError = "";
        $descError = "";
        $typeError = "";
        $created_atError = "";
        $updated_atError = "";

       if(isset($_GET['postId'])){

        $post_id_to_update = $_GET['postId'];

        $post = mysqli_query($db,"SELECT * FROM daily_expenses WHERE id=$post_id_to_update");

        if(mysqli_num_rows($post) == 1){
            foreach($post as $row){
                $postId = $row['id'];
                $postName = $row['name'];
                $postPrice = $row['price'];
                $postDescription = $row['description'];
                $postType = $row['type'];
                ##$postcreated = $row['created_at'];

                //Php Updated Date
                date_default_timezone_set('Asia/Rangoon');
                $date = date("Y-m-d");
                $time = date("H:i:s");
                $datetime = $date."T".$time;
                
            }
        }
       }
       
       //Update list
       if(isset($_POST['Daily-update-button'])){
             $id = $_POST['update_id'];
             $name = $_POST['name'];
             $price = $_POST['price'];
             $description = $_POST['description'];
             $type = $_POST['type'];
             $datetime = $_POST['updated_at'];

            //Validation for Update!
            if(empty($name)){
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

            /*if(empty($updated)){
                $updated_atError = "Please choose the Today date!";
            }*/
            
            if(!empty($name) && !empty($price) && !empty($description) && !empty($type)){
                $query = "UPDATE daily_expenses SET name='$name', description='$description', price='$price', type='$type', updated_at='$datetime' WHERE id = $post_id_to_update";
                mysqli_query($db,$query);
                header('location:index.php');
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
                                    <div class="card-title">Daily expenses Edition Form</div>
                                </div>
                                <div class="col-md-6">
                                    <a href="index.php" class="btn btn-info"> << Back </a>
                                </div>
                                
                            </div>
                        </div>
                        <form action="" method="POST">
                        <div class="card-body">
                            <label for="type" class="mb-2">Number of list Update:</label>
                            <input type="hidden" class="mb-2" name="update_id" value="<?php echo $postId; ?>">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control mb-3<?php if($nameError != ''): ?> is-invalid <?php endif ?>" value="<?php echo $postName; ?>"  placeholder="Enter name..."> 
                                <span class="text-danger"><?php echo $nameError ?></span>
                                <input type="integer" name="price" class="form-control mb-3 <?php if($priceError != ''): ?>is-invalid <?php endif ?>" value="<?php echo $postPrice; ?>" placeholder="Enter Price...">
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
                                <textarea type="text" name="description" class="form-control <?php if($descError != ''):?>is-invalid <?php endif ?>" placeholder="Description..."><?php echo $postDescription; ?></textarea>
                                <span class="text-danger"><?php echo $descError ?></span>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-warning" name="Daily-update-button" type ="submit">Update</button>
                                </div>
                                <div class="col-md-6">
                                    <input type="datetime-local" name="updated_at" class="form-control <?php if($updated_atError != ''): ?>is-invalid <?php endif ?>" style="background:AntiqueWhite" value="<?php echo $datetime;?>">
                                    <span class="text-danger"><?php echo $updated_atError ?></span>
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