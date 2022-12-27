<div class="container">
    <h3>View all image</h3><hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Image id</th>
          <th scope="col">listing id</th>
          <th scope="col">Image</th>
        </tr>
      </thead>
      <tbody>
        @foreach($imageData as $data)
        <tr>
          <td>{{$data->id}}</td>
          <td>{{$data->listing_id}}

          </td>
          <td>
	     <img src="{{ asset('/image/'.$data->filename) }}" class="img-thumbnail">
 
	  </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>