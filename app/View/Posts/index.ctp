<h2>問題</h2>

<ul>
<?php foreach ($posts as $post) : ?>
<li id="post_<?php echo h($post['Post']['id']); ?>">
<?php
// debug($post);
// echo h($post['Post']['question_sentence']);
//

echo $post['Post']['id'];
echo $this->Html->link($post['Post']['id'], '/posts/view/'.$post['Post']['id']);
?> 

<!-- <?php echo $this->Html->link('編集', array('action'=>'edit', $post['Post']['id'])); ?>  -->
<!-- <?php
    echo $this->Html->link('削除', '#', array('class'=>'delete', 'data-post-id'=>$post['Post']['id']));
?>
</li> -->
<?php endforeach; ?>
</ul>

<h2>あなたの答え</h2>
<!-- <?php echo $this->Html->link('Add post', array('controller'=>'posts','action'=>'add'));
?> -->

<!-- <script>
$(function() {
    $('a.delete').click(function(e) {
        if (confirm('sure?')) {
            $.post('/posts/delete/'+$(this).data('post-id'), {}, function(res) {
                $('#post_'+res.id).fadeOut();
            }, "json");
        }
        return false;
    });
});
</script> -->