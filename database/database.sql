show databases;

create database campus_talk;

use campus_talk;

show tables;

create table login_info(
user_id varchar(30) primary key,
user_password varchar(100) not null
);

create table user_info(
user_id varchar(30) primary key,
user_name varchar(20),
branch varchar(10),
department varchar(20),
year int,
cgpa float,
profile_image_location varchar(100)
);

create table messages(
message_id int auto_increment primary key,
sender_id varchar(30),
receiver_id varchar(30),
message varchar(200),
created_at datetime default current_timestamp
);

create table chat_list(
chat_id int auto_increment primary key,
user_id varchar(30),
other_id varchar(30),
last_updated datetime,
UNIQUE KEY unique_pair (user_id, other_id)
);

insert ignore into login_info(user_id, user_password) Values
("23BCP215@sot.pdpu.ac.in", "safiksafik"),
("23BCP211@sot.pdpu.ac.in", "yugyug"),
("23BCP220@sot.pdpu.ac.in", "hardip");

insert ignore into user_info(user_id, user_name, branch, department, year, cgpa) values
("23BCP215@sot.pdpu.ac.in", "safik", "bteach", "cse", 3, 8.9),
("23BCP215@sot.pdpu.ac.in", "safik", "bteach", "cse", 3, 8.9),
("23BCP215@sot.pdpu.ac.in", "safik", "bteach", "cse", 3, 8.9),
("23BCP211@sot.pdpu.ac.in", "safik", "bteach", "cse", 3, 8.9);

insert ignore into messages(sender_id, receiver_id, message) values
("23BCP215@sot.pdpu.ac.in", "23BCP211@sot.pdpu.ac.in", "hi"),
("23BCP211@sot.pdpu.ac.in", "23BCP215@sot.pdpu.ac.in", "bol");

insert into chat_list(user_id, other_id, last_updated) values
("23BCP215@sot.pdpu.ac.in", "23BCP211@sot.pdpu.ac.in", "2025-10-02 14:00:00"),
("23BCP215@sot.pdpu.ac.in", "23BCP219@sot.pdpu.ac.in", "2025-10-02 14:30:00");

select * from login_info;
select * from user_info;
select * from messages;
select * from chat_list;

drop table login_info;

truncate table user_info;
truncate table login_info;
truncate table messages;
truncate table chat_list;

