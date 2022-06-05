<?php include('partials/menu.php'); ?>


<h1>Erga ana Ereuniti</h1>




<?php 

    include 'constants.php';
    $conn = OpenCon();

        $query= "SELECT * FROM erga_ana_ereuniti";

    $result = mysqli_query($conn, $query);
                            
        if(mysqli_num_rows($result) == 0){
        echo '<h1 style="margin-top: 5rem;">No Erga ana ereuniti found!</h1>';
        }

        else{

            echo '<div class="table-responsive">';
                echo '<table class="table">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th>ID Ergou</th>';
                            echo '<th>ID Ereuniti</th>';
                            echo '<th>Onoma Ereuniti</th>';
                            echo '<th>Epitheto Ereuniti</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while($row = mysqli_fetch_row($result)){
                        echo '<tr>';
                            echo '<td>' . $row[0] . '</td>';
                            echo '<td>' . $row[1] . '</td>';
                            echo '<td>' . $row[2] . '</td>';
                            echo '<td>' . $row[3] . '</td>';
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