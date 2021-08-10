
<!DOCTYPE html>
<html>
 <head>
 <title> Data Manage</title>
 </head>
 <body>
 <h1>Database Management</h1>
 <form action="carsmanage.php" method="post">
     <table>
        <tr>
         <th>Product Name:</th>
         <td><input type="text" name="pname" required /></td>
        </tr></br>
         <tr>
         <th>Price:</th>
         <td><input type="text" name="pprice" required /></td>
        </tr></br>
        <tr>
        <th>Stock:</th>
         <td><input type="text" name="stock"  /></td>
        </tr></br>
        <tr>
          <th> Specification: </th>
          <td> <textarea name="text" cols="40" rows="10" > </textarea> </td>
        </tr></br>
        <tr>
          <th> Select Image to upload: </th>
          <td><input type="file" name="image"></td>
        </tr></br>
        <th>Dealer Name:</th>
         <td><input type="text" name="dname" required /></td>
        </tr></br>
        <th>Dealer Address:</th>
         <td><input type="text" name="daddress" required /></td>
        </tr></br>
        <tr>
          <th><label><input type="submit" value="Upload"/></label/><th>
        </tr>
      </table>
  </form>
  <h4> See Product <a href="product.php" >click here</a></h4>

 </body>
</html>