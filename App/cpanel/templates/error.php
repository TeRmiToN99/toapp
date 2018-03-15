<? if ($errors != '' ){?>
<div class="col-sm-12 col-md-12 well hidden-xs hidden-sm" id="content">
    <div id="errors" style="color:red;"><?=array_shift($errors)?> </div><hr>
</div>

<?}else{?>
<div class="col-sm-12 col-md-12 well hidden-xs hidden-sm" id="content">
    <div>Ошибок не найдено!</div><hr>
</div>
<?}?>