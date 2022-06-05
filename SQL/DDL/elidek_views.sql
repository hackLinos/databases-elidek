CREATE VIEW erga_ana_ereuniti as 
SELECT  ID_ergouu as ID_ergou,ID_ereunitiii as ID_ereuniti,Onoma_ereuniti,Epitheto_ereuniti
FROM ergazetai_se_ergo
JOIN ereunitis
  ON ergazetai_se_ergo.ID_ereunitiii = ereunitis.ID_ereuniti   
ORDER BY ID_ereuniti

CREATE VIEW organismoi_ana_ereuniti as 
SELECT  organismos.ID_Organismou ,ID_ereuniti 
FROM organismos
JOIN ereunitis
  ON organismos.ID_Organismou = ereunitis.ID_Organismou 