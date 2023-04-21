<html>
   <head>
      <title>View Categories Records</title>
   </head>
   
   <body>
      <br>
      <br><br>
      <br>
      <br>
      <center>

      <table border = "1">
         <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Update</td>
            <td>Delete</td>
            <td>parent_id</td>
         </tr>
         @foreach ($users as $user)
         <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->title }}</td>
            <td><a href = 'edit/{{ $user->id }}'>Update</a></td>
            <td><a href = 'delete/{{ $user->id }}'>Delete</a></td>
            <td>{{ $user->parent_id }}</td>
         </tr>

         
         @endforeach
      </table>
      <h1 ><a href="/">Go Back</a></h1>
      </center>
   </body>
</html>