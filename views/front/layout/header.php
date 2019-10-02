<div id="slider-wrapper">
    <div class="slides">
        <?php
        $i = 1;
        foreach($slider as $s) {
            echo "<div class='slide slide$i".($i == 1 ? ' active' : '')."'>
                <img src='".BASEASSET."img/slider/$s[cover]' alt='Slider'>
                <div class='content'>
                    <h4>$s[title]</h4>
                    <p>".substr($s['text'], 0, 100)."</p>
                </div>
            </div>";
            $i++;
        }
        ?>
        <div class="black-overlay"></div>
    </div>
</div>