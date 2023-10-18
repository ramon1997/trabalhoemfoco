create database bdtrabalho;

use bdtrabalho;

create table vagas(
id int not null auto_increment,
titulo varchar(100) not null,
descricao varchar(500) not null,
empresa varchar (100) not null,
cidade varchar (100) not null,
salario decimal (10,2)not null,
foreign key (id) references empresas(id),
primary key (id)
) default charset = utf8mb4;

create table empresas(
id int not null auto_increment,
nome varchar (100) not null,
descricaoempresa varchar(500) not null,
cidadeempresa varchar (100) not null,
email varchar (50) not null,
tel varchar (15) not null,

primary key (id)
) default charset = utf8mb4; 

create table cadidatos(
id int not null auto_increment,
nome varchar (100) not null,
email varchar (50) not null,
tel varchar (15) not null,
xp varchar (200) not null,
educacao varchar (100) not null,
habilidades varchar (100) not null,

primary key (id)
) default charset = utf8mb4;