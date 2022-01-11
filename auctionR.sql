create table Login (Username varchar(20) primary key,   
                    Pass varchar(35) not null,   
                    Email varchar(50) unique not null);

create table Person (Username varchar(20) primary key,  
                    FirstName varchar(15) not null,  
                    LastName varchar(15)  not null, 
                    foreign key(Username) references Login(Username));   
           
create table FranchiseData (FranchiseID varchar(10) primary key,  
                    FName varchar(20) not null,  
                    Username varchar(20) unique not null,  
                    Credit int,
                    foreign key(Username) references Login(Username));


create table Sports (SportsID varchar(5) primary key, 
                    SName varchar(15) not null, 
                    PlayerLimit int not null);

create table Event (EventID varchar(10) primary key,  
                    EName varchar(20) not null,  
                    MaxForiegnPlayers int not null, 
                    MaxHomePlayers int not null, 
                    EGender varchar(11) not null, 
                    ENationality varchar(20) not null, 
                    SportsID varchar(5) not null, 
                    EventStart date not null,
                    EventEnd date not null,
                    foreign key(SportsID) references Sports(SportsID));

create table FranchiseEvent (FranchiseID varchar(10),  
                             EventID varchar(10),  
                             primary key(FranchiseID, EventID), 
                             foreign key(FranchiseID) references FranchiseData(FranchiseID), 
                             foreign key(EventID) references Event(EventID));

create table Admin (AdminID int,  
                    Username varchar(10) unique not null,  
                    primary key(AdminID), 
                    foreign key(Username) references Person(Username));

create table AdminPhone (AdminID int,  
                    Aphone bigint unique not null,  
                    primary key(AdminID, Aphone), 
                    foreign key(AdminID) references Admin(AdminID));

create table Manager (ManagerID varchar(5), 
                      Username varchar(20) unique not null,  
                      SportsID varchar(5) not null, 
                      primary key(ManagerID), 
                      foreign key(Username) references Person(Username), 
                      foreign key(SportsID) references Sports(SportsID));
                      
create table ManagerPhone (ManagerID varchar(5), 
                            MPhone bigint unique not null, 
                            primary key(ManagerID,MPhone), 
                            foreign key(ManagerID) references Manager(ManagerID));
                            
create table PlayerData (PlayerID varchar(5)primary key,  
                         Username varchar(20) unique not null,  
                         SportsID varchar(5) not null,  
                         FranchiseID varchar(10),  
                         PGender varchar(6) not null,  
                         PNationality varchar(20) not null,  
                         Price bigint not null,  
                         DOB date not null,
                         verified varchar(3),  
                         foreign key(Username) references Person(Username));

create table Player_Phone (PlayerID varchar(5), 
                           PPhone bigint, 
                           primary key(PlayerID,PPhone), 
                           foreign key(PlayerID) references PlayerData(PlayerID));
                           
create table PlayerEvent (PlayerID varchar(5), 
                          EventID varchar(10), 
                          primary key(PlayerID,EventID), 
                          foreign key(PlayerID) references PlayerData(PlayerID), 
                          foreign key(EventID) references Event(EventID));
                          
create table Parameter (ParameterID varchar(5) primary key, 
                        SportsID varchar(5) not null, 
                        PName varchar(10) not null, 
                        foreign key(SportsID) references Sports(SportsID));
                        
create table ParameterPlayer(ParameterID varchar(5), 
                            PlayerID varchar(5), 
                            Value varchar(10) not null, 
                            primary key(ParameterID, PlayerID), 
                            foreign key(ParameterID) references Parameter(ParameterID), 
                            foreign key(PlayerID) references PlayerData(PlayerID));

insert into login values('msd7', 'dhoni7', 'contact@dhoni.com');
insert into login values('vk18', 'anushkasharma', 'contact@one8.com');
insert into login values('godofcricket', 'sachin', 'sachintendulkar@mi.com');
insert into login values('klrahul', 'abcde123', 'contact@klrahul.net');
insert into login values('kingJames', 'mjisntthegoat', 'Lebronjames@uninterupted.com');
insert into login values('sc30', 'greencantshoot', 'stephcurry@ua.com');
insert into login values('kd35', 'thedurantula', 'easyring@nets.com');
insert into login values('kobebryant', 'mambamentality', 'contact@kobebryant.com');
insert into login values('illuminati2', 'earthisflat', 'kyrie@nets.com');
insert into login values('kawhi', 'antisocial', 'contact.agent@kawhi.com');
insert into login values('pg13', 'cantwinaring', 'paulgeorge@laclippers.com');
insert into login values('westbrook0', 'bricks4life', 'contact@whynot.com');
insert into login values('ad3', 'bigbrow', 'contact.agent@anthonydavis.com');
insert into login values('alexcaruso', 'notthegoat', 'contact@caruso.com');
insert into login values('jimmybutler', 'dontcaredintask', 'contact@butler.com');
insert into login values('derozan', 'toronto:(', 'contact@derozan.com');

