<!DOCTYPE html>
<html>
  
<body>
    <center>
        <h1>THE ORIGINAL DATA IN CSV FILE</h1>
        <h3>Interactions</h3>
  
        <?php
        echo "<html><body><center><table>\n\n";
  
        // Open a file
        $file = fopen("interactions.csv", "r");
  
        // Fetching data from csv file row by row
        while (($data = fgetcsv($file)) !== false) {
            

            // HTML tag for placing in row format
            echo "<tr>";
            foreach ($data as $i) {
                echo "<td>" . htmlspecialchars($i) 
                    . "</td>";
            }
        }
  
        // Closing the file
        fclose($file);
  
        echo "\n</table></center></body></html>";
        ?>
    </center>
</body>
  
</html>