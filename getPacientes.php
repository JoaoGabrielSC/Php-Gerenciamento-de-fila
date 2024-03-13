<?php

include_once('config.php');

// Consulta SQL para obter todos os pacientes ordenados por queue_type e ID
$sql = "SELECT nome, queue_type, especialidade FROM pacientes ORDER BY queue_type DESC, id ASC";
$result = mysqli_query($conexao, $sql);

// Cria um array para armazenar os dados dos pacientes
$pacientes = array();

if ($result->num_rows > 0) {
    // Loop pelos resultados e adiciona ao array
    while ($row = $result->fetch_assoc()) {
        $pacientes[] = $row;
    }
}

// Converte o array para JSON e imprime
echo json_encode($pacientes);

// Fecha a conexão
$conexao->close();
?>
