DROP TABLE IF EXISTS sample.users;

CREATE TABLE sample.users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name CHAR(255) NOT NULL,
  password CHAR(255) NOT NULL
);

INSERT INTO sample.users(name, password)
  VALUES ('user1', '$2y$10$hTt6tYPaNt1BZkaRqioVouMsMNa5whcogWgRkNteKlvXwa8fr1MIC');


DROP TABLE IF EXISTS sample.fruits;

CREATE TABLE sample.fruits (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name CHAR(255) NOT NULL,
  color CHAR(255) NOT NULL
);

INSERT INTO sample.fruits(name, color)
  VALUES('りんご', 'red');

INSERT INTO sample.fruits(name, color)
  VALUES('腐ったぶどう', 'black');

INSERT INTO sample.fruits(name, color)
  VALUES('腐ったキウイ', 'black');

INSERT INTO sample.fruits(name, color)
  VALUES('オレンジ', 'orange');

UPDATE sample.fruits
  SET name = '青オレンジ', color = 'blue'
  WHERE name = 'オレンジ';

DELETE FROM sample.fruits
  WHERE name like '腐った%';