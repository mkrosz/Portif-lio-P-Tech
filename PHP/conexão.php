<?php

$host = "localhost";
$db = "pesquisar";
$user = "root";
$pass = "";

$mysqli = new mysqli($host, $user, $pass, $db);
if($mysqli->connect_errno) {
    die("falha na conexão com o banco de dados.");
}

//Criar no PhpMyAdmin

/*

CREATE DATABASE pesquisar

CREATE TABLE pesquisador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    subtitulo VARCHAR(255),
    descricao TEXT,
    destino VARCHAR(255)
);

INSERT INTO pesquisador (titulo, subtitulo, descricao, destino) VALUES
('Sobre mim', 'Quem sou eu', 'Meu nome é Mike, tenho 18 anos, resido atualmente em sorocaba...', '../HEADER/sobreMim.html'),
('Contatos', 'Entre em contato', 'Você pode entrar em contato comigo por...', '../HEADER/contato.html'),
('Cursos', 'Certificações', 'Certificados que tenho na área da tecnologia e outros...', '../OpçõesMenu/cursos.html'),
('TCC', 'TCC ETEC 2024', 'Meu Projeto de TCC é um jogo socioemocional que eu e mais 3 alunos...', '../em_obras.html'),
('P-Tech', 'P-Tech durante os 3 anos de ensino médio', 'Tudo que foi falado e desenvolvido nas aulas de P-Tech...', '../OpçõesMenu/p_tech.html'),
('Tela de login', '', 'Tela de login com cadastro...', '../PROJETOS/login.html'),
('Projeto Crud', '', 'Site de gerenciamento com manipulação de dados e informação...', '../PROJETOS/crud.html'),
('App de perfumes', '', 'Aplicativo Mobile com redirecionamento para o site de compras...', '../PROJETOS/app_perfume.html'),
('Calculadora', '', 'Calculadora com todas a funções...', '../PROJETOS/calculadora.html'),
('Jogo da forca', '', 'Sorteia uma palavra a partir de um banco de dados...', '../PROJETOS/jogo_da_forca.html'),
('Jogo da velha', '', 'Jogo da velha com IA para vencer o oponente...', '../PROJETOS/jogo_da_velha.html'),
('Cronômetro ', '', 'Cronômetro com segundos, minutos, horas, botão de pausar, encerrar e volta, salva os dados obtidos...', '../PROJETOS/cronometro.html'),
('Calendário', '', 'Calendário que indica o dia em que estamos, e permite que grave datas importantes...', '../PROJETOS/calendario.html');

*/