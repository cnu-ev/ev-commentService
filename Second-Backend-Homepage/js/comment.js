// 클릭되거나, 텍스트가 입력되면 placeholder를 숨김
function hidePlaceholder(){
  $('#Textarea-placeholder').hide();
}

$('#CommentArea').click(function(){
  hidePlaceholder();
});
