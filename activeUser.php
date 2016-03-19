
<!DOCTYPE html>
<html>
<head>
	<title>Active User of Maaya</title>
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    
    
    <style type="text/css">
    	body {
   		display: flex;
    	min-height: 200vh;
    	flex-direction: column;
  		}

  		main {
    	flex: 1 0 auto;
  		}
    </style>
</head>
<body class="light-blue darken-4">
	<header>
	
	</header>
	<main>
	<div class="container">
		
		<div class="row">
		<h2 class="center-align white-text">Active Users of MAAYA</h2>
		</div>
		<div class="col s8 offset-s2">
		<table class="bordered" >
			<thead>
          <tr>
              <th >S.No</th>
              <th >PNR of Passenger</th>
              <th >Mobile Number</th>
              <th >Start Time </th>
              <th>End Time</th>
          </tr>
          </thead>
          <?php
          	function pg_connection_string_from_database_url() {
  				extract(parse_url($_ENV["DATABASE_URL"]));
  				return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
  				}

# Here we establish the connection. Yes, that's all.
  				$pg_conn = pg_connect(pg_connection_string_from_database_url());
# Now let's use the connection for something silly just to prove it works:
  			$query="select * from users where active=1;";
  			$result = pg_query($pg_conn, $query);
  			$counter=1;
  			while ($x = pg_fetch_row($result))
  			{
  				echo '<tr>';
  				echo '<td>'.$counter.'</td>';
  				echo '<td>'.$x[0].'</td>';
  				echo '<td>'.$x[1].'</td>';
  				echo '<td>'.$x[2].'</td>';
  				echo '<td>'.$x[3].'</td>';
  				echo "</tr>";
  				$counter=$counter+1;
  			}
          ?>
          </table>
        
			
		</div>
	</div>
	</main>
	<footer>
	
	</footer>

</body>
</html>

