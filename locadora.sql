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
    endereco VARCHAR(45) NOT NULL,
    tipo_usuario ENUM('usuario', 'admin') DEFAULT 'usuario'
);

CREATE TABLE carros (
	id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(45) NOT NULL,
    tipo VARCHAR(45) NOT NULL,
    ano VARCHAR(20) NOT NULL,
    valor_diaria VARCHAR(15) NOT NULL
);

INSERT INTO carros
 (modelo, tipo, ano, valor_diaria) VALUES
('Toyota Corolla', 'Sedan', 2021, 150.00),
('Jeep Renegade', 'SUV', 2022, 200.00),
('Fiat Argo', 'Hatch', 2020, 120.00),
('Chevrolet S10', 'Pickup', 2019, 250.00),
('Hyundai HB20S', 'Sedan', 2023, 170.00);

INSERT INTO usuarios (nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco, tipo_usuario) VALUES
('administrador', 'adm123', 'administrador@gmail.com', '119789414', 'outro', '01012001', 'diadema', 'sao paulo', 'rua guarani', 'admin');

select * from Alugar;
select * from usuarios;
