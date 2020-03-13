
CREATE TABLE `user`
(
 `username`           varchar(45) NOT NULL ,
 `firstName`          varchar(45) NOT NULL ,
 `lastName`           varchar(45) NOT NULL ,
 `password`           varchar(45) NOT NULL ,
 `bdate`              date NOT NULL ,
 `gender`             varchar(1) NOT NULL ,
 `profilePicturePath` varchar(255) NULL ,
 `coverPath`          varchar(255) NULL ,
 `contact`            varchar(45) NOT NULL ,
 `userdesc`               varchar(255) NULL ,
 

PRIMARY KEY (`username`)
);

CREATE TABLE `post`
(
 `postID`   varchar(45) NOT NULL ,
 `content`  varchar(255) NOT NULL ,
 `username` varchar(45) NOT NULL ,
 `timestamp` date default now(),
 `picture` varchar(255) null,

PRIMARY KEY (`postID`),
KEY `fkIdx_20` (`username`),
CONSTRAINT `FK_20` FOREIGN KEY `fkIdx_20` (`username`) REFERENCES `user` (`username`)
);



CREATE TABLE `comment`
(
 `commentID` varchar(45) NOT NULL ,
 `content`   varchar(255) NOT NULL ,
 `username`  varchar(45) NOT NULL ,
 `postID`    varchar(45) NOT NULL ,

PRIMARY KEY (`commentID`),
KEY `fkIdx_27` (`username`),
CONSTRAINT `FK_27` FOREIGN KEY `fkIdx_27` (`username`) REFERENCES `user` (`username`),
KEY `fkIdx_30` (`postID`),
CONSTRAINT `FK_30` FOREIGN KEY `fkIdx_30` (`postID`) REFERENCES `post` (`postID`)
);

INSERT INTO `user` (`username`, `firstName`, `lastName`, `password`, `bdate`, `gender`, `profilePicturePath`, `coverPath`, `contact`, `userdesc`) VALUES ('derp', 'derp', 'lastDerp', '58fd9edd83341c29f1aebba81c31e257', '2000-04-11', 'L', NULL, NULL, 'derp@gmail.com', NULL);