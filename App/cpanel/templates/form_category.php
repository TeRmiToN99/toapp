<div class="col-sm-12 col-md-12 well" id="form_category">
    <h1>�������� ���������</h1>
    <form action="Post.php?action=Insert&post_type=Category" method="post">
        <div class="form-group">
            <label for="title">�������� ���������</label><br>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="lead">������� ��������</label><br>
            <textarea class="form-control" name="lead" id="lead" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">���������</button>
    </form>
</div>