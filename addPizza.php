<?php
include('config/config.inc.php');
include('script/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Dodaj pizzę</h1>

            <?php
            include('script/addPizza-exe.php');
            ?>

            <form name="formPizza" id="formPizza" onsubmit="return validateForm()" method="post">
                <div class="form-group col-md-8 pl-0">
                    <label for="name">Nazwa pizzy: </label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group col-md-8 pl-0">
                    <label for="description">Składniki: </label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>

                <div class="form-group col-md-3 pl-0">
                    <label for="groupid">Kategoria: </label>
                    <select name="groupid" id="groupid" class="form-control">
                        <?php
                        $sql = "SELECT DISTINCT g.id, g.name FROM ddd_menu_pizza_groups g
                            INNER JOIN ddd_menu_pizza p ON (p.groupid = g.id);";
                        $result = $mysqli->query($sql);

                        while ($p = $result->fetch_assoc()) {
                            echo "<option value='" . $p['id'] . "'>" . $p['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-3 pl-0">
                    <label for="sprice">Cena dla małej pizzy: </label>
                    <input type="number" min="0" step="0.01" name="sprice" id="sprice" class="form-control">
                </div>

                <div class="form-group col-md-3 pl-0">
                    <label for="mprice">Cena dla średniej pizzy: </label>
                    <input type="number" min="0" step="0.01" name="mprice" id="mprice" class="form-control">
                </div>

                <div class="form-group col-md-3 pl-0">
                    <label for="lprice">Cena dla dużej pizzy: </label>
                    <input type="number" min="0" step="0.01" name="lprice" id="lprice" class="form-control">
                </div>

                <div class="form-group col-md-3 pl-0 mb-4">
                    <label for="papryczki">Ostrość: </label>
                    <input type="number" min="0" max="4" step="1" name="papryczki" id="papryczki" class="form-control">
                </div>

                <div class="alert alert-danger col-md-8" role="alert" id="validationAlert" style="display: none;">
                    Proszę podać następujące dane:
                </div>

                <button type="submit" class="btn btn-primary">Dodaj</button>
                <a href="index.php"><button type="button" class="btn btn-secondary">Anuluj</button></a>
            </form>

        </div>
    </div>
</div>

<?php
include('script/footer.php');
?>