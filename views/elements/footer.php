<?php
$this->userObject = new User();
?>

<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo BASE_URL?>views/js/jquery.js"></script>
    <script src="<?php echo BASE_URL?>views/js/bootstrap.min.js"></script>

    <?php

        if($this->userObject->isAdmin()){
            echo '<script src="'.BASE_URL.'application/plugins/tinyeditor/tiny.editor.packed.js"></script>
    <script>
			var editor = new TINY.editor.edit(\'editor\', {
				id: \'tinyeditor\',
				width: 584,
				height: 175,
				cssclass: \'tinyeditor\',
				controlclass: \'tinyeditor-control\',
				rowclass: \'tinyeditor-header\',
				dividerclass: \'tinyeditor-divider\',
				controls: [\'bold\', \'italic\', \'underline\', \'strikethrough\', \'|\', \'subscript\', \'superscript\', \'|\',
					\'orderedlist\', \'unorderedlist\', \'|\', \'outdent\', \'indent\', \'|\', \'leftalign\',
					\'centeralign\', \'rightalign\', \'blockjustify\', \'|\', \'unformat\', \'|\', \'undo\', \'redo\', \'n\',
					\'font\', \'size\', \'style\', \'|\', \'image\', \'hr\', \'link\', \'unlink\', \'|\'],
				footer: true,
				fonts: [\'Verdana\',\'Arial\',\'Georgia\',\'Trebuchet MS\'],
				xhtml: true,
				cssfile: \'custom.css\',
				bodyid: \'editor\',
				footerclass: \'tinyeditor-footer\',
				toggle: {text: \'source\', activetext: \'wysiwyg\', cssclass: \'toggle\'},
				resize: {cssclass: \'resize\'}
			});
			

		</script>
';
        }
    ?>
<script>
    $href = "<?php echo BASE_URL?>ajax/get_weather/?zip=";
    $("#zip").bind("change paste keyup", function() {
        $zip = $(this).val();
        $url = $href + $zip;
        $('#btnlink').attr('href', $url);
    });

    $(document).ready(function(){
      $('.post-loader').click(function(event){
          event.preventDefault();
          var el = $(this);

          $.ajax({
              url:el.attr('href'),
              type: 'GET',
              success: function(data){
                  el.parent().append(data);
                  el.remove();
              }
          });
      });

        $('.weather-loader').click(function(event){
            event.preventDefault();
            var el = $(this);

            $.ajax({
                url:el.attr('href'),
                type: 'GET',
                success: function(data){
                    $('#weatherbody').html(data);
                }
            });
        });

    });


</script>

  </body>
</html>