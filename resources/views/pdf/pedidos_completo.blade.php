<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>PEDIDOS BOOTY</title>
		<style>
			.alinear_derecha {
			
			    text-align: right; 
			}
			.alinear_izquierda {
			
			    text-align: left; 
			}
			.centrar {
			
			    text-align: center; 
			}
			.justificar {
			
			    text-align: justify;
			}
			.oblique {
 				font-style: oblique;
			}
			.columna_extremo {
 				 width:5%;
 				 float:left;
            }

            .columna_medio {
 				 width:90%;
 				 float:left;
            }

            .negrita {
  				font-weight: bold;
			}

			.linea {
				line-height : 20px;
			}

			.linea2 {
				line-height : 0.5px;
			}

			.espacio_letras{
			   letter-spacing:  3px;
			}

			table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

th {
  border: 1px solid #17202A;
  text-align: left;
  padding: 5px;
  width: 10%;
  background-color: #D7BDE2;
}

td {
  border: 1px solid #17202A;
  text-align: left;
  padding: 5px;
  width: 10%;

}


br {

    margin-bottom:10px;
    display:block;
}

div{

width: 700px;

margin-left: 75px;

margin-right: auto;

}

.ancho_dir td {
  min-width: 200px;
  height: 50px;
  border-collapse: separate;
  border-spacing: 5px 2.5px;
}

td,th {
  margin: 5px;
  padding: 2px;
}

.contenidoTabla th {
  font-size: 15px;
}

.contenidoTabla td {
  font-size: 13px;
}
			
		</style>
	</head>
	<body>
		<div class="">

			@foreach ($pedidos as $pedido)

			<table border="1" style="width:80%" style="background-image: url({{public_path('imagenes/logo.png')}}); background-size: 300px 150px; background-repeat: no-repeat; background-position: 50% 32%;"  class="contenidoTabla">
				
			<tr>
			  <th colspan="2" style="text-align: center;">DESTINATARIO</th>
			</tr>

			<tr>
			  <th style="width:10%;" >NOMBRE:</th>
			  <td style="width:70%">{{$pedido->nombres_clientes}} {{$pedido->apellidos_clientes}}</td>
			</tr>
			<tr>
			  <th style="width:10%">CEDULA:</th>
			  <td style="width:70%">{{$pedido->cedula_clientes}}</td>
			</tr>
			<tr>
			  <th style="width:10%">TELEFONO:</th>
			  <td style="width:70%">{{$pedido->telefono_clientes}}</td>
			</tr>
			<tr>
			  <th style="width:10%">CIUDAD:</th>
			  <td style="width:70%">{{$pedido->ciudad_clientes}}</td>
			</tr>
			<tr class="ancho_dir">
			  <th style="width:10%" >DIRECCION:</th>
			  <td style="width:70%">{{$pedido->direccion_clientes}}</td>
			</tr>
			<tr>
			  <th colspan="2" style="text-align: center;">REMITENTE</th>
			</tr>
			<tr>
			  <th style="width:10%;" >NOMBRE:</th>
			  <td style="width:70%">{{$pedido->nombres_dueno_tienda}} {{$pedido->apellidos_dueno_tienda}}</td>
			</tr>
			<tr>
			  <th style="width:10%">CEDULA:</th>
			  <td style="width:70%">{{$pedido->cedula_dueno_tienda}}</td>
			</tr>
			<tr>
			  <th style="width:10%">TELEFONO:</th>
			  <td style="width:70%">{{$pedido->telefono_dueno_tienda}}</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: left; font-size: 10px;">{{$pedido->descripcion}}</td>
			</tr>
				
			</table>

			@endforeach


		</div>

	</body>

</html>