insert into Person values('msd7','Cummins','Cross'); 
insert into Person values('vk18','Sharma','Niekerk'); 
insert into Person values('godofcricket','Livingstone','Zampa'); 
insert into Person values('klrahul','Dussen','Niekerk');
insert into Person values('kingJames','Southee','Perry'); 
insert into Person values('sc30','Shafali','Azam');
insert into Person values('kd35','Hasan','Hasan'); 
insert into Person values('kobebryant','Lee','Verma'); 
insert into Person values('illuminati2','Azam','Niekerk'); 
insert into Person values('pg13','Cummins','Babar');
insert into Person values('westbrook0','Markram','showks'); 
insert into Person values('ad3','Livingstone','Beaumont'); 
insert into Person values('alexcaruso','Rashid','Cummins'); 
insert into Person values('jimmybutler','Livingstone','Niekerk');
insert into Person values('derozan','Satterthwaite','Beaumont');

insert into login values('harden', 'freethrows', 'contact@jh13.com');
insert into login values('mj23', '6greaterthan4', 'contact@airjordan.com');
insert into login values('lukadoncic', 'lukamagic', 'contact@ld77.com');
insert into login values('traeyoung', 'iceinmyveins', 'contact@traeyoung.com');
insert into login values('juliusrandle', 'traeyoungisbald', 'contact@randle.com');
insert into login values('shaq', 'eatuforbreakfast', 'contact@shaquilleoneal.com');
insert into login values('klay', 'injuriesforlife', 'contact@kaly.com');
insert into login values('dgreen', 'stillnotafoul', 'contact@dramond.com');
insert into login values('giannis', 'milwaukee', 'contact@antetokoumpo.com');
insert into login values('cp3', 'howlebrondoit', 'contact@cp3.com');

insert into FranchiseData values('FR101', 'HardenOwls', 'harden',10);
insert into FranchiseData values('FR102', 'MadJack23', 'mj23',30);
insert into FranchiseData values('FR103', 'LukadonCIC', 'lukadoncic',45);
insert into FranchiseData values('FR104', 'TraeYoungWin', 'traeyoung',70); 
insert into FranchiseData values('FR105', 'JuliUsRandle', 'juliusrandle',25); 
insert into FranchiseData values('FR106', 'ShipAqua', 'shaq',12);
insert into FranchiseData values('FR107', 'KingLayered', 'klay',34); 
insert into FranchiseData values('FR108', 'DarkGreen', 'dgreen',60);
insert into FranchiseData values('FR109', 'GiannisHope', 'giannis',59); 
insert into FranchiseData values('FR110', 'CustomParty3', 'cp3',78);

insert into Sports values('SP101','Cricket', 12);
insert into Sports values('SP102', 'Basketball',8);
insert into Sports values('SP103', 'Football',14);
insert into Sports values('SP104', 'Futsal',6);
insert into Sports values('SP105', 'Hockey',12);
insert into Sports values('SP106', 'Volleyball',14);
insert into Sports values('SP107', 'Handball', 9);
insert into Sports values('SP108', 'Polo',6);
insert into Sports values('SP109', 'Badminton',4);
insert into Sports values('SP110', 'Tennis',4);

