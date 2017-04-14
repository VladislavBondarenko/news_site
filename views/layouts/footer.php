
        <script src="/template/js/jquery.js"></script>
        <script src="/template/js/bootstrap.min.js"></script>
        <script>
            function addAjax(newsId) {  
                var text = $('#userComment').val();
                text = text.trim();
                if (text != '') {
                    $.post('/comment/add_ajax', {
                        newsId: newsId,
                        text: text
                    }, function(data) {
                        $('#commentsWrapper').html(data);
                    });
                }
            }
            function deleteAjax(newsId,commentId) {
                $.post('/comment/delete_ajax', {
                    newsId: newsId,
                    commentId: commentId
                }, function(data) {
                    $('#commentsWrapper').html(data);
                });
            }
        </script>
    </body>
</html>