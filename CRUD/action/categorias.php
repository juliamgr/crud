<?php

// Incluindo os arquivos necessários

include_once './include/logado.php';

include_once './include/conexao.php';

include_once './include/header.php';
 
// Consulta para obter os dados das categorias

$sql = 'SELECT * FROM categorias';

$resultado = mysqli_query($conexao, $sql);

?>
 
<main>
<div class="container">
<h1>Lista de Categorias</h1>
<a href="./salvar-categorias.php" class="btn btn-add">Incluir</a>
 
    <table>
<thead>
<tr>
<th>ID</th>
<th>Nome</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
<?php

        // Verifica se existem categorias no banco

        if (mysqli_num_rows($resultado) > 0) {

          // Exibe as categorias

          while ($row = mysqli_fetch_assoc($resultado)) {

            echo "<tr>";

            echo "<td>" . $row['CategoriaID'] . "</td>";

            echo "<td>" . $row['Nome'] . "</td>";

            echo "<td>
<a href='salvar-categorias.php?id=" . $row['CategoriaID'] . "' class='btn btn-edit'>Editar</a>
<a href='excluir-categoria.php?id=" . $row['CategoriaID'] . "' class='btn btn-delete' onclick=\"return confirm('Deseja excluir esta categoria?');\">Excluir</a>
</td>";

            echo "</tr>";

          }

        } else {

          // Caso não haja categorias no banco

          echo "<tr><td colspan='3'>Nenhuma categoria encontrada</td></tr>";

        }

        ?>
</tbody>
</table>
</div>
</main>
 
<?php

// Incluindo o rodapé

include_once './include/footer.php';

?>