<?php 

$str = '<div class="well">
    <h4>Comments</h4>';

if (!User::isGuest()) { 
    $str .= '<div class="input-group">
        <input type="hidden" name="newsId" value="' . $newsId  . '">
        <input type="text" name="text" id="userComment" class="form-control input-sm chat-input" placeholder="Write your comment here..." />
        <span class="input-group-btn" id="addComment">     
            <a class="btn btn-primary btn-sm" onclick="addAjax(' . $newsId . ')"><span class="glyphicon glyphicon-comment"></span> Add Comment</a>
        </span>
    </div>';
}

if (count($comments)) {

    $str .= '<ul class="list-unstyled">';

    foreach ($comments as $comment) {
            
        $str .= '<hr><strong class="pull-left primary-font">' . $comment['userName'] . '</strong>
        <small class="pull-right text-muted">
           <span class="glyphicon glyphicon-time"></span> ' . $comment['date'];
        if (User::checkAdmin()) {
            $str .= '<span class="btn" onclick="deleteAjax('. $newsId . ',' . $comment['id'] . ')" id="deleteComment" title="delete"> <i class="fa fa-times"></i></span>';
        }
        $str .= '</small></br>
        <li class="ui-state-default">' . $comment['text'] . '</li>
        </br>';
    }    
    
    $str .= '</ul>';

} else {
    $str .= '<hr><h4>no comments yet</h4>';
}

return $str;