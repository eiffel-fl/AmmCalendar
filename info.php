<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require('date.php');
        ?>

        <form action="info.php" method="post">
            <select name="month">
                <?php
                foreach (Month::$months as $n => $m) {
                    $n++;
                    echo '<option value="' . $n . '">' . $m . '</option>';
                }
                ?>
            </select>  

            <select name="year">
                <?php
                for ($i = 2015; $i <= 2100; $i++) {
                    echo '<option>' . $i . '</option>';
                }
                ?>
            </select>

            <input type="submit" value="OK">
        </form>
        <table>
            <?php
            $u_month = $_POST['month'];

            $u_year = $_POST['year'];

            echo '<h2>' . Month::$months[$u_month - 1] . '</h2>';
            ?>
            <thead>
                <tr>
                    <?php
                    foreach (Month::$days as $d) {
                        echo '<th>' . $d . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $month = new Month($u_year, $u_month);

                    foreach ($month->dates as $d => $w) {
                        if ($d == 1) {
                            $space = $w - $d;
                            echo '<td colspan="' . $space . '"></td>';
                        }
                        
                        echo '<td>' . $d . '</td>';
                        
                        if ($w == 7) {
                            echo '</tr><tr>';
                        }
                    }
                    
                    if($w != 7){
                        $space = 7 - $w;
                        echo '<td colspan="' . $space . '"></td>';
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </body>
</html>
