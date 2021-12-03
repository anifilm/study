-- SELF JOIN (자체 조인)

SELECT c.name AS child, p.name AS parent
FROM sm_table AS p JOIN sm_table AS c
ON c.affiliation=p.id;
