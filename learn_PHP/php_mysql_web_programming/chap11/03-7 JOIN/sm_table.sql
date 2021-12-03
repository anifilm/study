CREATE TABLE sm_table (
  id INT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  affiliation INT NOT NULL
);

INSERT INTO sm_table VALUES
  (3, 'SM', 3),
  (6, '솔로', 3),
  (8, '그룹', 3),
  (9, '보아', 6),
  (2, '소녀시대', 8),
  (4, '슈퍼주니어', 8),
  (11, 'EXO', 8);
