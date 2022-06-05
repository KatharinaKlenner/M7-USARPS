DROP DATABASE IF EXISTS srps;

CREATE DATABASE IF NOT EXISTS srps
    DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE srps;


DROP TABLE IF EXISTS Runde;
CREATE TABLE IF NOT EXISTS Runde(
    PK_RUNDENR INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Spieler_A varchar(42),
    Spieler_B varchar(42),
    Move_A varchar(42),
    Move_B varchar(42),
    Zeitpunkt DATETIME,
    Winner varchar(42)
    );

GRANT SELECT, INSERT ON Runde TO 'Katharina';

INSERT INTO Runde(PK_RUNDENR, Spieler_A, Spieler_B, Move_A, Move_B, Zeitpunkt, Winner)
values(1,'Hannah','David','Scissor','Rock','2022-06-30 10:20:00','David'),
      (2,'Hannah','David','Paper','Rock','2022-06-30 10:22:00','Hannah'),
      (3,'Hannah','David','Scissor','Paper','2022-06-30 10:24:00','Hannah'),
      (4,'Hannah','David','Paper','Rock','2022-06-30 10:26:00','Hannah'),
      (5,'Hannah','David','Scissor','Rock','2022-06-30 10:28:00','David');