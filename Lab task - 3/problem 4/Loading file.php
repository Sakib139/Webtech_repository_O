<!DOCTYPE html>  
 <html>  
      <head>  
        <title></title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
        <div class="container" style="width:500px;">              
                <div class="table-responsive"> 
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Name</th> 
                               <th>E-mail</th>  
                               <th>Day</th>   
                               <th>Month</th>   
                               <th>Year</th>   
                               <th>Gender</th>
                          </tr>  
                          <?php   
                          $data = file_get_contents("data.json");  
                          $data = json_decode($data, true);  
                          foreach($data as $row)  
                          {   
                              echo '<tr>
                               <td>'.$row["name"].'</td>
                               <td>'.$row["e-mail"].'</td>
                               <td>'.$row["day"].'</td>
                               <td>'.$row["month"].'</td>
                               <td>'.$row["year"].'</td>
                               <td>'.$row["gender"].'</td>
                               </tr>'; 
                                
                          }  
                          ?>  
                     </table>  
                   </div>
                 </div>
      </body>  
 </html>  