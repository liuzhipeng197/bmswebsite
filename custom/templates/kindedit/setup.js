//调节静态文章表单编辑器宽度和高度
var editor = new FtEditor("editor");
editor.hiddenName = "remenu";
editor.editorType = "simple";
editor.editorWidth = "600px";
editor.editorHeight = "250px";
editor.show();
//评论
function CheckReForm(form){
  editor.data();//提交
  nl=document.myform.remenu.value;
  if (CheckBody(nl)<=0){alert('内容不能为空');return false;}
  document.myform.submit1.disabled = true;
}