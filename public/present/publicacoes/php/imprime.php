<?
$tam_a = sizeof($arquivo);
for($i = 0;$i<$tam_a;$i=$i+3)
{
        for($j = 0;$j<3;$j++)
        {
                switch ($j) {
                case 0:
                        echo "<span class=\"texto\">".strtoupper($arquivo[$i+$j]);
                        break;
                case 1:
                        echo "<b>".$arquivo[$i+$j]."</b>";
                        break;
                case 2:
                        echo $arquivo[$i+$j]."</span><br/><br/>";
                        break;
                }
        }
        //echo "<br/><br/>";
}
?>
