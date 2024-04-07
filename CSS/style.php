<?php
header("Content-type: text/css"); ?>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;1,700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
    list-style: none;
    text-decoration: none;
}

:root {
    --purple: #8A2BE2;
    --white: #fff;
    --dark: #1e1c2a;
    --gray: #eee;
    --darkgray: #ccc;
    --icewhite: #F3F8FF;
    --icegray: #d3e0f3;
}

body {
    color: var(--dark);
    background: var(--icewhite);
}

/* Barra de rolagem */
::-webkit-scrollbar {
    width: 10px; 
}

::-webkit-scrollbar-track {
    background-color: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background-color: #8A2BE2;
    border-radius: 3px;
}

::-webkit-scrollbar-thumb:hover {
    background-color: #6c10c1;
}

/* Barra de Navegação */
.navigation {
    background-color: var(--dark); 
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    height: 70px;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
}

.navigation .logo {
    color: var(--purple); 
    font-size: 1.5rem;
    font-weight: 700;
    text-decoration: none;
}

.navigation .logo span {
    color: var(--white); 
}

.navigation .nav-menu, .navigation i {
    color: var(--white); 
    display: flex;
    justify-content: center;
    margin-right: 50px;
    gap: 20px;
}

.navigation .nav-menu .nav-item, .navigation i {
    margin-left: 50px;
}

.navigation .nav-menu i {
    font-size: 24px;
}

.navigation .nav-menu .nav-item a {
    color: var(--white); 
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s;
}

.navigation .nav-menu .nav-item a:hover {
    color: var(--purple); 
}

.navigation .menu {
    display: none;
}

.navigation .menu .bar {
    display: block;
    width: 25px;
    height: 3px;
    background-color: var(--dark);
    margin: 5px 0;
}

.espaço {
    margin-top: 120px;
}

.container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

h2 {
    text-align: center;
    margin-bottom: 15px;
}

.barra-pesquisa {
    display: flex;
    justify-content: center;
    align-items: center;
    position: sticky;
    top: 70px;
    z-index: 1000;
}

.search-box {
    list-style: none;
    position: relative;
}

.search-input {
    left: -120px;
    top: 50%;
    width: 700px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 15px;
}

.search-input:focus {
    outline: none;
    border-color: #8A2BE2;
}

.icon {
    position: absolute;
    left: -40px;
    top: 52%;
    transform: translateY(-42%);
    color: #333; /* Removido !important */
    font-size: 32px;
}

.send-icon {
    margin: 20px 0;
}

.send-icon .send {
    border: 1px solid #1e1c2a;
    border-radius: 20%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 3px;
    width: 40px;
    height: 40px;
}

.send-icon .send i{
    font-size: 20px;
    color: #1e1c2a;
}


/*Tabela da pesquisa*/

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border: none;
}

th {
    background-color: #d3e0f3;
    border-bottom: 2px solid #1e1c2a;
}

.th-start {
    border-radius: 15px 0 0 0;
}

.th-end {
    border-radius: 0 15px 0 0;
}

td {
    font-family: sans-serif;
}

/* Posicionamento da tabela */
.container table {
    position: fixed;
    margin-top: 3rem;
    margin-bottom: 5rem;
}

/* Estilo para o botão "Ver mais" */
    .ver-mais {
        display: inline-block;
        padding: 6px 20px;
        background-color: #8A2BE2;
        color: white;
        text-align: center;
        text-decoration: none;
        white-space: nowrap;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .ver-mais:hover {
        background-color: #6a1b9a;
    }