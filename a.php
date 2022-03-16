<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th></th>
                <th class="semana" scope="col">
                    <div class="dias">Segunda-feira</div>
                </th>
                <th class="semana" scope="col">
                    <div class="dias">Terça-feira</div>
                </th>
                <th class="semana" scope="col">
                    <div class="dias">Quarta-feira</div>
                </th>
                <th class="semana" scope="col">
                    <div class="dias">Quinta-feira</div>
                </th>
                <th class="semana" scope="col">
                    <div class="dias">Sexta-feira</div>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php   $grade = [];

foreach ($array["horario"] as $dia) {
  foreach ($dia["horarios"] as $key => $horario) {
    $select = "SELECT disciplina, professor FROM horarios WHERE dia LIKE '" . $dia["dia"] . "' AND inicio LIKE '" . $horario["inicio"] . "';";
    $result = mysqli_query($connect, $select);
    $rows = mysqli_fetch_assoc($result);
    if($rows){
      array_push($grade, $row);
    }
  }
}           

                if ($result->num_rows >= 0) {                     
                    while ($row = $result->fetch_array()) {                       
                        
                    echo "<tr>       
                            <td>".$grade[0]['disciplina']."".$grade[0]['professor']." de 07:20 a 08:10</td>                    
                            <td>".$grade[0]['disciplina']."".$grade[0]['professor']." de 07:20 a 08:10</td>
                        </tr>";
                        }
                    }

            ?>
        </tbody>
</div>
            <?php                 
            $sql = "SELECT * FROM cardapio WHERE  codproduto = 1 ";                 
            $professorMateria = $conn->query($sql);                   
            if ($professorMateria->num_rows >= 0) {                     
                while ($row = $professorMateria->fetch_array()) {                       
                    echo "                                              
                    <tr>                         
                    <td>".$row['codigo_pizza']."</td>                         
                    <td>".$row['nomepizza']."</td>";
                }}
                    ?>