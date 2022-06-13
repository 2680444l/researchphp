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

        function get_percentage($total, $number){
            return round(((int)$number*100)/$total, 2);
        }

        function findPercentage($r, $ratings){
            $arr = array_count_values($ratings);
            return $arr[$r]/count($ratings) * 100;
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
        print_r(array_count_values($sectionarr));
        
        ?>
    </center>
</body>
  
</html>