insert into Event values('EV101', 'TNPL', 2, 12,'Male', 'India','SP101', '2022-04-03', '2022-04-21');
insert into Event values('EV102', 'IPL', 3, 12,'Male','India','SP101','2022-05-03', '2022-05-21');
insert into Event values('EV103', 'BharatIPL', 1, 12,'Female','India','SP101','2022-06-03', '2022-06-21');
insert into Event values('EV104', 'JapanBB', 1, 7,'Male','Japan','SP102','2022-07-03', '2022-07-21');
insert into Event values('EV105', 'TeleEvent', 2, 8,'Female','London','SP102','2022-08-03', '2022-08-21');
insert into Event values('EV106', 'ScoreZone', 1, 8, 'Male','Canada','SP101','2022-09-03', '2022-09-21');
insert into Event values('EV107', 'CricketMoj', 5, 12, 'Male','India','SP101','2022-10-03', '2022-10-21');
insert into Event values('EV108', 'VVC BBall', 3, 11, 'Female','London','SP102','2022-11-03', '2022-11-21');
insert into Event values('EV109', 'Nano Cricket', 1, 12, 'Male','Germany','SP101','2022-12-03', '2022-12-21');
insert into Event values('EV110', 'Global BBall', 2, 8, 'Male','India','SP102','2022-04-05', '2022-04-27');

insert into FranchiseEvent values('FR102','EV101');
insert into FranchiseEvent values('FR106','EV101');
insert into FranchiseEvent values('FR103','EV101');
insert into FranchiseEvent values('FR105','EV106');
insert into FranchiseEvent values('FR108','EV106');
insert into FranchiseEvent values('FR107','EV107');
insert into FranchiseEvent values('FR101','EV107');
insert into FranchiseEvent values('FR109','EV108');
insert into FranchiseEvent values('FR110','EV106');
insert into FranchiseEvent values('FR104','EV108');

insert into Login values('bluee', 'blueeakablue','malavikaakablue@gmail.com');
insert into Login values('Loki', 'LokiakaLogkesh','logkeshitsloki@gmail.com');
insert into Login values('showks','showksperfect','showksiscool@gmail.com');
insert into Login values('itsdev','codiztattop','philocodizt@gmial.com');
insert into Login values('vandhan','suttaan','ponaan@repeatu.com');
insert into Login values('Groot','IAmGroot','wearegroot@gardians.com');
insert into Login values('shinchan','BuriBuri','ActionCommon@yahoo.com');
insert into Login values('Bheem','Laddoo','Dolakpur@gmail.com');
insert into Login values('Spiderman','akapeter','nowayhome@avengers.com');
insert into Login values('itsChan','ShangaiNoon','Jackiechan@gmail.com');

insert into Person values('bluee', 'Malavika','Vinothkumar');
insert into Person values('Loki', 'Logkesh','M');
insert into Person values('showks','Mayur','Pranav');
insert into Person values('itsdev','Devaraja','R');
insert into Person values('vandhan','Suriya','SJ');
insert into Person values('Groot','Tree','Guy');
insert into Person values('shinchan','Shinchan','Nohara');
insert into Person values('Bheem','Chotta','Bheem');
insert into Person values('Spiderman','Peter','Parker');
insert into Person values('itsChan','Jackie','Chan');

insert into Admin values(10001,'bluee');
insert into Admin values(10002,'Loki');
insert into Admin values(10003,'showks');
insert into Admin values(10004,'itsdev');
insert into Admin values(10005,'vandhan');
insert into Admin values(10006,'Groot');
insert into Admin values(10007,'shinchan');
insert into Admin values(10008,'Bheem');
insert into Admin values(10009,'Spiderman');
insert into Admin values(10010,'itsChan');

insert into AdminPhone values(10003,9638464468);
insert into AdminPhone values(10005,1254249403);
insert into AdminPhone values(10009,2654455971);
insert into AdminPhone values(10006,7219261375);
insert into AdminPhone values(10010,1651113036);
insert into AdminPhone values(10007,1408121241);
insert into AdminPhone values(10002,8006620150);
insert into AdminPhone values(10001,1244726959);
insert into AdminPhone values(10002,9226303864);
insert into AdminPhone values(10002,0446690156);
insert into AdminPhone values(10009,9285223982);
insert into AdminPhone values(10001,1389622479);
insert into AdminPhone values(10004,1603958939);
insert into AdminPhone values(10009,1314496402);
insert into AdminPhone values(10003,2090362769);
insert into AdminPhone values(10001,7407243149);
insert into AdminPhone values(10008,9747676239);
insert into AdminPhone values(10003,5406193165);

