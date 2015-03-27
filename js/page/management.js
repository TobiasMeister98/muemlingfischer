$(function(){
  $("#management_category").change(function(){
    window.location='?category=' + this.value
  });
});