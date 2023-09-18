/* TABELA estadios */
CREATE TABLE estadios ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL,
  CONSTRAINT pk_clubes PRIMARY KEY (id)
);

/* TABELA posicao */
CREATE TABLE favPosicao ( 
  id int AUTO_INCREMENT NOT NULL, 
  posicao varchar(70) NOT NULL,
  CONSTRAINT pk_posicao PRIMARY KEY (id) 
);

/* TABELA clubes */
CREATE TABLE clubes ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL,
  iniciais varchar(3) NOT NULL,
  escudo longblob NOT NULL,
  sede varchar(70) NOT NULL,
  tecnico varchar(70) NOT NULL,
  id_estadio int NOT NULL,
  cor1 varchar(20) NOT NULL,
  cor2 varchar(20) NOT NULL,
  cor3 varchar(20) NOT NULL,
  CONSTRAINT pk_clubes PRIMARY KEY (id),
  CONSTRAINT fk_estadios FOREIGN KEY (id_estadio) REFERENCES estadios (id)
);

/* TABELA jogadores */
CREATE TABLE jogadores (
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(150) NOT NULL, 
  nascimento date NOT NULL,
  numero int NOT NULL,
  nome_uniforme varchar(100) NOT NULL,
  altura int(3) NOT NULL,
  peso int(3) NOT NULL,
  pe varchar(100) NOT NULL,
  nacionalidade varchar(100) NOT NULL,
  posicao varchar(50) NOT NULL,
  id_favPosicao int NOT NULL, 
  id_clube int NOT NULL, 
  CONSTRAINT pk_jogadores PRIMARY KEY (id),
  CONSTRAINT fk_favPosicao FOREIGN KEY (id_favPosicao) REFERENCES favPosicao (id),
  CONSTRAINT fk_clube FOREIGN KEY (id_clube) REFERENCES clubes (id)
);

/* INSERTs estadios */
INSERT INTO estadios (nome) VALUES ('Maracanã');
INSERT INTO estadios (nome) VALUES ('São januário');
INSERT INTO estadios (nome) VALUES ('Neo Química Arena');
INSERT INTO estadios (nome) VALUES ('Vila Belmiro');

