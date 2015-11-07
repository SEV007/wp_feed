<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<?php
      /*
       * @author DeusMFK
       * @version v1.0
       *
       * This code is simple wordpress bot written with php and mysql
       * there is no backend programmed so you have to edit this file directly
       * THE AUTHOR OF THIS CODE IS NOT TAKING ANY LEGAL RESPONSABILITY NOR ANY DAMAGE RESPONSABILITY
       * USE, MODIFY AND SHARE THIS CODE AT YOUR OWN RISK
       *
       * Este codigo contiene un simple bot de wordpress escrito en php y mysql
       * el backend no esta programado asi que el usuario tendra que editar este fichero directamente
       * EL AUTOR DE ESTE CODIGO NO ASUME NINGUNA RESPONSABILIDAD LEGAL NI DE DAÑOS PROVOCADOS POR EL MISMO
       * UTILICE, MODIFIQUE Y COMPARTE ESTE CODIGO BAJO SU PROPIO RIESGO
       */

      // MySQLi Connector
      // Por motivos de seguridad es recomendado cargar el usuario y la contraseña desde una tabla personalizada en la base de datos
      // For security reasons it's recommended to load the user and password from custom table of the database
      $server = "localhost";
      $username = "wpadmin";
      $password = "password";

      // Create connection
      $conn = new mysqli($server, $username, $password);

      // Check connection
      if($conn->connect_error)
      {
          die("Conexión fallida | Connection failed: " . $conn->connect_error);
      }
      echo "Conexión establecida <br />";
      echo "Connection established <br />";
      mysqli_set_charset($conn,'utf8');

      // Select Database
      $selected = mysqli_select_db($conn, "your_wpdatabase")
        or die("Base de datos no establecida | Database setup is missing");

      // END MySQLi Connector

      // Message reader by line
      // Lector de mensajes por linea
      $fr = fopen("./message_db.txt", "r");
      while(!feof($fr))
      {
        $linea = fgets($fr);
        //echo $linea."<br />";
        //QUERY MYSQL 5

        // String split
        // Separador de cadena
        $split = explode(chr(124), $linea);
        //print_r($split);
        $title = $split[0];
        $content = $split[1];

        $name = explode(" ", trim($title));

        //It's recommended to edit this code and add post_date and post_date_gmt to update with now() mysql function
        //Es recomendado editar el siguiente codigo añadiendo post_date and post_date_gmt para actualizar los campos con la funcion mysql now()
        $sql = 'INSERT INTO wp_posts (post_title, post_content, post_name, post_status, post_author, post_type)
        VALUES ("'.$title.'", "'.$content.'", "'.$name[0].'", "publish", 1, "page")';

        /**
          * BE CAREFUL
          * Empty wp_posts table
          * ATENCION
          * Vaciar registros de wp_posts
          *$sql = "DELETE FROM wp_posts";
          **/

        if($conn->query($sql) == TRUE)
        {
          echo "Datos cargados correctamente en la base de datos <br />";
          echo "Data loaded successfuly <br />";
        } else {
          echo "<b> Carga de datos fallida" . $sql . $conn->error . "</b><br />";
          echo "<b> Loading data failed" . $sql . $conn->error . "</b><br />";
        }
      }
      mysqli_close($conn);
      fclose($fr);
?>
