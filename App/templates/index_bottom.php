            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<footer>
    <div class="container">
    </div>
</footer>
<footer>
    <div class="container"></div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="/App/templates/js/jquery.viewbox.min.js"></script>
            <script>
                $(function(){

                    $('.thumbnail').viewbox();
                    $('.thumbnail-2').viewbox();

                    (function(){
                        var vb = $('.popup-link').viewbox();
                        $('.popup-open-button').click(function(){
                            vb.trigger('viewbox.open');
                        });
                        $('.close-button').click(function(){
                            vb.trigger('viewbox.close');
                        });
                    })();

                });
            </script>
</body>
</html>