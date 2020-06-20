DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario(
    id INTEGER NOT NULL PRIMARY KEY, /*std is autoincrement*/
    cpf TEXT,
    nome TEXT NOT NULL, 
    idade INTEGER, /*substitute by birthdate*/
    email TEXT NOT NULL,
    senha TEXT NOT NULL, /*implement based on login logic*/
    cargo TEXT /*or role*/


);

DROP TABLE IF EXISTS telefone;
CREATE TABLE telefone(
    idTelefone INTEGER NOT NULL PRIMARY KEY,
    telefone TEXT NOT NULL
    /*idUsuario INTEGER NOT NULL
    FOREIGN KEY (idUsuario) REFERENCES usuario(id)*/
);

DROP TABLE IF EXISTS animal;
CREATE TABLE animal(
    idAnimal INTEGER NOT NULL PRIMARY KEY,
    idade INTEGER NOT NULL,
    nome TEXT NOT NULL,
    statusAnimal TEXT NOT NULL,
    descricao TEXT,
    datarecolhimento TEXT NOT NULL,
    especie TEXT NOT NULL

);

DROP TABLE IF EXISTS adocao;
CREATE TABLE adocao(
    idAdocao INTEGER NOT NULL PRIMARY KEY,
    idAnimal INTEGER NOT NULL,
    dataAdocao TEXT,
    dataSolicitacao TEXT NOT NULL,
    email TEXT NOT NULL,
    cpf TEXT NOT NULL,
    declaracao TEXT,
    nomeAdotante TEXT,
    confirmado INTEGER

    /*confirmado-> 0 false 1 true*/
    /*
    idAnimal INTEGER NOT NULL,
    id INTEGER NOT NULL,
    FOREIGN KEY (id) REFERENCES usuario(id),
    FOREIGN KEY (idAnimal) REFERENCES animal(idAnimal)*/


    /*animal picture to be added*/
);

DROP TABLE IF EXISTS doacao;
CREATE TABLE doacao(
    idDoacao INTEGER NOT NULL PRIMARY KEY,
    detalhes TEXT NOT NULL,
    datadoacao TEXT NOT NULL,
    benfeitor TEXT NOT NULL

    /*idResponsavel INTEGER NOT NULL,
    FOREIGN KEY (idResponsavel) REFERENCES usuario(id)*/ /*considering idResponsavel from a worker user*/

);

DROP TABLE IF EXISTS comentarios_animal;
CREATE TABLE comentarios_animal (
    idComentario INTEGER NOT NULL PRIMARY KEY,
    comentario TEXT NOT NULL
    /*
    id INTEGER NOT NULL,
    idAnimal INTEGER NOT NULL,
    FOREIGN KEY (id) REFERENCES usuario(id),
    FOREIGN KEY (idAnimal) REFERENCES animal(idAnimal)*/
);

DROP TABLE IF EXISTS busca;
CREATE TABLE busca (
    idBusca INTEGER NOT NULL PRIMARY KEY,
    cpf TEXT NOT NULL,
    descricao TEXT NOT NULL,
    dataSolicitaBusca TEXT NOT NULL
    /*id INTEGER NOT NULL
    FOREIGN KEY (id) REFERENCES usuario(id)*/ /*user who requested the search and rescue*/

);

INSERT INTO usuario (cpf, idade, nome, email, senha, cargo) VALUES (111111111, 21, 'wallstreet', 'aaa@gmail.com', '$2y$10$2jN2sQOhOBwUngZHb74JA.Fnwyt0pOp.SaqtZYIms1bRhW7eqjhAy', 'adm');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal2', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal3', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal4', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal5', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal6', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (3, 'testemal7', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (3, 'testemal8', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal9', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal10', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (4, 'testemal11', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal12', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal13', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal14', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal15', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal16', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal17', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal18', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (3, 'testemal19', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (3, 'testemal20', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal21', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal22', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (4, 'testemal23', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal24', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal25', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal26', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal27', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal28', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal29', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal30', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (3, 'testemal31', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (3, 'testemal32', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal33', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal34', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (4, 'testemal35', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal36', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');



INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal2', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal3', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal4', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal5', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal6', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (3, 'testemal7', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (3, 'testemal8', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal9', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal10', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (4, 'testemal11', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal12', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal13', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal14', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal15', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal16', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal17', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal18', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (3, 'testemal19', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (3, 'testemal20', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal21', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal22', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (4, 'testemal23', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal24', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal25', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal26', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal27', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal28', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal29', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal30', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (3, 'testemal31', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (3, 'testemal32', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal33', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (1, 'testemal34', 'Bom', 'aaaaaaaaaaaa', '111', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (4, 'testemal35', 'Bom', 'aaaaaaaaaaaa', '222', 'cachorro');
INSERT INTO animal (idade, nome, statusAnimal, descricao, datarecolhimento, especie) VALUES (2, 'testemal36', 'Excelente', 'aaaaaaaaaaaa', '111', 'cachorro');