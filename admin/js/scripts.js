tinymce.init({ selector:'textarea' });
$(function() {
    $('#select-all-boxes').click(function (event) {
        if (this.checked) {
            $('.checkboxes').each(function () {
                this.checked = true;
            })
        } else {
            $('.checkboxes').each(function () {
                this.checked = false;
            })
        }
    })
});