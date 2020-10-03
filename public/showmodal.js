$(document).on("click", ".open-modalLoginForm", function () {
    var edit = $(this).data('id');
    $(".modal-body #renewData").val( edit );
    // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});