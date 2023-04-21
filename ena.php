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


  <!-- Update -->
  <div class="modal fade" id="editPatient">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Promeni podatke pacijenta</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body px-4">
          <form action="" method="post" id="edit-form-data">
          <div class="form-group">
                <input type="text" name="id" id="id" readonly>
            </div>
            <div class="form-group">
                <input type="text" name="ime" class="edit-form-control" id="ime" required>
            </div>
            <div class="form-group">
                <input type="text" name="imeRod" class="edit-form-control" id="imeRod" required>
            </div>
            <div class="form-group">
                <input type="text" name="prezime" class="edit-form-control" id="prezime" required>
            </div>
            <div class="form-group">
                <input type="tel" name="brTelefona" class="edit-form-control" id="brTelefona" required>
            </div>
            <div class="form-group">
                <input type="text" name="jmbg" class="edit-form-control" id="jmbg" required>
            </div>
            <div class="form-group">
                <input type="text" name="dr_id" class="edit-form-control" id="dr_id" required>
            </div>
            <div class="form-group">
                <input type="submit" name="update" id="update" value="Azuriraj pacijenta" class="btn btn-success btn-block">
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
//insert
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
//pokupi podatke za edit modal
        $("body").on("click", ".editBtn", function(e){
            e.preventDefault();
            edit_id = $(this).attr('id');
            $.ajax({
                url: "action.php",
                type: "POST",
                data: {edit_id:edit_id},
                success:function(response){
                    data = JSON.parse(response);
                    $("#id").val(data.id);
                    $("#ime").val(data.ime);
                    $("#imeRod").val(data.ime_roditelja);
                    $("#prezime").val(data.prezime);
                    $("#brTelefona").val(data.br_telefona);
                    $("#jmbg").val(data.jmbg);
                    $("#dr_id").val(data.doktor_id);
                }
            })
        });
//update
        $("#update").click(function(e){
            if($("#edit-form-data")[0].checkValidity()){
                e.preventDefault();
                $.ajax({
                    url: "action.php",
                    type: "POST", 
                    data: $("#edit-form-data").serialize()+"&action=update",
                    success: function(response){
                        Swal.fire({
                            title: 'Pacijent uspesno azuriran!',
                            type: 'success'
                        })
                        $("#editPatient").modal('hide');
                        $("#edit-form-data")[0].reset();
                        showAllPatients();
                    }
                });
            }
        })
//delete
        $("body").on("click", ".delBtn", function(e){
            e.preventDefault();
            var tr=$(this).closest('tr');
            del_id=$(this).attr('id');
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {del_id:del_id},
                    success:function(response){
                        tr.css('background-color','#ff6666');
                        swal.fire(
                            'Uspesno obrisan pacijent'
                            
                        )
                        showAllPatients();
                    }
                })
            }
    });
});
///detalji
    $("body").on("click", ".infoBtn", function(e){
        e.preventDefault();
        info_id = $(this).attr('id');
        $.ajax({
            url:"action.php",
            type:"POST",
            data:{info_id:info_id},
            success:function(response){
                data=JSON.parse(response);
                Swal.fire({
                    title:'<strong>Patient Info: ID('+data.id+')</strong>',
                    type: 'info',
                    html: '<b>Ime: </b>'+data.ime+'<br><b>Ime roditelja: </b>'+data.ime_roditelja+'<br><b>Prezime: </b>'+data.prezime+'<br><b>Broj telefona: </b>'+data.br_telefona+'<br><b>JMBG: </b>'+data.jmbg+'<br><b>Doktor: </b>'+data.doktor_id
                })
            }
        });
    });
    });
</script>
</body>
</html>

