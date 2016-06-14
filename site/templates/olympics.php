<!-- Snippet for HTML head and navbar -->
<?php snippet('header'); ?>

<div class="header-padding">
    <h1 class="olympics-title"><?= $page->text()->html()?></h1>
    <img class="rings" src="/assets/images/rings.png" />
</div>

<div id="chart2" class="olympics-chart"></div>

<script src="/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/js/d3.min.js" type="text/javascript"></script>
<script src="/assets/js/c3.min.js" type="text/javascript"></script>
<script src="/assets/js/clean-blog.min.js" type="text/javascript"></script>
<script src="/assets/js/charts.js" type="text/javascript"></script>

<?php
    $teams = array(
        $page->team_1(),
        $page->team_2(),
        $page->team_3(),
        $page->team_4(),
        $page->team_5(),
        $page->team_6(),
        $page->team_7(),
        $page->team_8(),
        $page->team_9(),
        $page->team_10()
    );
    $columns = array(
        array(
			$page->team_1_game_1(),
			$page->team_2_game_1(),
			$page->team_3_game_1(),
			$page->team_4_game_1(),
			$page->team_5_game_1(),
			$page->team_6_game_1(),
			$page->team_7_game_1(),
			$page->team_8_game_1(),
			$page->team_9_game_1(),
			$page->team_10_game_1()
        ),

        array(
			$page->team_1_game_2(),
			$page->team_2_game_2(),
			$page->team_3_game_2(),
			$page->team_4_game_2(),
			$page->team_5_game_2(),
			$page->team_6_game_2(),
			$page->team_7_game_2(),
			$page->team_8_game_2(),
			$page->team_9_game_2(),
			$page->team_10_game_2()
        ),

        array(
			$page->team_1_game_3(),
			$page->team_2_game_3(),
			$page->team_3_game_3(),
			$page->team_4_game_3(),
			$page->team_5_game_3(),
			$page->team_6_game_3(),
			$page->team_7_game_3(),
			$page->team_8_game_3(),
			$page->team_9_game_3(),
			$page->team_10_game_3()
        ),

        array(
			$page->team_1_game_4(),
			$page->team_2_game_4(),
			$page->team_3_game_4(),
			$page->team_4_game_4(),
			$page->team_5_game_4(),
			$page->team_6_game_4(),
			$page->team_7_game_4(),
			$page->team_8_game_4(),
			$page->team_9_game_4(),
			$page->team_10_game_4()
        ),

        array(
			$page->team_1_game_5(),
			$page->team_2_game_5(),
			$page->team_3_game_5(),
			$page->team_4_game_5(),
			$page->team_5_game_5(),
			$page->team_6_game_5(),
			$page->team_7_game_5(),
			$page->team_8_game_5(),
			$page->team_9_game_5(),
			$page->team_10_game_5()
        )
    );

?>

<script>
    var teams = [
        <?php
            $i = 0;
            $i_max = count($teams);
            foreach ($teams as $team) {
                if ($i == $i_max - 1) {
                    echo "'" . $team . "'];";
                }
                else {
                    echo "'" . $team . "', ";
                }
                $i = $i + 1;
            }
        ?>
    var columns = [
    <?php
        $i = 0;
        $i_max = count($columns);
    ?>
    <?php foreach ($columns as $column): ?>
        <?php
            $j = 0;
            $j_max = count($column);
            echo "[";
            foreach ($column as $item) {
                if ($j == $j_max) {
                    echo "";
                }
                else {
                    echo $item . ", ";
                }
                $j = $j + 1;
            }
            if ($i == $i_max - 1) {
                echo "]];";
            }
            else {
                echo "],";
            }
            $i = $i + 1;
        ?>
    <?php endforeach; ?>
    makeChart(columns, teams);
</script>

<!-- Snipppet for HTML footer and javascripts -->
<?php snippet('footer'); ?>
