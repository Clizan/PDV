<?php 

 #Acá yo estoy hacendo un include da clase conexión
 include_once './model/conexao.php';

 #Acá estamos creando el schema caso no existe en database
 $createSchema = $conexao->query("CREATE SCHEMA IF NOT EXISTS loja");

 #Acá estamos creando la database 'ctrl_users
 $createTableUsers = $conexao->query("CREATE TABLE IF NOT EXISTS loja.ctrl_usuarios
                                       (
                                        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                        usuario VARCHAR(70) DEFAULT NULL,
                                        senha VARCHAR(70) DEFAULT NULL
                                       )");

 #Acá estamos haciendo una inserción del registro para hacer el login en aplicacíon
 $insertUsers = $conexao->query("INSERT INTO loja.ctrl_usuarios(usuario, senha) VALUES ('Admin', 'admin')");

 #Acá estamos creando la database 'ctrl_nota
 $createTableUsers = $conexao->query("CREATE TABLE IF NOT EXISTS loja.ctrl_nota 
                                       (
                                        `numero_nota` INT(11) NOT NULL,
                                        `nome_empresa` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                                        `cnpj` VARCHAR(19) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                                        `ie` VARCHAR(17) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                                        `valor_nota` DECIMAL(10,2) NULL DEFAULT NULL,
                                        `data_emissao` DATETIME NULL DEFAULT NULL,
                                        PRIMARY KEY (`numero_nota`) USING BTREE
                                       )");

 #Acá estamos creando la database 'ctrl_produto'
 $createTableProducts = $conexao->query("CREATE TABLE IF NOT EXISTS loja.ctrl_produto
                                          (
                                           id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	                                         cod_barras VARCHAR(50), 
	                                         desc_produto VARCHAR(255), 
	                                         qtde INT NOT NULL, 
	                                         validade DATE, 
	                                         preco_unitario DECIMAL(10,2), 
	                                         preco_final DECIMAL(10,2)
                                          )");

 #Acá estamos creando la database 'ctrl_venda'
 $createTableSell = $conexao->query("CREATE TABLE IF NOT EXISTS  loja.ctrl_venda
                                      (
                                        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                        codigo VARCHAR(50), 
                                        quantidade INT,
                                        total DECIMAL(10,2),
                                        data_venda DATETIME
                                       )"); 

 #Acá estamos creando una database temporaria para que recebir los valores temporales
 $createTableSellTemp = $conexao->query("CREATE TABLE IF NOT EXISTS loja.ctrl_venda_temp 
                                         (
                                          id_venda INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                          codigo_barras VARCHAR(50), 
                                          produto VARCHAR(255), 
                                          qtde INT NOT NULL, 
                                          preco_final DECIMAL(10,2)
                                         )");

?>