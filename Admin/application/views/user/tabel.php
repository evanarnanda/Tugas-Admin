

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> Admin  </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Heading -->
      <div class="sidebar-heading">
        Admin
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>tabel</span></a>
      </li>

       
       

     
         

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Profil
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard'); ?>" >
          <i class="fas fa-fw fa-user"></i>
          <span>Profil</span>
        </a>
       </li> 
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?= $user['name']; ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?php 
          $browser = $this -> agent -> browser();
          $ip = $this -> input -> ip_address();
           ?>
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="card">
          <div class="card-body">
          <button id="btnAdd" class="btn btn-success" data-toggle="modal"data-target="#myModal">Add Table</button><br>

        <table id="dataTable" class="table display table-bordered">
          <thead>
            
              <tr>
              <th>ID</th>
              
              <th>name</th>
              <th>Email</th>
              <th>Action</th>
              </tr>
            </th>
          </thead>
          <tbody id="showData">
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="javascript:;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Update</a>
            <a href="javascript:;" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">delete</td>
              </tr>
          </tbody>
          <tfoot>
            <tr>
            <th>ID</th>
            
            <th>name</th>
            <th>Email</tH>
            <th>Action</th>
            </tr>

          </tfoot>
        </table>

          </div></div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="myForm" class="form-horizontal" method="post">
          <input type="hidden" name="detectId" values="0">
          <div class="form-group">
            <label for="name" class="label-control col-md-4">Full name</label>
            <div class="col-md-12">
              <input type="text" class="form-control" name="name">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="label-control col-md-4">Email</label>
            <div class="col-md-12">
              <input type="text" class="form-control" name="email">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="label-control col-md-4">Password</label>
            <div class="col-md-12">
              <input type="password" class="form-control" name="password">
            </div>
          </div>
          <div class="form-group">
            <label for="retype-password" class="label-control col-md-4">Retype-Password</label>
            <div class="col-md-12">
              <input type="password" class="form-control" name="retypePassword">
            </div>
          </div>                                
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Are you sure to delete this data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  $(function(){
    //Show All Data
    showAllData();
    //Add New Menu
    $('#btnAdd').click(function(){
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Add New Data');
      $('#myForm').attr('action','<?= base_url('dashboard/addNew') ?>');
    });

    $('#btnSave').click(function(){
      var url = $('#myForm').attr('action');
      var data = $('#myForm').serialize();
      //Validate Form
      var name = $('input[name=name]');
      var email = $('input[name=email]');
      var password = $('input[name=password]');
      var retypePassword = $('input[name=retypePassword]');
      var result = '';
      if(name.val() == ''){
        name.parent().parent().addClass('has-error');
        }else{
        name.parent().parent().removeClass('has-error');
        result += '1';
      }
          if(email.val() == ''){
            email.parent().parent().addClass('has-error');
            }else{
              email.parent().parent().removeClass('has-error');
              result += '2';
        }
            if(password.val() == ''){
                password.parent().parent().addClass('has-error');
              }else{
                password.parent().parent().removeClass('has-error');
                result += '3';
            }
                if(retypePassword.val() == ''){
                  retypePassword.parent().parent().addClass('has-error');
                  }else{
                    retypePassword.parent().parent().removeClass('has-error');
                    result += '4';
                }      

      if(result=='1234'){
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: url,
          data: data,
          async: true,
          dataType: 'json',
          success: function(response){
            if(response.success){
              $('#myModal').modal('hide');
              $('#myForm')[0].reset();
              if(response.type=='add'){
                var type="Added";
              }else if(response.type=='update'){
                var type = "Updated";
              }
              $('#success').html('Data '+type+' Successfully!').fadeIn().delay(4000).fadeOut('slow');
              showAllData();
            }else{
              alert('Error');
            }          
          },
          error: function(){
            alert('Could Not Add Data');
          }
        });
      }
    });

    //Function Edit Data
    $('#showData').on('click','.item-edit',function(){
      var id = $(this).attr('data');
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Edit Data');
      $('#myForm').attr('action','<?= base_url() ?>dashboard/updateData');

      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?= base_url() ?>dashboard/editData',
        data: {id: id},
        async: true,
        dataType: 'json',
        success: function(data){
          $('input[name=name').val(data.name);
          $('input[name=email]').val(data.email);
          $('input[name=password]').val(data.password);
          $('input[name=retypePassword]').val(data.password);
          $('input[name=detectId]').val(data.id);
        },
        error: function(){
          alert('Could not Edit Data');
        }
      });
    });

      //Function Delete
  $('#showData').on('click','.item-delete',function(){
    var id = $(this).attr('data');
    $('#deleteModal').modal('show');

    //Prevent Previous Handler - Unbind
    $('#btnDelete').unbind().click(function(){
      $.ajax({
        type: 'ajax',
        method: 'get',
        async: true,
        url: '<?= base_url() ?>dashboard/deleteData',
        data: {id: id},
        dataType: 'json',
        success: function(response){
          if(response.success){
            $('#deleteModal').modal('hide');
            $('.alert-success').html('Data deleted successfully').fadeIn().delay(4000).fadeOut('slow');
            showAllData();
          }else{
            alert('Error');
          }
        },
        error: function(){
          alert('Error Deleting');
        }
      });
    });
  });



    //Function Read Data
    function showAllData(){
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>dashboard/showAllData',
        async: true,
        dataType: 'json',
        success: function(data){
          var html= '';
          var i;
          for(i=0;i<data.length;i++){
            html += '<tr>' + 
                      '<td>'+data[i].id+'</td>'+
                      
                      '<td>'+data[i].name+'</td>'+
                      '<td>'+data[i].email+'</td>'+
                      '<td>'+
                          '<a href="javascript:;" class="btn btn-info btn-block item-edit" data="'+data[i].id+'">Edit</a> '+
                          '<a href="javascript:;" class="btn btn-danger btn-block item-delete" data="'+data[i].id+'">Delete</a>'+
                      '</td>'+
                      '</tr>';

            }
            $('#showData').html(html);
          },
        error: function(){
          alert('Could not get data from database');
        }
      });
    }
  });




</script>

