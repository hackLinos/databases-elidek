<?php include('partials/menu.php'); ?>



<div class="container">
    <div class="row" id="row">
        <div class="col-md-12">
            <form class="form-horizontal" name="student-form" method="POST">
                <div class="form-group col-sm-3 mb-3">
                    <label class = "form-label">Onoma</label>
                    <input class = "form-control", placeholder="Enter onoma", name="name">
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label class = "form-label">Dieuthinsi</label>
                    <input class = "form-control", placeholder="Enter dieuthinsi", name="dieuthinsi">
                </div>
                <button class = "btn btn-primary btn-submit-custom" type="submit" name="submit_creds">Submit</button>
                <button class = "btn btn-primary btn-submit-custom" formaction="manage_admin.php">Back</button>
            </form>
        </div>
        <div class="form-group col-sm-3 mb-3">



        <?php
                        include 'constants.php';
                        $conn = OpenCon();

                        if(isset($_POST['submit_creds'])){
                            $name = $_POST['name'];
                            $dieuthinsi = $_POST['dieuthinsi'];

                            $query = "INSERT INTO programma (Onoma_programma,Dieuthinsi_programma)
                                VALUES ('$name', '$dieuthinsi')";

                            if (mysqli_query($conn, $query)) {
                                echo "New record created successfully";
                                header("Location: ./manage-admin.php");
                                exit();
                            }
                            else{
                                echo "Error while creating record: <br>" . mysqli_error($conn) . "<br>";
                            }
                            }
                            

?>









<?php include('partials/footer.php')?>

