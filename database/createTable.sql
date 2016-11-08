create table produto (
	id serial primary key,
	codigo integer,
	nome varchar,
	tipo varchar,
	descricao varchar,
	preco decimal(10,2) not null,
	n_vendas integer
);

create table cliente (
	id serial primary key,
	codigo serial not null,
	nome varchar not null,
	morada varchar not null,
	telefone integer not null,
	email varchar not null
);

create table encomenda (
	id serial primary key,
	estado varchar DEFAULT 'FALSE',
	numero integer not null,
	id_cliente integer references cliente not null,
	data_efetuada timestamp
);

create table detalhesencomenda (
	id serial primary key,
	id_encomeda integer references encomenda not null,
	id_produto integer references produto not null,
	quantidade integer not null
);

create table stock (
	id serial primary key,
	id_produto integer references produto not null,
	qt_armazem integer,
	qt_disponivel integer
);

create table utilizador (
	id serial primary key,
	id_cliente integer references cliente,
	tipo_conta varchar not null,
	username varchar not null UNIQUE,
	password varchar
);

-- preenchimento da tabela de produtos (TODO - meter codigos produtos
INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Leite evaporado',
	'Laticinios',
	'Leite Evaporado Frisian embalagem de 410 gramas. mín. 8% Resíduo seco isento de matéria gorda proveniente do leite',
	1.69,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Leite Magro Sem Lactose',
	'Laticinios',
	'Leite UHT Magro 0% de Lactose Mimosa. Embalagem de 1 litro.',
	1.19,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Leite Meio Gordo',
	'Laticinios',
	'Leite UHT Meio Gordo Agros. Embalagem de 1 litro.',
	0.47,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Leite Meio Gordo Sem Lactose',
	'Laticinios',
	'Leite UHT Meio Gordo Sem Lactose Mimosa. Embalagem de 1 litro.',
	1.19,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Leite Achocolatado Ucal',
	'Laticinios',
	'Leite UHT Achocolatado Ucal. 6 embalagens de 250ml.',
	2.79,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Leite Achocolatado Mimosa',
	'Laticinios',
	'Leite Achocolatado Mimosa. 6 embalagens de 200ml.',
	1.62,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Leite Condensado com Cacau',
	'Laticinios',
	'Leite Condensado com Cacau Colmi. Embalagem de 397 gramas',
	1.57,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Leite Condensado',
	'Laticinios',
	'Leite Condensado Colmi. Embalagem de 397 gramas',
	1.72,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Queijo Flamengo Fatiado',
	'Laticinios',
	'Queijo Flamengo Fatiado Limiano. Embalagem de 200 gramas.',
	1.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Queijo Mistura de Pimentão',
	'Laticinios',
	'Queijo Mistura de Pimentão Regional Saloio. Embalagem de 210 gramas.',
	1.95,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Queijo Fresco Sem Lactose',
	'Laticinios',
	'Queijo Fresco Sem Lactose Santiago. Embalagem de 130 gramas.',
	1.27,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Caldo de Carne',
	'Carne',
	'Caldo de Carne Knorr. Embalagem de 24 unidades',
	3.84,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Carne Picada de Vitelão Biológico',
	'Carne',
	'Carne Picada de Vitelão Biológico. Herança do Alentejo. Embalagem de 450 gramas.',
	13.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Carne Picada de Vitela',
	'Carne',
	'Carne Picada de Vitela. Herança do Alentejo. Embalagem de 420 gramas.',
	10.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Chouriço de Carne Ponte de Lima',
	'Carne',
	'Chouriço de Carne Ponte de Lima. Seleção. Embalagem de 190 gramas',
	4.50,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Salame Italiano',
	'Carne',
	'Salame Italiano Seleção. Embalagem de 100 gramas.',
	2.50,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Salsichas Alemãs Wienerwurst',
	'Carne',
	'Salsichas Alemãs Wienerwurst da Nobre. 5 unidades.',
	1.49,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Rodelinhas de Salsichas',
	'Carne',
	'Rodelinhas de Salsichas Meica. Embalagem de 380 gramas.',
	2.17,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Salsichas de Peru',
	'Carne',
	'Salsichas de Peru Meica. Embalagem de 6 unidades.',
	1.94,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Salsichas Frankfurt Aves',
	'Carne',
	'Salsichas Frankfurt Aves Nobre. Embalagem de 8 unidades.',
	0.75,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Bife do Lombo de Vitela',
	'Carne',
	'Bife do Lombo de Vitela Herança do Alentejo. Embalagem de 280 gramas',
	29.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Bife da Vazia de Vitela',
	'Carne',
	'Bife da Vazia de Vitela Herança do Alentejo. Embalagem de 290 gramas.',
	23.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Bife de Peito de Peru',
	'Carne',
	'Bife de Peito de Peru. Cada unidade contém cerca de 510 gramas',
	5.98,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Bifes de Peru do Campo',
	'Carne',
	'Bifes de Peru do Campo. Cada embalagem contém cerca de 450 gramas',
	9.98,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Hambúrger de Perú sem Glúten',
	'Carne',
	'Hambúrger de Perú sem Glúten Pescanova. Cada embalagem contém 4 unidades',
	1.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Peito de Peru Natura',
	'Carne',
	'Peito de Peru Natura Primor. Uma unidade contém 120 gramas',
	12.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Miúdos de Frango do Campo',
	'Carne',
	'Miúdos de Frango do Campo. Embalagem 550 gramas',
	2.40,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Asas de Frango Campo',
	'Carne',
	'Asas de Frango Campo. Embalagem de 500 gramas',
	1.94,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Peito de Frango do Campo',
	'Carne',
	'Peito de Frango do Campo. Embalagem de 470 gramas.',
	5.45,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Bifes de Frango do Campo',
	'Carne',
	'Bifes de Frango do Campo. Embalagem de 450 gramas.',
	5.58,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Hambúger de Frango sem Glúten',
	'Carne',
	'Hambúger de Frango sem Glúten Iglo. Embalagem de 8 unidades.',
	7.98,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Frango do Campo Fresco Inteiro sem Miúdos',
	'Carne',
	'Frango do Campo Fresco Inteiro sem Miúdos. Embalagem com aproximadamente 1.5Kg',
	2.79,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Hambúrger de Vaca sem Glúten',
	'Carne',
	'Hambúrger de Vaca sem Glúten Capitão Iglo. Embalagem 1.6Kg',
	9.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Bife Novilho Pá/Acém',
	'Carne',
	'Bife do Novilho Pá/Acém',
	7.37,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Lombos Pescada Ultracongelados',
	'Peixe',
	'Lombos de Pescada Ultracongelados Iglo. Embalagem de 400 gramas.',
	3.49,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Pescada Pequena',
	'Peixe',
	'Pescada Pequena (200-400 gramas)',
	4.86,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Pescada Grande',
	'Peixe',
	'Pescada Grande Seleção. 1 unidade contém aproximadamente 1,8kg.',
	8.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Medalhões de Pescada sem Pele Ultracongelados',
	'Peixe',
	'Medalhões de Pescada sem Pele Ultracongelados Pescanova. Cada embalagem contém cerca de 400 gramas.',
	4.63,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Postas de Pescada Nº5 para Cozer Ultracongeladas',
	'Peixe',
	'Postas de Pescada Nº5 para Cozer Ultracongeladas Pescanova. Cada embalagem contém cerca de 800 gramas.)',
	8.39,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Mimos de Pescada do Cabo Ultracongelados',
	'Peixe',
	'Mimos de Pescada do Cabo Ultracongelados Pescanova. Cada embalagem contém cerca de 1Kg.',
	7.69,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Salmão em Posta',
	'Peixe',
	'Salmão em Posta. Cada unidade tem aproximadamente 230 gramas.',
	6.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Lombos de Salmão',
	'Peixe',
	'Lombos de salmão. Cada unidade contém cerca de 315 gramas.',
	16.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Salmão',
	'Peixe',
	'Salmão. Cada unidade contém cerca de 3,9kg.',
	6.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Lombos de Salmão Ultracongelados',
	'Peixe',
	'Lombos de Salmão Ultracongelados Iglo. Cada unidade contém cerca de 250 gramas.',
	2.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Patê de Salmão',
	'Peixe',
	'Patê de Salmão La Piara. Embalagem contém 77 gramas.',
	2.39,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Dourada',
	'Peixe',
	'Dourada. Cada unidade contém cerca de 620 gramas.',
	12.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Carapau Médio',
	'Peixe',
	'Carapau médio. Cada unidade contém cerca de 250 gramas.',
	1.69,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Sardinha em óleo picante',
	'Peixe',
	'Sardinha em óleo picante General. Cada embalagem contém 125 gramas.',
	0.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Sardinha Pequena (Petinga)',
	'Peixe',
	'Sardinha Pequena (Petinga). Cada unidade contém cerca de 50 gramas.',
	4.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Sardinha Congelada',
	'Peixe',
	'Sardinha Congelada. Cada embalagem contém 1Kg.',
	2.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Truta Salmonada Fresca',
	'Peixe',
	'Truta Salmonada Fresca. Cada unidade contém cerca de 650 gramas.',
	4.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Bebida Soja Baunilha',
	'Bebidas',
	'Bebida de Soja de Baunilha Shoyce. Embalagem de 1 litro.',
	2.59,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Bebida Soja Chocolate',
	'Bebidas',
	'Bebida de Soja de Chocolate Shoyce. Embalagem de 1 litro.',
	1.09,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Coca-Cola',
	'Bebidas',
	'Coca-Cola. Refrigerante com gás. 4 embalagens de 1 litro cada.',
	3.88,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Coca-Cola Zero',
	'Bebidas',
	'Coca-Cola Zero. Refrigerante com gás. 4 embalagens de 1 litro cada.',
	3.96,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Coca-Cola Lata',
	'Bebidas',
	'Coca-Cola. Refrigerante com gás. 12 embalagens de 33cl cada.',
	7.44,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Fanta Laranja',
	'Bebidas',
	'Fanta de Laranja. Refrigerante com gás. 4 embalagens de 1 litro cada.',
	5.56,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Fanta Maracujá',
	'Bebidas',
	'Fanta de Maracujá. Refrigerante com gás. 1 embalagem com 1.5 litros.',
	1.19,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Fanta Ananás',
	'Bebidas',
	'Fanta de Maracujá. Refrigerante com gás. 1 embalagem com 1.5 litros.',
	1.19,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Frisumo Ananás',
	'Bebidas',
	'Frisumo de Ananás. Refrigerante com gás. 1 embalagem com 1.5 litros.',
	1.29,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Frisumo Laranja',
	'Bebidas',
	'Frisumo de Laranja. Refrigerante com gás. 1 embalagem com 1.5 litros.',
	1.29,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Seven Up Lima',
	'Bebidas',
	'Seven Up Lima. Refrigerante com gás. 1 embalagem com 1.5 litros.',
	0.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Seven Up Limão',
	'Bebidas',
	'Seven Up Limão. Refrigerante com gás. 1 embalagem com 1.5 litros.',
	1.31,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Vodka Preta',
	'Bebidas',
	'Vodka Preta Eristoff. Garrafa de 70cl.',
	9.79,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Vodka',
	'Bebidas',
	'Vodka Eristoff. Garrafa de 70cl.',
	9.49,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Cerveja',
	'Bebidas',
	'Cerveja Super Bock com Álcool. 20 embalagens de 25cl cada.',
	7.99,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Lambrusco',
	'Bebidas',
	'Riobello Lambrusco Rosado. Garrafa de 75cl.',
	4.59,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Sangria',
	'Bebidas',
	'Sangria Tinta Don Simón. Garrafa de 1.5 litros.',
	1.59,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Champanhe Bruto',
	'Bebidas',
	'Champanhe Bruto G. H. MUMM. Garrafa de 750ml',
	39.95,
	0
);

INSERT INTO produto (id, nome, tipo, descricao, preco, n_vendas)
VALUES (
	default,
	'Espumante Bruto',
	'Bebidas',
	'Espumante Bruto Quinta da Cabriz. Garrafa de 75cl.',
	7.19,
	0
);
