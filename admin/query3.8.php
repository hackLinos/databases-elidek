<?php include('partials/menu.php'); ?>


<h1>Ereunites - Erga xoris paradotea</h1>

<?php 

    include 'constants.php';
    $conn = OpenCon();

            $query="SELECT ID_ereunitiii as ID_ereuniti, Onoma_ereuniti , Epitheto_ereuniti , COUNT(ID_ereunitiii) as arithmos_ergon_xoris_paradotea_pou_ergazetai_ereunitis
            FROM ergazetai_se_ergo
            LEFT JOIN paradoteo  ON ergazetai_se_ergo.ID_ergouu = paradoteo.ID_ergou   
            JOIN ereunitis on ergazetai_se_ergo.ID_ereunitiii = ereunitis.ID_ereuniti
            WHERE paradoteo.ID_ergou IS NULL 
            GROUP BY ID_ereunitiii asc
            HAVING COUNT(arithmos_ergon_xoris_paradotea_pou_ergazetai_ereunitis)>4
            order by arithmos_ergon_xoris_paradotea_pou_ergazetai_ereunitis  desc ";

    $result = mysqli_query($conn, $query);
                            
    if(mysqli_num_rows($result) == 0){
    echo '<h1 style="margin-top: 5rem;">No Stelehoi found!</h1>';
    }

    else{

        echo '<div class="table-responsive">';
            echo '<table class="table">';
                echo '<thead>';
                    echo '<tr>';
                        echo '<th>ID</th>';
                        echo '<th>Onoma</th>';
                        echo '<th>Epitheto</th>';
                        echo '<th>Arithmos ergwn</th>';
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