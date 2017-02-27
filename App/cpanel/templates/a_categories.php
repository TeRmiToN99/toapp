<div class="col-sm-12 col-md-12 well">
    <div>
        <h3><?=$blocktitle?></h3>
        <?php foreach ($categories as $category): ?>
            <ul>
                <li>
                    <?php echo $category->title;?>
                </li>
                <li>
                    <?php echo $category->lead;?>
                </li>
            </ul>
        <?php endforeach;?>
    </div>
</div>