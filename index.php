<!DOCTYPE html>
<html>
  
<body>
    <center>
        <h1>THE ORIGINAL DATA IN CSV FILE</h1>
        <h3>Interactions</h3>
  
        <?php
        $arr = array();
        $sectionarr = array();
        $handle = fopen("interactions.csv", "r");
        while(!feof($handle))
        {
            $arrOfCSVLine = fgetcsv($handle);
            $section = $arrOfCSVLine[0];
            $sectionName = $arrOfCSVLine[1];
            
            array_push($sectionarr, $section);
            
            if(!array_key_exists($section, $arr)){
                $arr[$section] = $section;
                $arr[$section] = $sectionName;
            }
        
        }

        $percentages = function($arr) {
            $total = count($arr);
            $percentages = [];
            foreach(array_count_values($arr) as $value => $count) {
                $percentages[$value] = round($count / $total, 2)*100;
            }
            return $percentages;    
        };

        echo '<pre>';

        print_r($percentages($sectionarr));
        print_r($arr);

        echo '<pre>';

        
        ?>
    </center>
</body>
  
</html>