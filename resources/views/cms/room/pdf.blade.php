<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>room_name</th>
              <th>created date</th>
        

            </tr>
          </thead>
          <tbody>

              @foreach ( $rooms as $room )

              <tr>
                  <td>{{ $room->id }}</td>
                  <td>{{ $room->room_name }}</td>
                  <td>{{ $room->created_at }}</td>
                </tr>

              @endforeach

          </tbody>
        </table>
      </div>
  </body>
</html>
