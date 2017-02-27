<main>
 <div class="form-block">
    <?if (isset($_GET['action'])&(($_GET['action']=='add'))|($_GET['action']=='edit')){?>
	<form action="category.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" method="post">
		<div class="form-items">
		    <button type="button" class="btn btn-default">x</button>
			<label for="<?=$_GET['action']?>">Введите название категории</label>
			<input type="text" id="<?=$_GET['action']?>" name="title" class="form-item" value="<?=$category['title']?>"><br>
			<input type="submit" class="btn" value="Добавить">
        </div>
	</form>
	<?}?>
 </div>
</main>