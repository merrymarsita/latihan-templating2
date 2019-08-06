        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php 
          if($sub_menu):
            echo $sub_menu; 
          else:
            echo $title;
          endif;
          ?></h1>

          <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method='post' action='' class=''  />
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Panjang</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="panjang" name="panjang" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Lebar</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="lebar" name="lebar" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label" id='iniLabel'>Hasil</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="hasil" name="hasil" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                            <button type="button"  class="btn btn-primary" onclick="hitungLuasAjax();">Hitung</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <script type="text/javascript">
      
      //JavaScript Biasa
      function panggilButton(){
          var panjang = document.getElementById('panjang').value;
          var lebar = document.getElementById('lebar').value;
          
          document.getElementById('hasil').value = hitungLuas(panjang, lebar);

          document.getElementById('panjang').value = '';
          document.getElementById('lebar').value = '';

      }

      //Javascript Jquery
      function panggilButtonJquery(){
          var panjang = $('#panjang').val();
          var lebar = $('#lebar').val();
          
          
          $('#hasil').val(hitungLuas(panjang, lebar));

      }

      function hitungLuasAjax(){
        // Ambil Elemet yang mau di Kirim dengan Ajax
        var panjang = $('#panjang').val();
        var lebar = $('#lebar').val();

        //Fungsi Jquery untuk menggunakan Ajax
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('admin/ajax_hitungLuas'); ?>",
            data: {
              var_ajax_panjang: panjang,
              var_ajax_lebar: lebar
            },
            success: function(merry){
              $('#hasil').val(merry);
            }
        });
      }

      function hitungLuas(panjang, lebar){
        var panjang;
        var lebar;
        var luas;

        luas = panjang * lebar
        
        return luas;
      }

      </script>
     
