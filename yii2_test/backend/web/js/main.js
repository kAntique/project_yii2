$(function(){
    $('#modalButton').click(function() {
        $('#modal').modal('show')
          .find('#modalContent')
          .load($(this).attr('value'));
    });

    $('#pdfButton').click(function() {
        $('#pdfmodal').modal('show')
          .find('#pdfmodalContent')
          .load($(this).attr('value'));
    });
});
