
<?php require_once 'user.php';?>
<?php require_once 'database_controller.php';?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админка</title>
    <link rel="stylesheet" href="admin-css.css">
  </head>
  <body >
    <div class="main-container">
        <div class="card">
            <div class="card-header">
                <h1 class="header-text">Список записавшихся</h1>
            </div>
            <div class="card-body">
                <form action="delete.php" method="POST">
                    <div class="table-container">
                        <table>
                            <tr>
                                <?php $i = 0?>
                                <?php foreach (array_keys(get_class_vars('User')) as $varname):?>
                                <th class="<?php echo ($i%2==0)? 'background-table-color1' : 'background-table-color2' ?>"><?php echo $varname;?></th>
                                <?php $i++?>
                                <?php endforeach; ?>
                            </tr>
                            <?php $controller = new DatabaseController();?>
                            <?php foreach ($controller->loadAllUsers() as $user):?>
                                <?php if ((int)$user->disabled > 0) {continue;}?>
                                <tr>
                                    <?php $i = 0?>
                                    <?php foreach (array_keys(get_class_vars('User')) as $varname):?>
                                        <td class="<?php echo ($i%2==0)? 'background-table-color1' : 'background-table-color2' ?>">
                                        <?php if ($varname == 'disabled') {
                                            echo '<input type="checkbox" name="selected_files[]" value="'.$user->id.'">';
                                        }
                                        else {
                                            echo htmlspecialchars($user->$varname);
                                        }
                                        $i++;
                                        ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>
                    <input type="submit" class="submit-button" value="Удалить">
                </form>
            </div>
            
        </div>
    </div>

  </div>
    
  </body>
</html>