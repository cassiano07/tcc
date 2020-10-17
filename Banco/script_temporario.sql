-- criando database
create database EA;

use ea;

-- criando tabelas
create table usuarios(
	usuario_id int(4) auto_increment,
	email varchar(100) not null,
	senha varchar(100) not null,
	primary key (usuario_id)
);


-- inserindo usuarios


insert into usuarios (email, senha) values ('daniel_cmartins123@hotmail.com', '123')