create database if not exists db_escola;

use db_escola;

drop table if exists tb_nivel_acesso;
drop table if exists tb_usuario;
drop table if exists tb_aluno;

create table tb_nivel_acesso(
id                  int             not null auto_increment,
nome_nivel          varchar(20)     not null,
data_criacao        date            not null,
data_modificacao    date null,
constraint pk_nivel_acesso primary key(id)
);

create table tb_usuario(
id                  int(4) zerofill not null auto_increment,
nome                varchar(50)     not null,
email               varchar(60)     not null,
telefone            varchar(15)     not null,
login               varchar(20)     not null unique,
senha               varchar(30)     not null,
nivel_acesso_id     int             not null,
data_criacao        date            not null,
data_midificacao    date,
constraint pk_usuario  primary key(id),
constraint fk_nivel_usuario foreign key(nivel_acesso_id)
references tb_nivel_acesso(id)
on delete cascade
on update cascade
);

create table tb_aluno(
id                  int    zerofill not null auto_increment,
nome                varchar(50)     not null,
data_nasc           date            not null,
data_criacao        date            not null,
usuario_responsavel int             not null,
constraint pk_aluno    primary key(id),
constraint fk_usuario  foreign key(usuario_responsavel)
references tb_usuario(id)
on delete cascade
on update cascade
);

insert into tb_nivel_acesso (nome_nivel,data_criacao)
values('admin','2017-10-21');

insert into tb_nivel_acesso (nome_nivel,data_criacao)
values('comum','2017-10-21');

insert into tb_usuario (nome,email,login,senha,nivel_acesso_id,data_criacao)
values('admin','admin@admin.com','admin','admin',1,'2017-10-21');
