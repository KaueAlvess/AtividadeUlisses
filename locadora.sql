CREATE DATABASE locadora;
USE locadora;

CREATE TABLE Alugar (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    telefone VARCHAR(12) NOT NULL,
    data_inicio VARCHAR(15) NOT NULL,
    data_fim VARCHAR(15) NOT NULL,
    carro VARCHAR(45) NOT NULL
);

CREATE TABLE usuarios (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    senha VARCHAR(20) NOT NULL,
    email VARCHAR(45) NOT NULL,
    telefone VARCHAR(12) NOT NULL,
    sexo VARCHAR(15) NOT NULL,
    data_nasc VARCHAR(15) NOT NULL,
    cidade VARCHAR(45) NOT NULL,
    estado VARCHAR(45) NOT NULL,
    endereco VARCHAR(45) NOT NULL
);

select * from Alugar;
select * from usuarios;