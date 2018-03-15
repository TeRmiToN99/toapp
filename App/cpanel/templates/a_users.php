<div class="col-sm-12 col-md-12 well">
    <div>
        <h3><?=$blocktitle?></h3>
        <?php foreach ($users as $user): ?>
            <ul>
                <li>
                    <p>Логин: <?php echo $user->login;?></p>
                    <p>Имя: <?php echo $user->name;?></p>
                </li>
            </ul>
        <?php endforeach;?>
    </div>
</div>