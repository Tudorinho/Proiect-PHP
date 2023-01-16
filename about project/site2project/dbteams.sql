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