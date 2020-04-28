<?php
if (isset($_POST['name'])) {

    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['groupid']) && isset($_POST['sprice']) && isset($_POST['mprice']) && isset($_POST['lprice']) && isset($_POST['papryczki'])) {
        $_POST['name'] = $mysqli->real_escape_string($_POST['name']);
        $_POST['description'] = $mysqli->real_escape_string($_POST['description']);
        $_POST['groupid'] = $mysqli->real_escape_string($_POST['groupid']);
        $_POST['sprice'] = $mysqli->real_escape_string($_POST['sprice']);
        $_POST['mprice'] = $mysqli->real_escape_string($_POST['mprice']);
        $_POST['lprice'] = $mysqli->real_escape_string($_POST['lprice']);
        $_POST['papryczki'] = $mysqli->real_escape_string($_POST['papryczki']);

        $sql = "INSERT INTO `pizzeria`.`ddd_menu_pizza`(`groupid`,`name`,`sprice`,`mprice`,`lprice`,`description`,`papryczki`)
            VALUES(" . $_POST['groupid'] . ",'" . $_POST['name'] . "'," . $_POST['sprice'] . "," . $_POST['mprice'] . "," . $_POST['lprice'] . ",'" . $_POST['description'] . "'," . $_POST['papryczki'] . ");";

        $result = $mysqli->real_query($sql);

        if ($result) {
            $mysqli->close();
            header('location: index.php?kom=1');
            exit;
        } else {
            ?>
            <div class="com-md-12">
                <div class="alert alert-danger mt-3" role="alert">
                    Wystąpił problem z zapisem do bazy danych. Skontaktuj się z adminstratorem!
                </div>
            </div>
            <?php
        }
    }
}