  @extends('dashboard.global')

  @section('content')
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Buat Surat Berkelakuan Baik</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="/saran">Template Surat Sarana & Gudang </a></li>
        <li class="breadcrumb-item active" aria-current="page">Kartu Permintaan</li>
    </ol>
    </div>

  <br>
  <div class="card mb-4">
    <div class="container col-md-12">
      <br>
      <h3 class="card-title text-center">Surat Rekomendasi</h3>
              <!-- membuat form  -->
              <!-- gunakan tanda [] untuk menampung array  -->
              <form action="proses.php" method="POST">
              <table class="table align-items-center table-flush table-hover">
                
                <thead class="thead-light">
                  <tr>
                      <td><label>Nama</label></td>
                      <td><label>Jenis Kelamin</label></td>
                      <td><label>Alamat</label></td>
                      <td><label>Jurusan</label></td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                  <div class="control-group after-add-more">
                    <tr>
                      <td><input type="text" name="nama[]" class="form-control"></td>
                      <td><input type="text" name="jk[]" class="form-control"></td>
                      <td><input type="text" name="alamat[]" class="form-control"></td>
                      <td><input type="text" name="jurusan[]" class="form-control"></td>
                      <td><button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button></td>
                  </tr>
                  </tbody>

                  </div>

              </table>
                <button class="btn btn-success" type="submit">Submit</button>
              </form>
                <!-- class hide membuat form disembunyikan  -->
                <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
                <div class="copy invisible">
                    <div class="control-group">
                      <tr>
                        <td><label>Nama</label></td>
                        <td><label>Jenis Kelamin</label></td>
                        <td><label>Alamat</label></td>
                        <td><label>Jurusan</label></td>
                        <td>Action</td>
                      </tr>
                    </thead>
                    <tbody>
                    <div class="control-group after-add-more">
                      <tr>
                        <td><input type="text" name="nama[]" class="form-control"></td>
                        <td><input type="text" name="jk[]" class="form-control"></td>
                        <td><input type="text" name="alamat[]" class="form-control"></td>
                        <td><input type="text" name="jurusan[]" class="form-control"></td>
                        <td><button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button></td>
                    </tr>
                    </tbody>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
  </div>
  <br>
  @endsection

  @push('scripts')
  <script type="text/javascript">
      $(document).ready(function() {
        $(".add-more").click(function(){ 
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click",".remove",function(){ 
            $(this).parents(".control-group").remove();
        });
      });
  </script>
  @endpush