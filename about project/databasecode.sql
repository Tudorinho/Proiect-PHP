-- Create table for the users

CREATE TABLE users (
  usersId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  usersName varchar(128) NOT NULL,
  usersEmail varchar(128) NOT NULL,  --unique if we want unique email
  usersUid varchar(128) NOT NULL,
  usersPwd varchar(128) NOT NULL
);



--Create table for football teams

