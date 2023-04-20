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
                <input type="text" name="dr_id" class="form-control" placeholder="DR" required>
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
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

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
        

        showAllPatients();
        
        function showAllPatients(){
            $.ajax({
                url: "action.php",
                type: "POST",
                data: {action:"view"},
                success:function(response){
                    //console.log(response);
                    $("#showPatient").html(response);
                    $("table").DataTable({
                        order: [0, 'desc']
                    });
                }
            });
        }

        $("#insert").click(function(e){
            if($("#form-data")[0].checkValidity()){
                e.preventDefault();
                $.ajax({
                    url: "action.php",
                    type: "POST", 
                    data: $("#form-data").serialize()+"&action=insert",
                    success: function(response){
                        Swal.fire({
                            title: 'Pacijent uspesno dodat!',
                            type: 'success'
                        })
                        $("#addPatient").modal('hide');
                        $("#form-data")[0].reset();
                        showAllPatients();
                    }
                });
            }
        })
    });
</script>
</body>
</html>

