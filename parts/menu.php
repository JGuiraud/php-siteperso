<ul>

    <?php
        foreach ($navItems as $item) {
            echo "<li><a href='$item[link]'>$item[title]</a></li>";
        }
    ?>

</ul>