insert into Login values('spalder23','auctionr','spalder23@gmail.com');
insert into Login values('fareekh','auctionr1','fareekh@gmail.com');
insert into Login values('ricardo','auctionr2','rex234@gmail.com');
insert into Login values('samsupremacy','auctionr3','sane2@gmail.com');
insert into Login values('chemams','auctionr4','chetans34@gmail.com');
insert into Login values('milliebbrown','auctionr5','browncookiez@gmail.com');
insert into Login values('onisan','auctionr6','animest3@gmail.com');
insert into Login values('senpai','auctionr7','jjk@gmail.com');
insert into Login values('ligma','auctionr9','braalze@gmail.com');
insert into Login values('sukuna','reportafk','leoasf@gmail.com');

insert into Person values('spalder23','Spalder','Suresh');
insert into Person values('fareekh','Fareekh','Khan');
insert into Person values('ricardo','Ricardo','Alonso');
insert into Person values('samsupremacy','Samantha','Sama');
insert into Person values('chemams','Crayon','Lord');
insert into Person values('milliebbrown','Bobby','Brown');
insert into Person values('onisan','Udhay','Kumar');
insert into Person values('senpai','Sakura','Uchiha');
insert into Person values('ligma','Tyler','Bryce');
insert into Person values('sukuna', 'Gojo', 'Satoru');

insert into manager values('B100','spalder23', 'SP102');
insert into manager values('B101','fareekh', 'SP102');
insert into manager values('B102','ricardo', 'SP102');
insert into manager values('B103','samsupremacy', 'SP102');
insert into manager values('B104','chemams', 'SP102');
insert into manager values('C100','milliebbrown', 'SP101');
insert into manager values('C101','onisan', 'SP101');
insert into manager values('C102','senpai', 'SP101');
insert into manager values('C103','sukuna', 'SP101');
insert into manager values('C104','ligma', 'SP101');

insert into managerphone values('B100',7965123578);
insert into managerphone values('B100',7995123578);
insert into managerphone values('B101',7965123586);
insert into managerphone values('B102',7526523336);
insert into managerphone values('B103',7965123537);
insert into managerphone values('B104',7965123574);
insert into managerphone values('C100',04212207877);
insert into managerphone values('C100',7965178854);
insert into managerphone values('C101',7965127815);
insert into managerphone values('C102',9856284851);
insert into managerphone values('C103',9856284545);
insert into managerphone values('C104',9857445578);

insert into parameter values('C01','SP101', 'Batting');
insert into parameter values('C02','SP101', 'Bowling');
insert into parameter values('C03','SP101', 'Fielding');
insert into parameter values('C00','SP101', 'Overall');
insert into parameter values('B01','SP102', 'Shooting');
insert into parameter values('B02','SP102', 'Defence');
insert into parameter values('B03','SP102', 'BallCtrl');
insert into parameter values('B00','SP102', 'Overall');


insert into playerdata values('CA001','msd7','SP101','','M','INDIAN','100000','1997-03-03','yes');
insert into playerdata values('CA002','vk18','SP101','','Male','INDIAN','100000','1989-12-06','yes');
insert into playerdata values('CA004','klrahul','SP101','','M','INDIAN','99000','1990-01-04','yes');
insert into playerdata values('BA002','kingJames','SP102','','M','AMERICAN','199000','1997-08-23','yes');
insert into playerdata values('BA003','sc30','SP102','','M','SERBIAN','112000','1997-03-09','yes');
insert into playerdata values('BA004','kd35','SP102','','M','BRITISH','123000','1996-02-29','yes');
insert into playerdata values('BA005','kobebryant','SP102','','M','NIGERIAN','102200','1989-07-26','yes');
insert into playerdata values('BA006','illuminati2','SP102','','M','AUSTRALIAN','120000','85-12-31','yes');
insert into playerdata values('BA007','pg13','SP102','','M','PAKISTANI','100000','1993-06-18','yes');
insert into playerdata values('BA008','westbrook0','SP102','','M','BANGLADESHI','110000','1993-07-19','yes');
insert into playerdata values('BA009','ad3','SP102','','M','AMERICAN','100000','1990-03-20','yes');
insert into playerdata values('BA010','alexcaruso','SP102','','M','MEXICAN','123000','1992-04-21','no');
insert into playerdata values('BA011','jimmybutler','SP102','','M','AMERICAN','113500','2001-06-23','yes');
insert into playerdata values('BA012','derozan','SP102','','M','AMERICAN','123400','1999-01-03','no');

