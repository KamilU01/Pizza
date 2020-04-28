<?php
include('config/config.inc.php');
include('script/header.php');
include('script/search_sort.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form name="formSearch" id="formID" method="get">
                <div class="form-row align-items-center">
                    <div class="col-sm-12 col-lg-2 col-xl-3 mr-lg-3 mr-xl-auto">
                        <h1>Pizzeria</h1>
                    </div>
                    <div class="col-sm-8 col-lg-8 col-xl-8 ml-lg-5 ml-xl-auto mb-sm-2 mb-lg-auto mt-lg-auto">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Wpisz szukaną frazę">
                    </div>
                    <div class="col-sm-4 col-lg-1 col-xl-1 mb-lg-auto mb-sm-2 mb-lg-auto mt-lg-auto">
                        <button type="submit" class="btn btn-primary">Szukaj</button></a>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_GET['kom']) && !empty($_GET['kom'])) {
                $kom = $_GET['kom'];

                switch ($kom) {
                    case 1:
                    ?>
                        <div class="form-group col-md-12">
                            <div class="alert alert-success" role="alert">
                                Dane pizzy zostały zapisane!
                            </div>
                        </div>
                    <?php
                        break;
                    case 2:
                    ?>
                        <div class="form-group col-md-12">
                            <div class="alert alert-success" role="alert">
                                Pizza została usunięta z bazy danych!
                            </div>
                        </div>
                    <?php
                        break;
                    case 3:
                    ?>
                        <div class="form-group col-md-12">
                            <div class="alert alert-danger" role="alert">
                                Wystąpił problem z usunięciem z bazy danych. Proszę spróbować później lub skontaktować się z administratorem.
                            </div>
                        </div>
                    <?php
                        break;
                    case 4:
                    ?>
                        <div class="form-group col-md-12">
                            <div class="alert alert-danger" role="alert">
                                Brak ustalonego ID.
                            </div>
                        </div>
                    <?php
                        break;
                    case 5:
                    ?>
                        <div class="form-group col-md-12">
                            <div class="alert alert-danger" role="alert">
                                Wystąpił problem z edycją danych. Proszę spróbować później lub skontaktować się z administratorem.
                            </div>
                        </div>
                    <?php
                        break;
                }
            }
            ?>

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 5%;"><a href="index.php?column=id&order=<?php echo $asc_or_desc; ?>&search=<?php echo $search ?>">ID<i class="fas fa-sort<?php echo $column == 'id' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                        <th style="width: 10%;"><a href="index.php?column=name&order=<?php echo $asc_or_desc; ?>&search=<?php echo $search ?>">Nazwa<i class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                        <th style="width: 35%;"><a href="index.php?column=description&order=<?php echo $asc_or_desc; ?>&search=<?php echo $search ?>">Składniki<i class="fas fa-sort<?php echo $column == 'description' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                        <th style="width: 10%;"><a href="index.php?column=sprice&order=<?php echo $asc_or_desc; ?>&search=<?php echo $search ?>">C.mała<i class="fas fa-sort<?php echo $column == 'sprice' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                        <th style="width: 10%;"><a href="index.php?column=mprice&order=<?php echo $asc_or_desc; ?>&search=<?php echo $search ?>">C.średnia<i class="fas fa-sort<?php echo $column == 'mprice' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                        <th style="width: 10%;"><a href="index.php?column=lprice&order=<?php echo $asc_or_desc; ?>&search=<?php echo $search ?>">C.duża<i class="fas fa-sort<?php echo $column == 'lprice' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                        <th style="width: 10%;"><a href="index.php?column=papryczki&order=<?php echo $asc_or_desc; ?>&search=<?php echo $search ?>">Ostrość<i class="fas fa-sort<?php echo $column == 'papryczki' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                        <th style="width: 10%;">Operacja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($pizza = $result->fetch_assoc()) : ?>
                        <tr>
                            <th><?php echo $pizza['id']; ?></th>
                            <td><?php echo $pizza['name']; ?></td>
                            <td><?php echo $pizza['description']; ?></td>
                            <td><?php echo $pizza['sprice']; ?></td>
                            <td><?php echo $pizza['mprice']; ?></td>
                            <td><?php echo $pizza['lprice']; ?></td>
                            <td><?php for ($i = 0; $i < $pizza['papryczki']; $i++)
                                    echo "<i class=\"fas fa-pepper-hot text-danger\"></i>"; ?></td>
                            <td><a href="editPizza.php?id=<?php echo $pizza['id'];?>">Edytuj</a><br><a href="delPizza.php?id=<?php echo $pizza['id'];?>" onclick="return confirm('Na pewno usunąć?')">Usuń</a></td>
                            
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$result->free();
$mysqli->close();
include('script/footer.php');
?>
