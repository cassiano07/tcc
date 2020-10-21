-- criando database
create database EA;

use ea;

-- criando tabelas
create table usuarios(
	usuario_id int(4) auto_increment,
	nome_completo varchar(250) not null;
	telefone BIGINT(30);
	email varchar(100) not null,
	senha varchar(100) not null,
	data_criacao datetime;
	primary key (usuario_id)
);


-- inserindo usuarios


insert into usuarios (email, senha) values ('daniel_cmartins123@hotmail.com', '123')