<?php 

 #Acá yo estoy hacendo un include da clase conexión
 include_once './model/conexao.php';

 #Acá estamos creando el schema caso no existe en database
 $createSchema = $conexao->query("CREATE SCHEMA IF NOT EXISTS loja");

 #Acá estamos haciendo una inserción del registro para hacer el login en aplicacíon
 $insertUsers = $conexao->query("INSERT INTO loja.ctrl_usuarios(usuario, senha) VALUES ('Admin', 'admin')");

 #Acá estamos creando la database 'ctrl_users
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

?>