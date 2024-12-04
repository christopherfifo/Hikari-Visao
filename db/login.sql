CREATE database IF NOT EXISTS Login_site;

use Login_site;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    nome VARCHAR(255) NOT NULL,
    numero_celular VARCHAR(20) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(20)  NULL,
    rg VARCHAR(20)  NULL,
    data_nascimento DATE,
    sexo ENUM('M', 'F', 'N'),
    nome_foto VARCHAR(255),
    tipo ENUM('cliente', 'profissional', 'adm') DEFAULT 'cliente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

SELECT * FROM usuarios;

CREATE TABLE IF NOT EXISTS PROFISSIONAIS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    especialidade VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE IF NOT EXISTS EXAMES (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS CONSULTAS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_profissional INT NOT NULL,
    nome_profissional varchar(255) not null,
    especialidade_profissional VARCHAR(255) NOT NULL,
    data_consulta DATE NOT NULL,
    hora_consulta TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_profissional) REFERENCES PROFISSIONAIS(id)
);

CREATE  TABLE IF NOT EXISTS DETALHES_CONSULTAS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_consulta INT NOT NULL,
    id_exame INT NOT NULL,
    nome_exame VARCHAR(255) NOT NULL,
    valor_exame DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_consulta) REFERENCES CONSULTAS(id),
    FOREIGN KEY (id_exame) REFERENCES EXAMES(id)
);

CREATE TABLE IF NOT EXISTS PAGAMENTOS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_consulta INT NOT NULL,
    id_cliente INT NOT NULL,
    valor_pago DECIMAL(10,2),
    data_pagamento DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_consulta) REFERENCES CONSULTAS(id),
    FOREIGN KEY (id_cliente) REFERENCES usuarios(id)
);

SELECT * FROM PROFISSIONAIS;


INSERT INTO usuarios (email, nome, numero_celular, senha, cpf, rg, data_nascimento, sexo, tipo) VALUES 
('joao.silva@example.com', 'Dr. João Silva', '1234567890', 'senha_hash', '123.456.789-00', 'MG-12.345.678', '1970-01-01', 'M', 'profissional'),
('maria.oliveira@example.com', 'Dra. Maria Oliveira', '1234567891', 'senha_hash', '123.456.789-01', 'MG-12.345.679', '1980-02-02', 'F', 'profissional'),
('carlos.santos@example.com', 'Dr. Carlos Santos', '1234567892', 'senha_hash', '123.456.789-02', 'MG-12.345.680', '1990-03-03', 'M', 'profissional'),
('ana.pereira@example.com', 'Dra. Ana Pereira', '1234567893', 'senha_hash', '123.456.789-03', 'MG-12.345.681', '1985-04-04', 'F', 'profissional'),
('lucas.almeida@example.com', 'Dr. Lucas Almeida', '1234567894', 'senha_hash', '123.456.789-04', 'MG-12.345.682', '1975-05-05', 'M', 'profissional');

INSERT INTO profissionais (id_usuario, nome, especialidade) VALUES 
('1', 'Dr. João Silva', 'Oftalmologista'),
('2', 'Dra. Maria Oliveira', 'Pediatra'),
('3', 'Dr. Carlos Santos', 'Cardiologista'),
('4', 'Dra. Ana Pereira', 'Dermatologista'),
('5', 'Dr. Lucas Almeida', 'Neurologista');

INSERT INTO EXAMES (nome, valor) VALUES 
('Exame de Vista', 150.00),
('Ultrassonografia', 200.50),
('Hemograma Completo', 80.00),
('Exame de Sangue', 120.75),
('Raios X', 90.00);


