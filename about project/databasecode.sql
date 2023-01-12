-- Create table for the users

CREATE TABLE users (
  usersId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  usersName varchar(128) NOT NULL,
  usersEmail varchar(128) NOT NULL,  --unique if we want unique email
  usersUid varchar(128) NOT NULL,
  usersPwd varchar(128) NOT NULL
);


-- Vom avea Tabelul Teams, cu id, locul in clasamentul FIFA, in ce stagiu au ajuns la Cupa Mondiala si valoarea lotului
CREATE TABLE teams(
    idteam INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    teamname VARCHAR(40),
    place INT NOT NULL,
    stage VARCHAR(40),
    marketvalue INT NOT NULL
);

INSERT INTO teams(teamname, place, stage, marketvalue)
VALUES
('Argentina', 2, 'Champions', 710),
('France', 3, 'Finalists', 1005),
('Croatia', 7, 'Third Place', 400);

