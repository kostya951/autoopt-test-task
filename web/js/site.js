$('#search-form').on('submit',function (e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action')+'?'+form.serialize();
    $.ajax({
        type: 'get',
        url: url,
        success: function (data) {
            $('#myGrid').html('');
            $('#myGrid').html(data);
        }
    })
});

$('.view').on('click',function (e) {
    e.preventDefault();
    $.ajax({
        type: 'get',
        url: $(this).attr('href'),
        success: function (data) {
            $('#myGrid').html('');
            $('#myGrid').html(data);
        }
    });
});

$('.add').on('click',function (e) {
    e.preventDefault();
    $.ajax({
        type: 'get',
        url: $(this).attr('href'),
        success: function (data) {
            alert('Добавлено!');
        }
    });
});

$('#basket').on('click',function (e) {
    e.preventDefault();
    $.ajax({
        type: 'get',
        url: $(this).attr('href'),
        success: function (data) {
            $('#myGrid').html('');
            $('#myGrid').html(data);
        }
    });
});