create database airagency;

use airagency;

create table if not exists Roles (
id int auto_increment primary key,
name varchar(50) not null,
description Text not null,
createdAt datetime default Now(),
updatedAt datetime default Now()
);

create table if not exists Users (
id int auto_increment primary key,
roleId int,
firstname varchar(50) not null,
lastname varchar(50) not null, 
email varchar(50) not null,
password varchar(200) not null,
birthday date,
gendre char,
address varchar(50),
city varchar(50),
state varchar(50),
postal varchar(50),
phoneNumber varchar(50),
img varchar(255) not null,
createdAt datetime default Now(),
updatedAt datetime default Now(),
foreign key (roleId) references Roles(id) 
on delete restrict on update restrict
);

create table if not exists Card (
id int auto_increment primary key,
userId int, 
number varchar(30) not null,
expMonth int not null,
expYear int not null,
code int,
createdAt datetime default Now(),
updatedAt datetime default Now(),
foreign key (userId) references Users(id) on delete cascade on update no action
);

create table if not exists Airplane (
id int auto_increment primary key,
name varchar(255) not null,
yearOfProd int,
seats int,
fuelCapacity int,
maxspeed int,
additionalDesc text,
img varchar(255) not null,
createdAt datetime default Now(),
updatedAt datetime default Now()
);



create table if not exists City (
    id int auto_increment primary key,
    name varchar(255) not null,
    createdAt date not null,
    updatedAt date not null
);


create table if not exists Flight (
id int auto_increment primary key,
fromCity int, 
toCity int,
planeId int,
avalible int,
price double,
isSale boolean,
checkIn datetime,
img varchar(255) not null,
createdAt datetime default Now(),
updatedAt datetime default Now(),
foreign key (fromCity) references City(id) on delete cascade on update no action,
foreign key (toCity) references City(id) on delete cascade on update no action,
foreign key (planeId) references Airplane(id) on delete cascade on update no action
);

create table if not exists Booked (
id int auto_increment primary key,
flightId int, 
userId int,
price double,
quantity int,
createdAt datetime default Now(),
updatedAt datetime default Now(),
foreign key (userId) references Users(id) on delete cascade on update no action,
foreign key (flightId) references Flight(id) on delete cascade on update no action
);

create table if not exists Finished_Flight (
id int auto_increment primary key,
fromCity int, 
toCity int,
avalible int,
price double,
isSale boolean,
createdAt datetime default Now(),
updatedAt datetime default Now(),
foreign key (fromCity) references City(id) on delete set null on update set null,
foreign key (toCity) references City(id) on delete set null on update set null
);


create table feedbacks (
id int auto_increment primary key,
userId int, 
subject varchar(255),
content text,
rating int,
createdAt datetime,
updatedAt datetime,
foreign key(userId) references users(id) on delete cascade on update no action)
