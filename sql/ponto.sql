CREATE DATABASE es;

CREATE TABLE es.aluno(
	ra_aluno VARCHAR(15) PRIMARY KEY,
	nome_aluno VARCHAR(45) NOT NULL,
	periodo_aluno char(6) NOT NULL,
	curso_aluno varchar(45) NOT NULL,
	email_aluno VARCHAR(45) NOT NULL
);

CREATE TABLE es.nv_usuario(
	id_nv TINYINT PRIMARY KEY AUTO_INCREMENT,
	desc_nv VARCHAR(30) NOT NULL UNIQUE
);


CREATE TABLE es.usuario(
	id_usuario INT PRIMARY KEY AUTO_INCREMENT,
	login_usuario VARCHAR(20) NOT NULL UNIQUE,
	senha_usuario VARCHAR(32) NOT NULL,
	nv_usuario TINYINT NOT NULL,
	CONSTRAINT fk_nv_usuario FOREIGN KEY(nv_usuario) REFERENCES nv_usuario(id_nv)
);

CREATE TABLE es.local (
	id_local INT PRIMARY KEY AUTO_INCREMENT,
	desc_local VARCHAR(30) NOT NULL UNIQUE
);

CREATE TABLE es.turno(
	id_turno TINYINT PRIMARY KEY AUTO_INCREMENT,
	desc_turno VARCHAR(20) UNIQUE
);

CREATE TABLE es.entrada(
	aluno_entrada VARCHAR(15) NOT NULL,
	dia_entrada DATE NOT NULL,
	hora_entrada DATETIME NOT NULL,
	local_entrada INT NOT NULL,
	turno_entrada TINYINT NOT NULL,
	CONSTRAINT fk_aluno_entrada FOREIGN KEY(aluno_entrada) REFERENCES aluno(ra_aluno),
	CONSTRAINT fk_local_entrada FOREIGN KEY(local_entrada) REFERENCES local(id_local),
	CONSTRAINT fk_turno_entrada FOREIGN KEY(turno_entrada) REFERENCES turno(id_turno),
	PRIMARY KEY(aluno_entrada, dia_entrada, local_entrada, turno_entrada)
);


CREATE TABLE es.saida(
	aluno_saida VARCHAR(15) NOT NULL,
	dia_saida DATE NOT NULL,
	hora_saida DATETIME NOT NULL,
	local_saida INT NOT NULL,
	turno_saida TINYINT NOT NULL,
	CONSTRAINT fk_aluno_saida FOREIGN KEY(aluno_saida) REFERENCES aluno(ra_aluno),
	CONSTRAINT fk_local_saida FOREIGN KEY(local_saida) REFERENCES local(id_local),
	CONSTRAINT fk_turno_saida FOREIGN KEY(turno_saida) REFERENCES turno(id_turno),
	PRIMARY KEY(aluno_saida,dia_saida,local_saida, turno_saida)
);

INSERT INTO turno VALUES(null,"Matutino");
INSERT INTO turno VALUES(null,"Vespertino");
INSERT INTO turno VALUES(null,"Noturno");


INSERT INTO local VALUES(null,"Auditório da Biblioteca");
INSERT INTO local VALUES(null,"Auditório Padres do Trbalho");
INSERT INTO local VALUES(null,"Auditório Otton Fava");
INSERT INTO local VALUES(null,"Auditório Sr. Zezinho");
INSERT INTO local VALUES(null,"Bloco A");
INSERT INTO local VALUES(null,"Bloco B");
INSERT INTO local VALUES(null,"Bloco C");
INSERT INTO local VALUES(null,"Bloco D");
INSERT INTO local VALUES(null,"Bloco E");
INSERT INTO local VALUES(null,"Bloco F");
INSERT INTO local VALUES(null,"Bloco U");
INSERT INTO local VALUES(null,"Bloco V");
INSERT INTO local VALUES(null,"Bloco G");
INSERT INTO local VALUES(null,"Sala de Artes");
INSERT INTO local VALUES(null,"Sala Ampliada D");
INSERT INTO local VALUES(null,"Salão Espelhado");
INSERT INTO local VALUES(null,"Teatro João Paulo II");
INSERT INTO local VALUES(null,"Outro");

INSERT INTO es.nv_usuario VALUES(null,'Usuário');
INSERT INTO es.nv_usuario VALUES(null,'Administrador');

INSERT INTO es.usuario VALUES(NULL,'admin','95e81f64f695325c90dc1bd7e0bd02e1',2); /*SENHA: adm@fabrica#456120   */

CREATE VIEW es.relatorio (ra,nome,periodo,curso,email, local, dia, entrada,saida,turno_entrada,turno_saida)
as select ra_aluno, nome_aluno, periodo_aluno, curso_aluno,email_aluno,desc_local, date_format(dia_entrada,'%d/%m/%y'), date_format(hora_entrada, '%H:%i'), date_format(hora_saida, '%H:%i'),turno_entrada,turno_saida  from aluno 
left join entrada on ra_aluno = aluno_entrada 
left join saida on ra_aluno = aluno_saida
inner join local on id_local = local_entrada
where aluno_entrada = aluno_saida and local_entrada = local_saida and dia_entrada = dia_saida and turno_entrada = turno_saida
;


CREATE VIEW es.falta (ra,nome,periodo,curso,email)
AS SELECT ra_aluno,nome_aluno,periodo_aluno,curso_aluno,email_aluno FROM aluno
where ra_aluno NOT IN (SELECT aluno_entrada FROM entrada)
AND ra_aluno NOT IN (SELECT aluno_saida FROM saida);


CREATE VIEW es.relatorio_entrada (ra,nome,periodo,curso,email,local,dia,hora)
AS SELECT ra_aluno,nome_aluno,periodo_aluno,curso_aluno,email_aluno,desc_local,date_format(dia_entrada,'%d/%m/%y'),date_format(hora_entrada, '%H:%i') FROM entrada
inner join aluno on ra_aluno = aluno_entrada
inner join local on id_local = local_entrada
where (aluno_entrada,dia_entrada,local_entrada,turno_entrada) NOT IN (SELECT aluno_saida,dia_saida,local_saida,turno_saida FROM saida);


CREATE VIEW es.relatorio_saida (ra,nome,periodo,curso,email,local,dia,hora)
AS SELECT ra_aluno,nome_aluno,periodo_aluno,curso_aluno,email_aluno,desc_local,date_format(dia_saida,'%d/%m/%y'),date_format(hora_saida, '%H:%i') FROM saida
inner join aluno on ra_aluno = aluno_saida
inner join local on id_local = local_saida
where (aluno_saida,dia_saida,local_saida,turno_saida) NOT IN (SELECT aluno_entrada,dia_entrada,local_entrada,turno_entrada FROM entrada);


