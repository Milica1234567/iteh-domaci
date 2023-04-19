<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartoteka</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#"><img src="./img/logo34.png" alt="" class="logo"></a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ena.php">dr Jelena Todic</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">dr Jovana Radenovic</a>
        </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="title">Kartoteka ordinacije MedicaMea</h3>
        </div>
    </div>

    <div class="row subtitle">
        <div class="col-lg-6 subtitle">
            <h4 class=>Pacijenti doktorke Jelene Todic</h4>
        </div>
        <div class="col-lg-6 btns">
            <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addPatient"><i class="fas fa-user-plus"></i> Dodaj novog pacijenta</button>
            <a href="#" class="btn btn-success m-1 float-right"><i class="fa fa-table"></i>&nbsp;Export to Excel</a>
        </div>
    </div>
    <hr class="my-1">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive" id="showPatient">
                <table class="table table-striped table-sm table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Ime</th>
                            <th>Ime roditelja</th>
                            <th>Prezime</th>
                            <th>Broj telefona</th>
                            <th>JMBG</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=1;$i<100;$i++): ?>
                        <tr class="text-center text-secondary">
                            <td><?= $i ?></td>
                            <td>user1</td>
                            <td>user1</td>
                            <td>user1</td>
                            <td>brtelefona1</td>
                            <td>jmbg1</td>
                            <td>
                                <a href="#" title="Detalji" class="text-success"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;
                                <a href="#" title="Edit" class="text-primary"><i class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;
                                <a href="#" title="Delete" class="text-danger"><i class="fas fa-trash-alt fa-lg"></i></a>
                            </td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

 <!-- Nov pacijent -->
 <div class="modal fade" id="addPatient">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Novi pacijent</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body px-4">
          <form action="" method="post" id="form-data">
            <div class="form-group">
                <input type="text" name="ime" class="form-control" placeholder="Ime" required>
            </div>
            <div class="form-group">
                <input type="text" name="imeRod" class="form-control" placeholder="Ime roditelja" required>
            </div>
            <div class="form-group">
                <input type="text" name="prezime" class="form-control" placeholder="Prezime" required>
            </div>
            <div class="form-group">
                <input type="tel" name="brTelefona" class="form-control" placeholder="Broj telefona" required>
            </div>
            <div class="form-group">
                <input type="text" name="jmbg" class="form-control" placeholder="JMBG" required>
            </div>
            <div class="form-group">
                <input type="submit" name="insert" id="insert" value="Dodaj pacijenta" class="btn btn-success btn-block">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Font awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- tables -->
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>

<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("table").DataTable();
    });
</script>
</body>
</html>

