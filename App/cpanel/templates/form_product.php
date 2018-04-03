
<script type="text/javascript">
    function addRow() {
        var selectedval = $("#ingredient_select option:selected").text();
        var ingid = $("#ingredient_select option:selected").attr("id");
        var urlval = $("#ingredient_select option:selected").attr("name");
        var telnum = parseInt($("#product_cart_table").find("div.ing_row:last").attr("id").slice(7)) +1;
        var weightval = $("#weight_input").val();
        $("div#product_cart_table").append(
            "<div id=\"ing_row"+telnum+"\" class=\"ing_row\">" +
            "<div class=\"ing_icon\"><img src=\""+urlval+"\"></div>" +
            "<div class=\"ingredient_selected\">"+selectedval+"</div>" +
            "<div class=\"weight_input\"><input type=\"text\" width=\"120\" class=\"form-control\" id=\"weight"+ingid+"\" name=\"weight"+ingid+"\" value=\""+weightval+"\"></div>" +
            "<div class=\"deletebutton\" onclick=\"deleteRow("+telnum+");\"><a class='btn btn-danger'><i class=\"fa fa-trash-o\"></i></a></div></div>");
    }
    function deleteRow (id) {
        $("div#ing_row" +id).remove();
    }

    function saveIngredients(){
        var ing_array = '...';
    }
</script>
<div class="col-sm-12 col-md-12 well" id="form_products">
    <h1><?=$blocktitle;?></h1>
    <form id="form_product" action="/App/cpanel/post.php?action=<? echo(!empty($product->id) ? 'Update': 'Insert');?>&post_type=Product" method="post" enctype="multipart/form-data">
        <div class="block_info col-sm-6 col-md-6">
            <div class="form-group">
                <label for="title">Заголовок</label><br>
                <input type="text" name="title" id="title" value='<?=$product->title;?>'>
                <input type="text" style="display: none" name="id" id="id" value="<?=$product->id?>">
            </div>
            <div class="form-group">
                <label for="category">Категория</label><br>
                <select class="form-control" name="category_id">
                    <?php foreach ($categories as $category):?>
                        <option <?if($category->id == $_GET['category_id']){echo 'selected'; $vcat = '"'. $category->title . '"';}?> value='<?=$category->id;?>'><?=$category->title?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="lead">Краткое описание</label><br>
                <div class="col-5">
                    <textarea class="form-control" id="lead" name="lead" rows="3"><?=$product->lead;?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="tips">Подсказки</label><br>
                <div id="product_cart_table">
                    <?php if(!empty($ingredient)):?>
                        <? for($i=0; $i < count($ingredient); $i++): ?>
                            <div id="ing_row<?=$i?>" class="ing_row">
                                <div class="ing_icon">
                                    <img src="<?=$ingredient[$i]->url_img?>">
                                </div>
                                <div class="ingredient_selected"><?=$ingredient[$i]->title?></div>
                                <div class="weight_input"><input id="weight<?=$i?>" name="weight<?=$i?>"class="form-control" type="text" value="<?=$ingredient[$i]->weight?>"></div>
                                <div class="deletebutton" onclick="deleteRow(<?=$i?>)"><a class="btn btn-danger"><i class="fa fa-trash-o"></i></a></div>
                            </div>
                        <?endfor; ?>
                    <?else:?>
                            <div id="ing_row1" style="display: none" class="ing_row"></div>
                    <?endif;?>
                </div>
            </div>
            <div class="add_row_ingredient">
                <div class="ingredient_select">
                    <select id="ingredient_select" class="form-control" >
                        <?php foreach($ingredients as $ingredient): ?>
                            <option id="<?=$ingredient->id?>" name="<?=$ingredient->url_img?>"><?=$ingredient->title;?></option>
                        <?endforeach;?>
                    </select>
                </div>
                <div class="weight_input">
                    <input type="text" id="weight_input" class="form-control">
                </div>
                <div class="btn btn-primary" onclick="addRow()"><i class="fa fa-copy"></i>Добавить</div>
            </div>
            <div class="form-group">
                <label for="description">Технология:</label><br>
                <textarea class="form-control" id="description" name="description"rows="5"><?=$product->description;?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" onclick="this.form.submit;"><i class="fa fa-floppy-o"></i></button>
            <button type="submit" class="btn btn-primary" onclick="this.form.submit;">Сохранить и выйти&nbsp;<i class="fa fa-floppy-o"></i></button>
        </div>
        <div class="product_image_block col-sm-4 col-md-4">
            <?php if($product->url_img != ' '):?>
                <h4>Текущая основная фотография: <?=$product->url_img;?></h4>
                <a class="thumbnail" href="<?=$product->url_img;?>" target="_blank"><img src="<?=$product->url_img;?>"></a>
            <?php else: ?>
                <img src="<?=\App\Models\Product::NOIMG?>">
            <?php endif; ?>
            <div class="form-group">
                <label for="url_img">Основное фото</label>
                <input type="file" class="form-control-file" name="url_img" id="url_img">
            </div>
        </div>
    </form>
</div>
