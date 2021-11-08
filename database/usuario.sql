create table Usuario(
	id int primary key NOT NULL,
    nome varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    CPF char(14) NOT NULL,
    data_nascimento date NULL,
    telefone varchar(11) NULL,
    senha varchar(8) NOT NULL,
    CEP char(10) NULL
)