<?php
include_once('config.php');

// Consulta para obter o ID do primeiro paciente
$query = "SELECT id FROM pacientes ORDER BY id ASC LIMIT 1";
$result = mysqli_query($conexao, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $id_paciente = $row['id'];

    // Query para excluir o paciente com o ID obtido
    $sql = "DELETE FROM pacientes WHERE id = $id_paciente";

    // Executar a query
    if (mysqli_query($conexao, $sql)) {
        echo "Paciente excluído com sucesso!";
    } else {
        echo "Erro ao excluir paciente: " . mysqli_error($conexao);
    }
} else {
    echo "Erro ao obter ID do paciente: " . mysqli_error($conexao);
}

// Fechar a conexão
mysqli_close($conexao);
?>
