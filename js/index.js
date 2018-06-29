/**
 * Created by BravovRM on 17.03.2017.
 */
//var mass=[];
/*    var DateTime = $.ajax({
        url: '../data.json',
        dataType: 'json',
        async: false,
        type: 'POST',
        success: function(data){
            //mass = data.slice(1);
        }
    }).responseJSON;*/


// var start = "20.12.2016";
var graf_ID = '#plan_test';


$.ajax({
    url: '/holidays.json',
    dataType: 'json',
    //async: false,
    type: 'POST',
    success: function (arrHolidays) {
        try {
            localStorage.setItem('arrHolidays', JSON.stringify(arrHolidays));
        } catch (e) {
            if (e == QUOTA_EXCEEDED_ERR) {
                alert('Превышен лимит');
            }
        }
    }
});
$.ajax({
    url: '/data-get.php?m=all',
    dataType: 'json',
    //async: false,
    type: 'POST',
    success: function (DataCurrent) {
id = false;
        try {

	        if (!id) {
		        ids = 0;

		        id =DataCurrent[ids]['id'];

	        }else {
		        for (k in data){
			        if (DataCurrent[k]['id'] == id){
				        ids = k;
			        }else if (DataCurrent[k]['IdPlan'] == id){
				        ids = k;
			        }
		        }
	        }
	        localStorage.removeItem("DataCurrent");
            localStorage.setItem('DataCurrent', JSON.stringify(DataCurrent[ids]['DateTime']));
        } catch (e) {
            if (e == QUOTA_EXCEEDED_ERR) {
                alert('Превышен лимит');
            }
        }
    }
});
 DataCurrentLOC = JSON.parse(localStorage.getItem('DataCurrent'));

$.ajax({
    url: '/data-get.php?m=all',
    // url: 'data-etalon.json',
    dataType: 'json',
    //async: false,
    type: 'POST',
    success: function(data){

const start = data[0].Date;




        titleName = document.getElementById('titleName');

        console.log(titleName);

        titleName.innerHTML = data[0].Name;


        // console.log(data[0].DateTime);

        var arr = data[0].DateTime;
        var arrayYears = arrayYear(start, arr);

        // console.log(arrayYears);

        grafTableHeader(graf_ID, start, arrayYears);
        grafLineData(graf_ID, start, arrayYears);

        $(window).resize(function(){
            //console.log($('.month').outerWidth());
            grafTableHeader(graf_ID, start, arrayYears);
            grafLineData(graf_ID, start, arrayYears);
        });

        try {
            localStorage.setItem('DateTime', JSON.stringify(data[0].DateTime));
            localStorage.setItem('start', JSON.stringify(start));
        } catch (e) {
            if (e == QUOTA_EXCEEDED_ERR) {
                alert('Превышен лимит');
            }
        }
	    getMENUforINDEX(data);
    }
});

start = JSON.parse(localStorage.getItem('start'));




