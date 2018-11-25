/*JV table*/
DROP TABLE IF EXISTS `JV`;
CREATE TABLE `JV`   (
                        `idJv`          int NOT NULL AUTO_INCREMENT,
                        `title`         varchar(50) NOT NULL,
                        `editor`        varchar(25) NOT NULL,
                        `developer`     varchar(50) NOT NULL,
                        `platform`      varchar(15) NOT NULL,
                        `catchphrase`   varchar(300) NOT NULL,
                        `synopsis`      text NOT NULL,
                        `illustration`  varchar(10) NOT NULL,
                        `released`      date NOT NULL,
                        `rating`        int NOT NULL,
                        `price`         decimal(4,2),
                        PRIMARY KEY (`idJv`)
                    );
                    
/*USER table*/
DROP TABLE IF EXISTS `USER`;
CREATE TABLE `USER` (
                        `idUser`    int NOT NULL AUTO_INCREMENT,
                        `civility`  varchar(5),
                        `pseudo`    varchar(25),
                        `name`      varchar(25),
                        `fname`     varchar(25),
                        `birthday`  date,
                        `email`     varchar(30) NOT NULL,
                        `password`  varchar(15) NOT NULL,
                        PRIMARY KEY (`idUser`)
                    );
                    
/*GENRE table*/
DROP TABLE IF EXISTS `GENRE`;
CREATE TABLE `GENRE`(
                        `idGenre`   int NOT NULL AUTO_INCREMENT,
                        `name`      varchar(15) NOT NULL,
                        PRIMARY KEY (`idGenre`)
                    );
                    
/*JV_GENRE table*/
DROP TABLE IF EXISTS `JV_GENRE`;
CREATE TABLE `JV_GENRE` (
                            `idJv`      int NOT NULL,
                            `idGenre`   int NOT NULL,
                            FOREIGN KEY (`idJv`) REFERENCES JV (`idJv`),
                            FOREIGN KEY (`idGenre`) REFERENCES GENRE (`idGenre`),
                            PRIMARY KEY (`idJv`, `idGenre`)
                        );

/*CART table*/
DROP TABLE IF EXISTS `CART`;
CREATE TABLE `CART` (
                        `idCart`    int NOT NULL AUTO_INCREMENT,
                        `idUser`    int NOT NULL,
                        FOREIGN KEY (`idUser`) REFERENCES USER (`idUser`),
                        PRIMARY KEY (`idCart`)
                    );
                    
/*JV_CART table*/
DROP TABLE IF EXISTS `JV_CART`;
CREATE TABLE `JV_CART`  (
                            `idJv`      int NOT NULL,
                            `idCart`    int NOT NULL,
                            `quantity`  int NOT NULL,
                            FOREIGN KEY (`idJv`) REFERENCES JV (`idJv`),
                            FOREIGN KEY (`idCart`) REFERENCES CART (`idCart`),
                            PRIMARY KEY (`idJv`, `idCart`)
                        );
                    
/*PURCHASE table*/
DROP TABLE IF EXISTS `PURCHASE`;
CREATE TABLE `PURCHASE` (
                            `idPurchase`    int NOT NULL AUTO_INCREMENT,
                            `idUser`        int NOT NULL,
                            `purchased`     date NOT NULL,
                            FOREIGN KEY (`idUser`) REFERENCES USER (`idUser`),
                            PRIMARY KEY (`idPurchase`)
                        );
                        
/*JV_PURCHASE table*/
DROP TABLE IF EXISTS `JV_PURCHASE`;
CREATE TABLE `JV_PURCHASE`  (
                                `idJv`          int NOT NULL,
                                `idPurchase`    int NOT NULL,
                                FOREIGN KEY (`idJv`) REFERENCES JV (`idJv`),
                                FOREIGN KEY (`idPurchase`) REFERENCES PURCHASE (`idPurchase`),
                                PRIMARY KEY (`idJv`, `idPurchase`)
                            );