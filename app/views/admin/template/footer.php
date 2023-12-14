<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background: #1A2A46; color: #F9CC41;">
        <h5 class="modal-title" style="text-transform: uppercase;" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        <span aria-hidden="true">&times;</span>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <!-- <div class="modal-footer">
        <span class="tombol"></span><button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div> -->
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Hide this modal and show the first with the button below.
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
      </div>
    </div>
  </div>
</div>
<!-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Open first modal</button> -->

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer" style="background: #333f57;">
    <strong>Copyright &copy; 2023 <a href="#" style="color: white;">Kantin JTI Polinema</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= BASEURL?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= BASEURL?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?= BASEURL?>/assets/dist/js/adminlte.js"></script>
<script src="<?= BASEURL?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- select2 -->
<script src="<?= BASEURL?>/select2/dist/js/select2.min.js"></script>

<script src="<?= BASEURL?>/assets/datatables/datatables.min.js"></script>
<script src="<?= BASEURL?>/assets/datatables/DataTables-1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script>new DataTable('#example');</script>

</body>
</html>
