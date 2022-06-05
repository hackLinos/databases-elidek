<?php include('partials/menu.php'); ?>



<h1>Math</h1>

<?php 

    include 'constants.php';
    $conn = OpenCon();

            $query="SELECT ID_ergouuu as ID_ergou_Math  , ID_ereunitiii as ID_ereuniti
            FROM  epistimoniko_pedio_ergou 
            JOIN ergo ON epistimoniko_pedio_ergou.ID_ergouuu = ergo.ID_ergou   
            JOIN ergazetai_se_ergo on epistimoniko_pedio_ergou.ID_ergouuu = ergazetai_se_ergo.ID_ergouu
               where ID_epistimoniko_pediouu = 6  AND  now() < Hmerominia_liksis_ergou";

    $result = mysqli_query($conn, $query);
                            
    if(mysqli_num_rows($result) == 0){
    echo '<h1 style="margin-top: 5rem;">No page found!</h1>';
    }

    else{

        echo '<div class="table-responsive">';
            echo '<table class="table">';
                echo '<thead>';
                    echo '<tr>';
                        echo '<th>ID ergou Math</th>';
                        echo '<th>ID Ereuniti</th>';
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