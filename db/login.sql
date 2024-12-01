CREATE database IF NOT EXISTS Login_site;

drop DATABASE Login_site;

use Login_site;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    nome VARCHAR(255) NOT NULL,
    numero_celular VARCHAR(20) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(20)  UNIQUE,
    rg VARCHAR(20)  UNIQUE,
    data_nascimento DATE,
    sexo ENUM('M', 'F', 'N'),
    nome_foto VARCHAR(255),
    tipo ENUM('cliente', 'profissional', 'adm') DEFAULT 'cliente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

SELECT * FROM usuarios WHERE email  = 'chris@gmail.com';

CREATE TABLE IF NOT EXISTS PROFISSIONAIS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    especialidade VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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

INSERT INTO usuarios (email, nome, numero_celular, senha, cpf, rg, data_nascimento, sexo, tipo)
VALUES 
('joao.silva@example.com', 'João Silva', '11987654321', 'senhaSegura123', '12345678909', '123456789', '1990-05-15', 'M', 'cliente'),
('maria.santos@example.com', 'Maria Santos', '11912345678', 'senhaForte456', '98765432100', '987654321', '1995-08-25', 'F', 'cliente'),
('carlos.moraes@example.com', 'Carlos Moraes', '11876543210', 'minhaSenha789', '12398745600', '123987654', '1988-12-05', 'M', 'cliente'),
('ana.pereira@example.com', 'Ana Pereira', '11765432109', 'senhaSuper123', '45678912345', '456789123', '1992-03-30', 'F', 'cliente');

INSERT INTO PROFISSIONAIS (nome, especialidade) VALUES 
('Dr. João Silva', 'Oftalmologista'),
('Dra. Maria Oliveira', 'Pediatra'),
('Dr. Carlos Santos', 'Cardiologista'),
('Dra. Ana Pereira', 'Dermatologista'),
('Dr. Lucas Almeida', 'Neurologista');

INSERT INTO EXAMES (nome, valor) VALUES 
('Exame de Vista', 150.00),
('Ultrassonografia', 200.50),
('Hemograma Completo', 80.00),
('Exame de Sangue', 120.75),
('Raios X', 90.00);