insert into player_phone values('CA004',4696620124);
insert into player_phone values('CA001',6587759980);
insert into player_phone values('CA002',1825867648 );
insert into player_phone values('CA002',6322496717);
insert into player_phone values('BA002',7096707528);
insert into player_phone values('BA003', 0244782241);
insert into player_phone values('BA004', 0479213039);
insert into player_phone values('BA005', 6696014400);
insert into player_phone values('BA006', 5545455006);
insert into player_phone values('BA007', 3387912205);
insert into player_phone values('BA007', 8159700524);
insert into player_phone values('BA008', 6417849976);
insert into player_phone values('BA009', 3481577137);
insert into player_phone values('BA010', 5038999147);
insert into player_phone values('BA010', 3403095458);
insert into player_phone values('BA010', 1557501512);
insert into player_phone values('BA011', 3599300585);
insert into player_phone values('BA012', 4643431497);

insert into playerevent values('CA001','EV101');
insert into playerevent values('CA002','EV101');
insert into playerevent values('CA004','EV102');
insert into playerevent values('BA012','EV103');
insert into playerevent values('BA002','EV106');
insert into playerevent values('BA003','EV108');
insert into playerevent values('BA004','EV110');
insert into playerevent values('BA005','EV110');
insert into playerevent values('BA006','EV107');
insert into playerevent values('BA007','EV101');
insert into playerevent values('BA008','EV110');
insert into playerevent values('BA009','EV110');
insert into playerevent values('BA010','EV107');

insert into parameterplayer values('C00','CA004','94');
insert into parameterplayer values('C01','CA004','80');
insert into parameterplayer values('C02','CA004','97');
insert into parameterplayer values('C03','CA004','91');

insert into parameterplayer values('C00','CA001','89');
insert into parameterplayer values('C01','CA001','77');
insert into parameterplayer values('C02','CA001','88');
insert into parameterplayer values('C03','CA001','91');

insert into parameterplayer values('C00','CA002','87');
insert into parameterplayer values('C01','CA002','88');
insert into parameterplayer values('C02','CA002','97');
insert into parameterplayer values('C03','CA002','71');

insert into parameterplayer values('B00','BA003','77');
insert into parameterplayer values('B01','BA003','65');
insert into parameterplayer values('B02','BA003','88');
insert into parameterplayer values('B03','BA003','77');

insert into parameterplayer values('B00','BA004','71');
insert into parameterplayer values('B01','BA004','66');
insert into parameterplayer values('B02','BA004','68');
insert into parameterplayer values('B03','BA004','74');

insert into parameterplayer values('B00','BA002','99');
insert into parameterplayer values('B01','BA002','99');
insert into parameterplayer values('B02','BA002','98');
insert into parameterplayer values('B03','BA002','97');

insert into parameterplayer values('B00','BA005','91');
insert into parameterplayer values('B01','BA005','89');
insert into parameterplayer values('B02','BA005','95');
insert into parameterplayer values('B03','BA005','87');


insert into parameterplayer values('B00','BA006','87');
insert into parameterplayer values('B01','BA006','88');
insert into parameterplayer values('B02','BA006','95');
insert into parameterplayer values('B03','BA006','81');

insert into parameterplayer values('B00','BA007','87');
insert into parameterplayer values('B01','BA007','88');
insert into parameterplayer values('B02','BA007','88');
insert into parameterplayer values('B03','BA007','89');

insert into parameterplayer values('B00','BA008','98');
insert into parameterplayer values('B01','BA008','100');
insert into parameterplayer values('B02','BA008','93');
insert into parameterplayer values('B03','BA008','98');

insert into parameterplayer values('B00','BA009','76');
insert into parameterplayer values('B01','BA009','61');
insert into parameterplayer values('B02','BA009','76');
insert into parameterplayer values('B03','BA009','81');

insert into parameterplayer values('B00','BA010','66');
insert into parameterplayer values('B01','BA010','54');
insert into parameterplayer values('B02','BA010','71');
insert into parameterplayer values('B03','BA010','69');

insert into parameterplayer values('B00','BA011','69');
insert into parameterplayer values('B01','BA011','42');
insert into parameterplayer values('B02','BA011','71');
insert into parameterplayer values('B03','BA011','73');

insert into parameterplayer values('B00','BA012','94');
insert into parameterplayer values('B01','BA012','88');
insert into parameterplayer values('B02','BA012','91');
insert into parameterplayer values('B03','BA012','98');
