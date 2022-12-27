
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form action="{{ route('image-store') }}" method="POST" enctype="multipart/form-data"> 
    @csrf



    <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="filename">images</label>
                                    <input type="file" id="filename"   name ="filename[]" multiple accept="image/*" class="form-control round">
                                </div>
                            </div>
    <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>
  
</form>        
</div>
  
<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto").remove();
      });
    });
</script>