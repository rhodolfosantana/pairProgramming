conf-git-erickson:
	git config user.email "erickson.rinho@hotmail.com"
	git config user.name "Erickson"

conf-git-kevin:
	git config user.email "kevinsmoura@hotmail.com"
	git config user.name "kevinsousa"

conf-git-luigi:
	git config user.email "luigi.martins.355@gmail.com"
	git config user.name "Luigimartins"

conf-git-naadabe:
	git config user.email "naadabefarias@gmail.com"
	git config user.name "naadabefarias"

conf-git-rhodolfo:
	git config user.email "rhodolfo.dodo@hotmail.com"
	git config user.name "rhodolfosantana"

conf-git-cleyton:
	git config user.email "kevinsmoura@hotmail.com"
	git config user.name "kevinsousa"

conf-git-jhonny:
	git config user.email "jhonnyfarias87@gmail.com"
	git config user.name "jhonnyfreitas1"


bd-conf:
	mysql -u root -p --execute="drop database if exists ponto; create database if not exists ponto; use ponto;CREATE TABLE `Users` (`id` int(11) NOT NULL AUTO_INCREMENT,`name` varchar(255) NOT NULL,`user` varchar(255) NOT NULL,`password` varchar(255) NOT NULL, PRIMARY KEY (`id`));CREATE TABLE `pontos_turisticos` (`id` int(11) NOT NULL AUTO_INCREMENT, `user_id` int(11) NOT NULL,`nome_ponto` varchar(200) NOT NULL, `logradouro` varchar(200) NOT NULL,`bairro` varchar(200) NOT NULL, `numero_ponto` varchar(50) DEFAULT NULL,`imagem` varchar(100) NOT NULL, `categoria` enum('praia', 'rio', 'praca', 'museu', 'monumento', 'igreja') NOT NULL, PRIMARY KEY (`id`), KEY `user_id` (`user_id`), CONSTRAINT `pk_users` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE );"

dump:
	mysqldump -u root -p -d heads_up_db > db.dump

restore:
	mysql -u root -p -D heads_up_db < db.dump