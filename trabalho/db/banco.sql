mysql CREATE DATABASE db;

USE db;

    CREATE TABLE usuario(
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(120) NOT NULL,
    email VARCHAR(120) NOT NULL,
    senha VARCHAR(120) NOT NULL,
    dtnasc date not NULL,
    cidade VARCHAR(300) NOT NULL,
    cep INT(8) NOT NULL,
    endereco VARCHAR(600) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE produtos(
    id INT NOT NULL AUTO_INCREMENT,
    id_categoria INT NOT NULL,
    nome VARCHAR(200) NOT NULL,
    descricao VARCHAR(500) NOT NULL,
    valor FLOAT NOT NULL,
    imagem VARCHAR (400) NOT NULL,
    estoque INT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE categorias(
    id INT NOT NULL AUTO_INCREMENT,
    nome_cat VARCHAR(100),
    PRIMARY KEY (id)
);

CREATE TABLE pedidos(
    id INT NOT NULL AUTO_INCREMENT,
    dataped FLOAT NOT NULL,
    valor FLOAT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE carrinho(
	id INT NOT NULL AUTO_INCREMENT,
	id_user INT NOT NULL,
	id_prod INT NOT NULL,
	PRIMARY KEY(id)
);



