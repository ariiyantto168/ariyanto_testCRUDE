<section class="content-header">
    <h1>
        Movie

    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-database"></i>Mater</a>
        <li><a href="{{url('/movie')}}"><i class="fa fa-cubes"></i>Movie</a>
        <li class="active"><i class="fa fa-plus"></i>Create New</a>
    </ol>
</section>

<!-- {{-- main content --}} -->
<section>

    <!-- {{-- default box --}} -->
    <section class="content">

            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Create New</h3> 
              </div>
              <div class="box-body">
                {{ Form::open(array('url' => 'movie/create-new', 'class' => 'form-horizontal')) }}
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Production House</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="sell"  name="idproductionhouse">
                      <option value="">-- select Production House--</option>
                      {{-- $categories ambil dr items controller di function createpage dan index --}}
                      @foreach ($production as $pro)
                      {{-- idcategories dan name ambil dr model dan database --}}
                        <option value="{{$pro->idproductionhouse}}">{{$pro->name}}</option>
                      @endforeach
                    </select>
                  </div>
  
              </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Movie</label>
                  <div class="col-sm-5">
                    <!-- {{-- name:name untuk melempar controller ke database --}} -->
                    <input type="text" class="form-control" placeholder="Name" name="movie" required>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Genre</label>
                    <div class="col-sm-5">
                      <!-- {{-- name:name untuk melempar controller ke database --}} -->
                      <input type="text" class="form-control" placeholder="Name" name="genre" required>
                    </div>
                  </div>

                <hr>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5">
                    <a href="{{url('movie')}}" class="btn btn-warning pull-right">Back</a>
                    <input type="submit" value="Save" class="btn btn-primary">
                  </div>
                </div>
                {{ Form::close() }}
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          
          </section>
        </section>
            {{-- <script type="text/javascript">
            $(document).ready(function() {
             $('.datepicker').datepicker();
            });
          </script> --}}
          



