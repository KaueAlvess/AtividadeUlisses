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
    valor_diaria VARCHAR(15) NOT NULL,
    imagem VARCHAR(255)
);

INSERT INTO carros (modelo, valor_diaria, imagem)
VALUES
('Fiat Uno', 100.00, 'https://admin.cnnbrasil.com.br/wp-content/uploads/sites/12/2025/06/fiat-uno-ciao.webp?w=849&h=477&crop=0'),
('VW Gol', 120.00, 'https://p2.trrsf.com/image/fget/cf/774/0/images.terra.com/2022/05/30/novo-gol_estudio_02-(1)-1h7qwqcvewqbc.jpg'), 
('Renault Kwid', 130.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMnFwHp9dsKAqRJOVXs6XaT_Swou_64JmjkhNpEg2F7le2VPglKbr8x7ZfjiLNKuaPB2o&usqp=CAU'),
('Hyundai HB20', 150.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXuS4mdJL-7ljjH8-Cqg2eXeJhdIPoHJsto15ODCDLIcwQt0e-Y99f2EZaW3jFbXm1jPY&usqp=CAU'),
('Chevrolet Onix', 160.00, 'https://secure-developments.com/shared/colombia/gm_forms/assets/front/images/jellys/66a140af0095e.png'),
('Ford Ka', 140.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRteyobVuhbaJ61uwdxoHmng-_0V_Q5WfUh6g&s'),
('Nissan Versa', 180.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFwuTgfDAjsA-Au8FoQ4Oial5vZ2ATnDI-fRYQCrbNOcG7-o5p3GaesDYNkQlk2gbIwTs&usqp=CAU'),
('Toyota Corolla', 200.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQP0p1N_m5hrIj5k4RRrOx19xKrlQEv4KbQSw&s'),
('Honda Civic', 220.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJRHP-86TDfVSz2ZA2B1ySvnda1GswuYMgCw&s'),
('BMW Série 3', 300.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaxRUQGtCls757fBBgWsJqDb35RtKxsQvlsw&s');

INSERT INTO usuarios (nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco, tipo_usuario) VALUES
('administrador', 'adm123', 'administrador@gmail.com', '119789414', 'outro', '01012001', 'diadema', 'sao paulo', 'rua guarani', 'admin');

select * from Alugar;
select * from usuarios;
select * from carros;