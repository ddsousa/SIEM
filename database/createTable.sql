create table produto (
	id serial primary key,
	codigo integer not null,
	tipo varchar, 
	descricao varchar,
	preco integer not null,
	n_vendas integer
);

create table cliente (
	id serial primary key,
	codigo integer not null,
	nome varchar not null,
	morada varchar not null,
	telefone integer not null
);

create table encomenda (
	id serial primary key,
	numero integer not null,
	id_produto integer references produto not null,
	id_cliente integer references cliente not null,
	quantidade integer not null,
	data_efetuada timestamp
);

create table stock (
	id serial primary key,
	id_produto integer references produto not null,
	qt_armazem integer,
	qt_disponivel integer
);

create table utilizador (
	id serial primary key,
	id_cliente integer references cliente not null,
	tipo_conta varchar not null,
	username varchar not null,
	password varchar
);
