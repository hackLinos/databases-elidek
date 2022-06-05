<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Erga</h1>
    <br><br></br>
                    <!-- bottom to add admnin -->
                   <!-- <a href="#" class="btn-primary">Add organismos</a> -->
                </br><br></br>


                    <?php
                        include 'constants.php';
                        $conn = OpenCon();

                        $query = "SELECT * FROM ergo";
                        $result = mysqli_query($conn, $query);
                        
                        if(mysqli_num_rows($result) == 0){
                            echo '<h1 style="margin-top: 5rem;">No Organismoi found!</h1>';
                        }
                        else{

                            echo '<div class="table-responsive">';
                                echo '<table class="table">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th>ID_ergou</th>';
                                            echo '<th>Titlos</th>';
                                            echo '<th>Perilipsi</th>';
                                            echo '<th>Poso</th>';
                                            echo '<th>hmerom_liksis</th>';
                                            echo '<th>ID_ereuniti</th>';
                                            echo '<th>ID_aksiologisi</th>';
                                            echo '<th>ID_programma</th>';
                                            echo '<th>ID_Organismou</th>';
                                            echo '<th></th>';
                                            echo '<th></th>';
                                            echo '<th></th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    while($row = mysqli_fetch_row($result)){
                                        echo '<tr>';
                                            echo '<td>' . $row[0] . '</td>';
                                            echo '<td>' . $row[1] . '</td>';
                                            echo '<td>' . $row[2] . '</td>';
                                            echo '<td>' . $row[3] . '</td>';
                                            echo '<td>' . $row[5] . '</td>';
                                            echo '<td>' . $row[8] . '</td>';
                                            echo '<td>' . $row[9] . '</td>';
                                            echo '<td>' . $row[10] . '</td>';
                                            echo '<td>' . $row[11] . '</td>';
                                            
                                            echo '<td>';

                                    
                                                echo '<a type="button" href="./update_student.php?id=' . $row[0]. '">';
                                                    echo '<i class="fa fa-edit"></i>';
                                                echo '</a>';
                                            echo '</td>';
                                            echo '<td>';
                                                echo '<a type="button" href="./delete_student.php?id=' . $row[0]. '">';
                                                    echo '<i class = "fa fa-trash"></i>';
                                                echo '</a>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                echo '</table>';
                            echo '</div>';
                        }
                        ?>

                <div class="katergou">
                    <tr>
                    <td> <strong>1.</strong></td>
                         <td>
                            <a href="query3.1_erga_stelehos.php" class="btn-secondary">Erga-Stelehos</a>
                         </td>
                    </tr>
                    

                    <tr>
                    <td> <strong>2.</strong></td>
                         <td>
                            <a href="query3.1_erga_hmer.php" class="btn-secondary">Erga-hmerominia enarksis</a>
                         </td>
                    </tr>

                    <tr>
                         <td> <strong>3.</strong></td>
                         <td>
                            <a href="query3.1_erga_diarkeia.php" class="btn-secondary">Erga-Diarkeia</a>
                         </td>
                    </tr>
                </div>

                </table>

    </div>


    <div class="col-md-12">
            <form class="form-horizontal" name="student-form" method="POST">
                <div class="form-group col-sm-3 mb-3">
                    <label  class = "form-label"><strong>ID_ergou</strong></label>
                    <input class = "form-control", placeholder="Enter ID ergou", name="ID_ergou">
                </div>
                <button  class = "btn btn-primary btn-submit-custom" type="submit" name="submit_creds">Submit</button>
                <button class = "btn btn-primary btn-submit-custom" formaction="index.php">Back</button>
            </form>
    </div>
                        
    <?php
                        include 'constants.php';
                        $conn = OpenCon();

                        if(isset($_POST['submit_creds'])){
                            $name = $_POST['ID_ergou'];

                            $query = "SELECT ID_ereunitiii as ID_ereuniti FROM ergazetai_se_ergo
                            JOIN ereunitis
                            ON ergazetai_se_ergo.ID_ereunitiii = ereunitis.ID_ereuniti   
                            WHERE ID_ergouu = '" . $name . "';";
                            echo $query;

                        if (mysqli_query($conn, $query)) {
                            echo "New record created successfully";
                            header("Location: test.php");
                            exit();
                        }
                        else{
                            echo "Error while creating record: <br>" . mysqli_error($conn) . "<br>";
                        }
                        }
                        

?>
                    

                
                
</div>





<?php include('partials/footer.php'); ?>