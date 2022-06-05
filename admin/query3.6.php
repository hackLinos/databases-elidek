<?php include('partials/menu.php'); ?>


<h1>Neoi Ereunites - Erga</h1>

<?php 

    include 'constants.php';
    $conn = OpenCon();

        $query= "SELECT ID_ereunitiii as ID_ereuniti_me_ilikia_kato_apo_40, COUNT(ID_ereunitiii) as arithmos_ergon_pou_ergazetai_ereunitis
        FROM ergazetai_se_ergo
        JOIN ereunitis ON ergazetai_se_ergo.ID_ereunitiii = ereunitis.ID_ereuniti   
        JOIN ergo ON ergazetai_se_ergo.ID_ergouu = ergo.ID_ergou
        where Hlikia_ereuniti < 40   AND now() < Hmerominia_liksis_ergou 
        GROUP BY ID_ereunitiii asc
        ORDER by arithmos_ergon_pou_ergazetai_ereunitis  desc";

    $result = mysqli_query($conn, $query);
                            
        if(mysqli_num_rows($result) == 0){
        echo '<h1 style="margin-top: 5rem;">No Stelehoi found!</h1>';
        }

        else{

            echo '<div class="table-responsive">';
                echo '<table class="table">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th>ID Ereuniti</th>';
                            echo '<th>Erga</th>';
                            echo '<th></th>';
                            echo '<th></th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while($row = mysqli_fetch_row($result)){
                        echo '<tr>';
                            echo '<td>' . $row[0] . '</td>';
                            echo '<td>' . $row[1] . '</td>';
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