CREATE DATABASE EA;

use ea;

CREATE TABLE usuarios(
        id int(5) AUTO_INCREMENT,
        nome_completo varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        telefone int(14) NOT NULL,
        senha varchar(100) NOT NULL,
        categoria_id int(3) NOT NULL,
        data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
        data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE conteudo_arquivo(
        id int(3) AUTO_INCREMENT,
        titulo varchar(100) NOT NULL,
        dados longtext NOT NULL,
        usuario_id int(5) NOT NULL,
        data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
        data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);
    

CREATE TABLE favorito(
        id int(3) AUTO_INCREMENT,
        conteudo_id int(3) NOT NULL,
        dimensao varchar(100) NOT NULL,
        metrica varchar(100) NOT NULL,
        operacao varchar(100) NOT NULL,
        grafico_id int(3) NOT NULL,
        usuario_id int(5) NOT NULL,
        data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);
   
CREATE TABLE historico(
        id int(3) AUTO_INCREMENT,
        grafico_id int(3),
        conteudo_id int(3),
        evento varchar(100) NOT null,
        data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
        usuario_id int(3),
        PRIMARY KEY (id)
);
   
CREATE TABLE grafico(
        id int(3) AUTO_INCREMENT,
        nome varchar(100) NOT NULL,
        tipo varchar(100) NOT NULL,
        data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
);

CREATE TABLE categoria_usuario(
        id int(3) AUTO_INCREMENT,
        nome_categoria varchar(100) NOT null,
        PRIMARY KEY (id)
);

ALTER TABLE favorito
ADD CONSTRAINT fk_ID_usuario
FOREIGN KEY (usuario_id)
REFERENCES usuarios(id);

ALTER TABLE favorito 
ADD CONSTRAINT fk_ID_grafico 
FOREIGN KEY (grafico_id) 
REFERENCES grafico(id);

ALTER TABLE favorito 
ADD CONSTRAINT fk_ID_conteudo
FOREIGN KEY (conteudo_id) 
REFERENCES conteudo_arquivo(id);

ALTER TABLE historico
ADD CONSTRAINT fk_ID_usuariohistorico
FOREIGN KEY (usuario_id)
REFERENCES usuarios(id);

ALTER TABLE historico 
ADD CONSTRAINT fk_ID_graficohistorico 
FOREIGN KEY (grafico_id) 
REFERENCES grafico(id);

ALTER TABLE historico 
ADD CONSTRAINT fk_ID_conteudohistorico
FOREIGN KEY (conteudo_id) 
REFERENCES conteudo_arquivo(id);

ALTER TABLE usuarios 
ADD CONSTRAINT fk_ID_usuariocategoria
FOREIGN KEY (categoria_id) 
REFERENCES categoria_usuario(id);



INSERT INTO categoria_usuario(nome_categoria) VALUES ('Administradores');
INSERT INTO categoria_usuario(nome_categoria) VALUES ('Usuarios');
INSERT INTO grafico (id, nome, tipo) VALUES (1, 'Gr�fico de linha', 'line'), (2, 'Gr�fico de barra', 'bar'), (3, 'Gr�fico de Radar', 'radar'), (4, 'Gr�fico de Torta', 'pie'), (5, 'Gr�fico Ar�a Polar', 'polararea'), (6, 'Gr�fico de Linha Simples', 'linesimple');
INSERT INTO usuarios (nome_completo, email, telefone, senha, categoria_id) VALUES ('admin', 'admin@admin', 993877528, '123',  1), ('Daniel Cassiano Martins', 'danielcmartins07@gmail.com', 993877528, '123',  2), ('Rodrigo Alexandre Pereira', 'rodrigo@gmail.com', 65497498, '123',  2), ('Bruno Barbosa Barros Dirk', 'bruno@gmail.com', 654974988, '123',  2);