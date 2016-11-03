<?php include_once("tarefas.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: sans-serif;
            width: 85%;
            height: auto;
            margin: 0 auto;
        }

        input[type='text'], textarea {
            display: block;
            margin-bottom: 10px;
            width: 98%;
            height: auto;
            padding: 10px;
        }

        input[type='submit'] {
            margin-top: 10px;
        }

        table {
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #555;
            text-align: center;
            padding: 5px;
        }
    </style>
    <title>Gerenciador de tarefas</title>
</head>
<body>
<h2>Gerenciador de tarefas</h2>
<form action="index.php" method="get">
    <fieldset>
        <legend>Nova tarefa</legend>
        <label for="nome">Tarefa:</label>
        <input type="text" name="nome" id="nome">

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" rows="3"></textarea>

        <label for="prazo">Prazo:</label>
        <input type="text" name="prazo" id="prazo">

        <fieldset>
            <legend>Prioridade:</legend>
            <label>
                <input type="radio" name="prioridade" value="baixa" checked> Baixa
                <input type="radio" name="prioridade" value="media"> Média
                <input type="radio" name="prioridade" value="alta"> Alta
            </label>
        </fieldset>

        <label for="concluida">
            Tarefa concluída:
            <input type="checkbox" name="concluida" id="concluida" value="sim">
        </label>
    </fieldset>
    <input type="submit" value="Cadastrar">
</form>
<table>
    <tr>
        <th>Tarefas</th>
        <th>Descrição</th>
        <th>Prazo</th>
        <th>Prioridade</th>
        <th>Concluída</th>
    </tr>
    <?php var_dump($lista_tarefas); ?>
    <?php foreach($lista_tarefas as $tarefa): ?>
        <tr>
            <td><?php echo $tarefa["nome"]; ?></td>
            <td><?php echo $tarefa["descricao"]; ?></td>
            <td><?php echo $tarefa["prazo"]; ?></td>
            <td><?php echo $tarefa["prioridade"]; ?></td>
            <td><?php echo $tarefa["concluida"]; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>