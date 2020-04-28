<?php
include('config/config.inc.php');
include('script/header.php');

if (isset($_GET['id'])) {

    if (!empty($_GET['id'])) {
        $id = $mysqli->real_escape_string($_GET['id']);

        $sql = "SELECT * FROM ddd_menu_pizza WHERE id like " . $id . ";";
        $result_edit = $mysqli->query($sql)->fetch_assoc();

        if (!$result_edit) {
            header('location: index.php?kom=5');
            exit;
        }

    } else {
        header('location: index.php?kom=4');
        exit;
    }
} else {
    header('location: index.php?kom=4');
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edytuj pizzę</h1>

            <?php
            include('script/editPizza-exe.php');
            ?>

            <form name="formPizza" id="formPizza" onsubmit="return validateForm()" method="post">
                <input type="hidden" name="id" value="<?php echo $result_edit['id']?>">
                <div class="form-group col-md-8 pl-0">
                    <label for="name">Nazwa pizzy: </label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $result_edit['name']?>">
                </div>

                <div class="form-group col-md-8 pl-0">
                    <label for="description">Składniki: </label>
                    <input type="text" name="description" id="description" class="form-control" value="<?php echo $result_edit['description']?>">
                </div>

                <div class="form-group col-md-3 pl-0">
                    <label for="groupid">Kategoria: </label>
                    <select name="groupid" id="groupid" class="form-control">
                        <?php
                        $sql = "SELECT DISTINCT g.id, g.name FROM ddd_menu_pizza_groups g
                            INNER JOIN ddd_menu_pizza p ON (p.groupid = g.id);";
                        $result = $mysqli->query($sql);
                        
                        while ($g = $result->fetch_assoc()) {
                            echo "<option value='" . $g['id'] . "' ";
                            if ($g['id'] == $result_edit['groupid']) echo " selected";
                            echo ">" . $g['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-3 pl-0">
                    <label for="sprice">Cena dla małej pizzy: </label>
                    <input type="number" min="0" step="0.01" name="sprice" id="sprice" class="form-control" value="<?php echo $result_edit['sprice']?>">
                </div>

                <div class="form-group col-md-3 pl-0">
                    <label for="mprice">Cena dla średniej pizzy: </label>
                    <input type="number" min="0" step="0.01" name="mprice" id="mprice" class="form-control" value="<?php echo $result_edit['mprice']?>">
                </div>

                <div class="form-group col-md-3 pl-0">
                    <label for="lprice">Cena dla dużej pizzy: </label>
                    <input type="number" min="0" step="0.01" name="lprice" id="lprice" class="form-control" value="<?php echo $result_edit['lprice']?>">
                </div>

                <div class="form-group col-md-3 pl-0 mb-4">
                    <label for="papryczki">Ostrość: </label>
                    <input type="number" min="0" max="4" step="1" name="papryczki" id="papryczki" class="form-control" value="<?php echo $result_edit['papryczki']?>">
                </div>

                <div class="alert alert-danger col-md-8" role="alert" id="validationAlert" style="display: none;">
                    Proszę podać następujące dane:
                </div>

                <button type="submit" class="btn btn-primary">Aktualizuj</button>
                <a href="index.php"><button type="button" class="btn btn-secondary">Anuluj</button></a>
            </form>

        </div>
    </div>
</div>

<script src="js/skrypty.js"></script>

<?php
include('script/footer.php');
?>