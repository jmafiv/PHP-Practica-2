<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control bd</title>
</head>
<body>

   
<table  border="1">
  <tr bgcolor="#FF9911">
    <th>Código</th><th>Descripción</th><th>Precio de<br>compra</th><th>Precio de<br>venta</th><th>Margen</th><th>Stock</th><th colspan="4"></th>
  </tr>
  <tr>
    <?php
      //Conexión a la base de datos
      $conexion=new mysqli("localhost","root","","examen");
      $conexion->set_charset("utf8");
      //Hacemos la Select SQL
      $sqlPrincipal="SELECT codigo,descripcion,precio_compra,precio_venta, precio_venta-precio_compra as margen, stock from articulo";
      //En esta conexion hazme esta consulta:
      $resultPrincipal=$conexion->query($sqlPrincipal);
      //Metemos en un array los resultados
      while ($fila=$resultPrincipal->fetch_assoc())
      {
        extract($fila);
        echo "<td>$codigo</td><td>$descripcion</td><td>$precio_compra</td><td>$precio_venta</td><td>$margen</td><td>$stock</td>";
        echo "<td><form action='borrar.php' method='post'>
                  <input id='codigo' name='codigo' type='hidden' value='$codigo'>
                  <button type='submit'>Eliminar</button>
                </form></td>
                <td><form action='modificar.php' method='post'>
                  <input id='codigo' name='codigo' type='hidden' value='$codigo'>
                  <button type='submit'>Modificar</button>
                </form></td>						
                <td><form action='entrada.php' method='post'>
                  <input id='codigo' name='codigo' type='hidden' value='$codigo'>
                  <button type='submit'>Entrada</button>
                </form></td>						
                <td><form action='salida.php' method='post'>
                  <input id='codigo' name='codigo' type='hidden' value='$codigo'>
                  <button type='submit'>Salida</button>
              </form></td>					
              </tr>";
        }
      ?>

<!-- Añadir un nuevo articulo -->

	<tr bgcolor="888EEE"><td><b>Código</b></td><td><b>Descripción</b></td><td><b>Precio de compra</b></td><td><b>Precio de venta</b></td><td></td><td><b>Stock</b></td>
	<td colspan="4"></td></tr>
      <td><input type="text" name="codigo" size="10"></td>
      <td><input type="text" name="descripcion"></td>
      <td><input type="number" min="0" name="precio_compra" step="0.01" style="width: 7em"></td>
      <td><input type="number" min="0" name="precio_venta" step="0.01"style="width: 7em"></td>
      <td></td>
      <td><input type="number" min="0" name="stock" style="width: 7em"></td>
      <td colspan="4">
		    <input type="submit"  name="accion" value="Nuevo articulo">       
      </td>
</tr>
</table>