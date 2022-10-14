<?php
    $conn =mysqli_connect('localhost','root','','todo');
    if (isset($_POST['submit'])) {
        $task=$_POST['task'];
        $sql = "INSERT INTO tasks(task) VALUES ('$task')"; 
        $requet = mysqli_query($conn ,$sql);
    }
    $select=mysqli_query($conn , "SELECT * FROM  tasks");
    $recup = mysqli_fetch_all($select ,MYSQLI_ASSOC);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="heading">
                <h1>todo liste application</h1>
            </div>
            <form action="todo.php" method="POST">
                <input type="text" name="task" class="task_input" placeholder="your task">
                <button type="submit" class="btn btn-secondary" name="submit">add task</button>
            </form>
            <div class="col">
            <table class="table">
  <thead>
    <tr>
      <th scope="col">id_task</th>
      <th scope="col">task</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
        <?php foreach($select as $value) {?>
    <tr>
        <td><?= $value['id_task']?></td>
        <td><?=$value['task']?></td>
        <td><button class="waves-effect waves-light btn-small red darken-4"><a href="delete.php?id_task=<?=$value['id_task']?>"><i class="material-icons">X</i></a></button></td>
    </tr>
    <?php } ?> 
  </tbody>
</table>
            </div>
        </div>
    </div>
</body>
</html>