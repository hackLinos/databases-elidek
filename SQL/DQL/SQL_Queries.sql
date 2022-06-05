-- Query 3.1
Select * 
FROM programma

Select * 
FROM ergo

SELECT ID_ereunitiii as ID_ereuniti
FROM ergazetai_se_ergo
JOIN ereunitis
  ON ergazetai_se_ergo.ID_ereunitiii = ereunitis.ID_ereuniti   
WHERE ID_ergouu = -- x (ergo pou epilegei o xrhsths)

-- (Fernei to ergo tou opoiou h hmerominia enarksis einai pio konta sto paron (auto pou jekinise pio prosfata))
SELECT *
FROM ergo
order by Hmerominia_enarksis_ergou desc

-- (Fernei to ergo tou opoiou me sortarismeno sumfona me to ID_Stelehous meioumeno (prota ta erga me D_stelehous 25 meta 24 klp))
SELECT *
FROM ergo
order by ID_stelehouss desc

--(Fernei to ergo to opoio einai  sortarismeno sumfona me thn Diarkeia_ergou meioumeni (prota ta erga me Diarkeia_ergou 4 meta 3 klp))
SELECT *
FROM ergo
order by Diarkeia_ergou desc

-- Query 3.5 (Olososto)
-- Mas deixnei poia erga einai diepistimonika kai se poia pedia anaferonanai.Episis vazo group by gt ean de valo tha emfanizei diplotimes (bgalto na deis ti ginetai)
SELECT   A.ID_epistimoniko_pediouu AS ID_epistimoniko_pediouu1,  B.ID_epistimoniko_pediouu AS ID_epistimoniko_pediouu2, count(*) as Fores_pou_emfanistikan_ta_top_zeugi
FROM epistimoniko_pedio_ergou A,epistimoniko_pedio_ergou B
WHERE A.ID_epistimoniko_pediouu <> B.ID_epistimoniko_pediouu   AND A.ID_ergouuu = B.ID_ergouuu
  Group by ID_epistimoniko_pediouu1, ID_epistimoniko_pediouu2
  limit 3; */


-- Query 3.6 (Olososto)
SELECT ID_ereunitiii as ID_ereuniti_me_ilikia_kato_apo_40, COUNT(ID_ereunitiii) as arithmos_ergon_pou_ergazetai_ereunitis
FROM ergazetai_se_ergo
JOIN ereunitis ON ergazetai_se_ergo.ID_ereunitiii = ereunitis.ID_ereuniti   
JOIN ergo ON ergazetai_se_ergo.ID_ergouu = ergo.ID_ergou
where Hlikia_ereuniti < 40   AND now() < Hmerominia_liksis_ergou 
GROUP BY ID_ereunitiii asc
ORDER by arithmos_ergon_pou_ergazetai_ereunitis  desc

-- Query 3.7 (Olososto)
SELECT ID_stelehouss, Onoma_stelehous, Poso_ergou, Onoma_organismou
FROM ergo
JOIN organismos ON ergo.ID_Organismouu = organismos.ID_Organismou
JOIN stelehos on ergo.ID_stelehouss = stelehos.ID_stelehous   
  Where Katigories_organismou = 'Etairies_Idia_Kefalaia'
 order by Poso_ergou desc
limit 5;

-- 3.8 (Vrisko tous ereunites pou douleoun se 5 erga kai pano)
SELECT ID_ereunitiii as ID_ereuniti, COUNT(ID_ereunitiii) as arithmos_ergon_pou_ergazetai_ereunitis
FROM ergazetai_se_ergo 
GROUP BY ID_ereunitiii asc
HAVING COUNT(arithmos_ergon_pou_ergazetai_ereunitis)>4
ORDER by arithmos_ergon_pou_ergazetai_ereunitis  desc;


--Vrisko id ergou pou den exei paradotea 
SELECT ID_ergouu AS ergo_xoris_paradotea
FROM ergazetai_se_ergo
LEFT JOIN paradoteo
  ON ergazetai_se_ergo.ID_ergouu = paradoteo.ID_ergou
WHERE paradoteo.ID_ergou IS NULL

-- Final query 3.8 (Olososto)
SELECT ID_ereunitiii as ID_ereuniti, Onoma_ereuniti , Epitheto_ereuniti , COUNT(ID_ereunitiii) as arithmos_ergon_xoris_paradotea_pou_ergazetai_ereunitis
 FROM ergazetai_se_ergo
 LEFT JOIN paradoteo  ON ergazetai_se_ergo.ID_ergouu = paradoteo.ID_ergou   
 JOIN ereunitis on ergazetai_se_ergo.ID_ereunitiii = ereunitis.ID_ereuniti
 WHERE paradoteo.ID_ergou IS NULL 
 GROUP BY ID_ereunitiii asc
 HAVING COUNT(arithmos_ergon_xoris_paradotea_pou_ergazetai_ereunitis)>4
 order by arithmos_ergon_xoris_paradotea_pou_ergazetai_ereunitis  desc ;

 -- Query 3.3
SELECT ID_ergouuu as ID_ergou_marine_engineering  , ID_ereunitiii
  FROM  epistimoniko_pedio_ergou 
  JOIN ergo ON epistimoniko_pedio_ergou.ID_ergouuu = ergo.ID_ergou   
  JOIN ergazetai_se_ergo on epistimoniko_pedio_ergou.ID_ergouuu = ergazetai_se_ergo.ID_ergouu
     where ID_epistimoniko_pediouu = 10  AND  now() < Hmerominia_liksis_ergou 