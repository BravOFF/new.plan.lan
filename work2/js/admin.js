$.ajax({
    url: '/data-test.json',
    dataType: 'json',
    //async: false,
    type: 'POST',
    success: function (DataCurrent) {
        try {
            localStorage.setItem('DataCurrent', JSON.stringify(DataCurrent));
        } catch (e) {
            if (e === QUOTA_EXCEEDED_ERR) {
                alert('Превышен лимит');
            }
        }
    }
});
// DataCurrentLOC = JSON.parse(localStorage.getItem('DataCurrent'));


$.ajax({
    url: '/data-get.php?m=all',
    // url: 'data-etalon.json',
    dataType: 'json',
    type: 'GET',
    success: function (data) {

        getTMPL(data[0]);
        /**/
    }
});

jQuery(function ($) {

    $.mask.definitions['n'] = '[0-1]';
    $.mask.definitions['d'] = '[0-3]';

    $('#startDate').mask("d9.n9.9999", {placeholder: "дд.мм.гггг"});
});
