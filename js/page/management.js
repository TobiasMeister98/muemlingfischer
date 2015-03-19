$(function(){
  $("#management_category").change(function(){
    window.location='?resource=user&section=management&category=' + this.value
  });
});