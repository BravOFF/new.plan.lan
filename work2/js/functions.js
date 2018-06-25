/**
 * Created by BravovRM on 30.03.2017.
 */


Date.prototype.daysInMonth = function() {
    return 33 - new Date(this.getFullYear(), this.getMonth(), 33).getDate();
};


/*
 * Названия месяцев
 * */
var nameMonth = {
    "1": "Январь",
    "2": "Февраль",
    "3": "Март",
    "4": "Апрель",
    "5": "Май",
    "6": "Июнь",
    "7": "Июль",
    "8": "Август",
    "9": "Сентябрь",
    "10": "Октябрь",
    "11": "Ноябрь",
    "12": "Декабрь"
};
/*
 * Создание DOM-элемента
 * */
function creaEll(tag, className, HTML) {
    div = document.createElement(tag);
    div.className = className;
    if (HTML) {
        div.innerHTML = HTML;
    }
    return div;
}
/*
 * Количество элементов в объекте
 * */
function objLength(obj) {
    leng = 0;
    for (s in obj) {
        if (obj[s]) {
            leng++;
        }
    }
    return leng;
}

Node.prototype.remove = function () {
    this.parentElement.removeChild(this);
};

/*
 * Сортировка объекта по полю SORT
 * */
function arr_sort_SORT(a, b) {
    var r = 0;
    if (Number(a.SORT) > Number(b.SORT)) {
        r = 1;
    }
    if (Number(a.SORT) < Number(b.SORT)) {
        r = -1;
    }
    return r;
}
/*
 * Сортировка объекта по полю UID
 * */
function arr_sort_UID(a, b) {
    var r = 0;
    if (Number(a.UID) > Number(b.UID)) {
        r = 1;
    }
    if (Number(a.UID) < Number(b.UID)) {
        r = -1;
    }
    return r;
}
/*
 * Преодразование даты из 19.05.2017 в 19/05/2017
 * */
function convertDate(date) {
    return date.replace(/(\d+)\.(\d+)\.(\d+)/, '$2/$1/$3');
}
/*
 * Преодразование даты из 2017-05-19 в 19.05.2017
 * */
function convertDate2(date) {
    return date.replace(/(\d+)\-(\d+)\-(\d+)/, '$3.$2.$1');
}
/*
 * Получение года '2017' из даты '19/05/2017'
 * */
function getYear(date) {
    return date.replace(/(\d+)\.(\d+)\.(\d+)/, '$3');
}
/*
 * Перевод дней в милисикунды
 * */
function dateToMilisec(date) {
    datSec = Number(date) * (1000 * 3600 * 24);
    return datSec;
}
/*
 * Перевод милисикунд в дни
 * */
function milisecToDate(milisec) {
    datSec = Number(milisec) / (1000 * 3600 * 24);
    return datSec;
}
/*
 * Функция сортировки числового массива
 * arr.sort(compareNumeric);
 * */
function compareNumeric(a, b) {
    if (a > b) return 1;
    if (a < b) return -1;
}
/*
 * Функция переносит дату с субботы и воскресенья на понедельник
 * */
function dateWeekend(date) {
    date = new Date(date);
    if (date.getUTCDay() < 5) {
        return date.valueOf();
    } else if (date.getUTCDay() == 5) {
        return date.valueOf() + dateToMilisec(2);
    } else if (date.getUTCDay() == 6) {
        return date.valueOf() + dateToMilisec(1);
    }
}
/*
 * функция проверки на праздничные дни
 * */
function dateHolidays(date) {
    date = new Date(date);
    //noinspection BadExpressionStatementJS
    status;
    arrHolidays = JSON.parse(localStorage.getItem('arrHolidays'));
    if (arrHolidays['data'][date.getFullYear()]) {
        var year = arrHolidays['data'][date.getFullYear()];
        if (year[date.getMonth() + 1]) {
            var month = year[date.getMonth() + 1];
            if (month[date.getDate()]) {
                var day = month[date.getDate()];
                if (day.isWorking == 3) {
                    return status = date.valueOf();
                } else if (day.isWorking == 0) {
                    return status = date.valueOf();
                } else if (day.isWorking == 2) {
                    dateHolidays(date.valueOf() + dateToMilisec(1));
                }
            } else {
                return status = date.valueOf();
            }
        } else {
            return status = date.valueOf();
        }
    } else {
        return status = date.valueOf();
        return Number(status);
    }
}

/*function dateHolidays(date) {
 date = new Date(date);
 //noinspection BadExpressionStatementJS
 status;
 $.ajax({
 url: '../holidays.json',
 dataType: 'json',
 async: false,
 type: 'POST',
 success: function (arrHolidays) {
 if (arrHolidays['data'][date.getFullYear()]) {
 var year = arrHolidays['data'][date.getFullYear()];
 if (year[date.getMonth() + 1]) {
 var month = year[date.getMonth() + 1];
 if (month[date.getDate()]) {
 var day = month[date.getDate()];
 if (day.isWorking == 3) {
 return status = date.valueOf();
 } else if (day.isWorking == 0) {
 return status = date.valueOf();
 } else if (day.isWorking == 2) {
 dateHolidays(date.valueOf() + dateToMilisec(1));
 }
 } else {
 return status = date.valueOf();
 }
 } else {
 return status = date.valueOf();
 }
 } else {
 return status = date.valueOf();
 }
 }
 });
 return Number(status);
 }*/
/*
 * Функция переносит событие с выходных и праздничных дней на будни.
 * Исползуются функции:
 * dateHolidays()
 * dateWeekend()
 * */
function WeekendAndHolidays(date) {
    date = new Date(date);
    if (Number(dateHolidays(date)) == Number(date.valueOf()) && Number(date.valueOf()) == Number(dateWeekend(date))) {
        return date.valueOf();
    } else {
        return WeekendAndHolidays(date.valueOf() + dateToMilisec(1));
    }
}
/*
 * Разница между двумя датами в днях.
 * */
function diffDate(d1, d2) {
    var date1 = new Date(d1);
    var date2 = new Date(d2);
    var timeDiff = Math.abs(date2.getTime() - date1.getTime());
    diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
    return diffDays;
}
/*
 * Разница между двумя датами в месяцах
 * */
function diffMonth(startDate, endDate) {
    if (startDate < endDate) {
        //startDate = new Date(startDate);
        a = new Date(startDate);
        a.setHours(0, 0, 0, 0);
        b = new Date(endDate);
        b.setHours(0, 0, 0, 0);
        d = a.getDate();
        //console.log(a);
        //console.log(b);
    } else if (startDate > endDate) {
        //startDate = new Date(startDate);
        a = new Date(endDate);
        a.setHours(0, 0, 0, 0);
        b = new Date(startDate);
        b.setHours(0, 0, 0, 0);
        d = a.getDate();
        //console.log(a);
        //console.log(b);
    } else if (startDate == endDate) {
        return 0;
    }
    //устанавливаем начальное время  и сегодняшнее
    //var a = new Date(g, m - 1, d, 0, 0, 0, 0),
    //    b = new Date;
    //b.setHours(0, 0, 0, 0);
    //увеличивая начальное время на 1 месяц вперёд
    //подсчитываем количество полных месяцев до сегодня
    //если дата превышает число дней следующего месяца
    //то месяцем считаем весь следующий  месяц
    //5 января + 1 месяц = 5 февраля, но 31 января + 1 месяц = 28/29 февраля
    for (m = 0; ; m++) {
        g = new Date(a.getFullYear(), a.getMonth() + 2, 0);
        g.getDate() > d && g.setDate(d);
        if (g > b) break;
        a = g
    }
    d = b - a;//оставшееся время за последний неполный месяц, если будет
    d = Math.round(d / 864E5);//количество полных дней в этом времени
    g = Math.floor(m / 12);//сколько полных лет в подсчитанных месяцах
    //m = m % 12;//оставшиеся месяцы от полных лет
    //return [g, m, d];
    return m;
}


/*
 * Функция выводит дату в формате дд.мм.гг
 * */
function formatDate(date) {

    var dd = date.getDate();
    if (dd < 10) dd = '0' + dd;

    var mm = date.getMonth() + 1;
    if (mm < 10) mm = '0' + mm;

    var yy = date.getFullYear() % 100;
    if (yy < 10) yy = '0' + yy;

    return dd + '.' + mm;
}
/*
 * Поиск UID предыдущего родительского элемента
 * dotEnd
 * */
function parentDotEnd(parent_UID, array) {
    arr_par_UID = {};
    //Обработка нескольких parent_UID
    parent_UID = parent_UID.replace(/ /g, "");
    parent_UID = parent_UID.split(/,/);
    if (parent_UID.length == 1) {
        parent_UID = parent_UID[0];
        for (i = 0; i <= array.length - 1; ++i) {
            if (array[i]['UID'] == parent_UID) {
                return dateWeekend(array[i]['dotEnd']);
            }
        }
    } else {
        for (i = 0; i <= parent_UID.length - 1; ++i) {
            for (ii = 0; ii <= array.length - 1; ++ii) {
                if (array[ii]['UID'] == parent_UID[i]) {
                    arr_par_UID[parent_UID[i]] = dateWeekend(array[ii]['dotEnd']);
                }
            }
        }
        var max = 0;
        var maxDotEnd = "";
        for (name in arr_par_UID) {
            if (max < arr_par_UID[name]) {
                max = arr_par_UID[name];
                maxDotEnd = name;
            }
        }
        return arr_par_UID[maxDotEnd];
    }
}
/*
 * Функция формирует массив с датами на основе даты начала и шаблона
 * */
function arrayYear(dateStart, arrEtalon) {
    toDay = new Date();
    toDay.setHours(0, 0, 0, 0);

    var arrYear = [];
    // curDATE = '';
    date = new Date(convertDate(dateStart));
    for (var i = 0; i <= arrEtalon.length - 1; ++i) {
        var elem = arrEtalon[i];
        /*Если элемент Точка Отсчета*/
        if (elem.type == 'dot' && elem.UID == 1) {
            date = new Date(convertDate(dateStart));
            arrYear[i] = {
                'dotStart': date.getTime(),
                'dotEnd': date.getTime(),
                'startDate': date,
                "UID": elem.UID,
                "Name": elem.Name,
                "type": elem.type,
                "Parent_UID": 0
            };
            /*Если элемент Линия*/
        } else if (elem.type == 'line') {

            var datSec = dateToMilisec(elem.Period);
            elemCur = '';
            for (k in DataCurrentLOC) {
                if (Number(DataCurrentLOC[k].UID) == Number(elem.UID)) {
                    elemCur = DataCurrentLOC[k];
                    // console.log(elemCur);
                }
            }

            // console.log(elemCur);
            if (elemCur !== '') {
                // console.log(new Date(convertDate(elemCur.CurDate)));
                dotEND = WeekendAndHolidays(new Date(convertDate(elemCur.CurDate)));
                dotDATE = (new Date(WeekendAndHolidays(new Date(convertDate(elemCur.CurDate)))));

                curDATE = (new Date(WeekendAndHolidays(parentDotEnd(elem.Parent_UID, arrYear) + datSec)));
                curPERIOD = diffDate(WeekendAndHolidays(new Date(convertDate(elemCur.CurDate))),
                    (new Date(WeekendAndHolidays(parentDotEnd(elem.Parent_UID, arrYear) + datSec))));
                curDOT = dateToMilisec(curPERIOD);

            } else {


                dotEND = WeekendAndHolidays(parentDotEnd(elem.Parent_UID, arrYear) + datSec);
                dotDATE = (new Date(WeekendAndHolidays(parentDotEnd(elem.Parent_UID, arrYear) + datSec)));

                dotSTART = WeekendAndHolidays(parentDotEnd(elem.Parent_UID, arrYear));
                toDAY = toDay.valueOf();


                if (toDAY > dotSTART && toDAY > dotEND) {

                    elemCur = toDay;


                    dotEND = toDAY;
                    dotDATE = toDay;

                    curDATE = (new Date(WeekendAndHolidays(parentDotEnd(elem.Parent_UID, arrYear) + datSec)));

                    curPERIOD = diffDate(WeekendAndHolidays(toDay),
                        (new Date(WeekendAndHolidays(parentDotEnd(elem.Parent_UID, arrYear) + datSec))));
                    curDOT = dateToMilisec(curPERIOD);

                    // console.log(elem.UID);
                    // console.log('OK!!!!!!!!!!!');
                    //
                    // console.log('curPERIOD');
                    // console.log(curPERIOD);
                    // console.log('curDOT');
                    // console.log(curDOT);


                } else {
                    curDATE = '';
                    curPERIOD = '';
                    curDOT = '';
                }


                // console.log('toDay');
                // console.log(toDay);
                // console.log(toDay.valueOf());
                // console.log('dotEND');
                // console.log(dotEND);
                // console.log('dotDATE');
                // console.log(dotDATE);


            }


            arrYear[i] = {
                'dotStart': WeekendAndHolidays(parentDotEnd(elem.Parent_UID, arrYear)),
                'dotEnd': dotEND,
                'startDate': (new Date(WeekendAndHolidays(parentDotEnd(elem.Parent_UID, arrYear)))),
                'endDate': dotDATE,
                'curDate': (elemCur !== '') ? curDATE : '',
                'curPeriod': (elemCur !== '') ? curPERIOD : '',
                'curDot': (elemCur !== '') ? curDOT : '',
                'curComm': (elemCur !== '') ? elemCur.Comment : '',
                "UID": elem.UID,
                "Name": elem.Name,
                "type": elem.type,
                "Period": datSec,
                "Parent_UID": elem.Parent_UID
            };

            elemCur = '';

            /*Если элемент Точка*/
        } else if (elem.type == 'dot') {
            arrYear[i] = {
                'dotStart': WeekendAndHolidays(parentDotEnd(elem.Parent_UID, arrYear)),
                'dotEnd': WeekendAndHolidays(parentDotEnd(elem.Parent_UID, arrYear)),
                'startDate': (new Date(WeekendAndHolidays(parentDotEnd(elem.Parent_UID, arrYear)))),
                "UID": elem.UID,
                "Name": elem.Name,
                "type": elem.type,
                //"Period": datSec,
                "Parent_UID": elem.Parent_UID
            };
        }

    }
    return arrYear;
}


function grafTableHeader(graf_ID, start, arrayYear) {
    // Массив конечных точек времени


    console.log(arrayYear);


    var wr = [];
    for (i = 0; i <= arrayYear.length - 1; ++i) {
        wr[i] = arrayYear[i]['dotEnd'];
    }
    wr.sort(compareNumeric);
    var startDate = (new Date(convertDate(start))).getTime();
    var endDate = wr[arrayYear.length - 1];
    // Количество колонок на странице
    // widthEL = 100/13;
    widthEL = 110;
    widthEL2 = 3.6;


//console.log(arrayYear.length);
// Крайние точки времени для построение графика
//console.log((new Date(startDate)).getFullYear()); // год начали
//console.log(((new Date(endDate))).getFullYear()); // год конец
//console.log((new Date(startDate)).getMonth()); // месяц конец
//console.log((new Date(endDate)).getMonth()); // месяц конец
//console.log(diffDate(startDate, endDate)); // разница в днях
//console.log(diffMonth(startDate, endDate)); // разница в месяцах

    var countMonth;
    if ((diffMonth(startDate, endDate) + 3) <= 13) {
        countMonth = 13;

    } else {
        countMonth = diffMonth(startDate, endDate) + 3;
    }
    var PLAN = $(graf_ID);
    var plan_graf_years = creaEll('div', 'plan-graf-years', '');
    var plan_graf_months = creaEll('div', 'plan-graf-months', '');
    var plan_graf_lines = creaEll('div', 'plan-graf-lines', '');
    var plan_graf = plan_graf_years.outerHTML + plan_graf_months.outerHTML + plan_graf_lines.outerHTML;
    if ($(graf_ID + ' .plan-graf')) {
        $(graf_ID + ' .plan-graf').remove();
        //console.log($('#m-'+ssm+'-'+s).length);
    }
    PLAN.append(creaEll('div', 'plan-graf', plan_graf));

    var yS = (new Date(startDate)).getFullYear();
    var mS = (new Date(startDate)).getMonth();
    var yE = (new Date(endDate)).getFullYear();
    var y = {};
    var m = [];
    for (i = 0; (i + yS) <= yE; i++) {
        ew = i + yS;
        if ((i + yS) == yS) {
            for (ii = 0; (ii + mS) <= 11; ii++) {
                m.push(ii + mS + 1);
            }
            y[ew] = m;
            m = [];
        } else {
            for (ii = 0; ii <= 11; ii++) {
                m.push(ii + 1);
            }
            y[ew] = m;
            m = [];
        }
    }

    var realDate = new Date();
    var realYear = realDate.getFullYear();

    countM = 0;
    arrCountM = [];
    allDAYS = 0;

    for (s in y) {
        fm = y[s];
        console.log(s);
        // console.log(y[s]);
fddg = 0;
        for (tt in fm) {
            tes = new Date(s, fm[tt]-1, 5).daysInMonth();

            // console.log(fm[tt]+' - '+tes);
            fddg = tes + fddg;
        }
        allDAYS = fddg + allDAYS;
        console.log('количество  - '+fddg);
        console.log('ширина  - '+widthEL2 * fddg);


        // widthELYear = widthEL * y[s].length;


        widthELYear = widthEL2 * fddg;

        // console.log(widthELYear);
        // console.log(widthELYear2);

        div = document.createElement('div');
        if (s < realYear) {
            div.className = 'year old';
        } else {
            div.className = 'year';
        }
        div.id = 'y-' + s;


        // div.style.width = widthELYear + '%';
        div.style.width = widthELYear + 'px';
        // div.style.width = widthELYear2 + 'px';


        div.innerHTML = '<p>' + s + '</p>';
        for (ss in fm) {

            // console.log(fm[ss]);

            yui = widthEL2 * (new Date(s, fm[ss] - 1, 5).daysInMonth());

            countM++;

            arrCountM[countM - 1] = yui;

            ssm = fm[ss];
            divM = document.createElement('div');
            if (s < realYear) {
                divM.className = 'month old';
            } else {
                divM.className = 'month';
            }
            divM.id = 'm-' + ssm + '-' + s;


            // divM.style.width = widthEL + '%';
            // divM.style.width = widthEL  + 'px';
            divM.style.width = yui  + 'px';



            console.log(fm[ss]);
            console.log(new Date(s, fm[ss] - 1, 5).daysInMonth());
            console.log(widthEL2);
            console.log('---------');
            console.log(widthEL);
            console.log(widthEL2 * (new Date(s, fm[ss] - 1, 5).daysInMonth()));
            console.log('---------');


            divM.innerHTML = '<p>' + nameMonth[ssm] + '</p>';
            if ($('#m-' + ssm + '-' + s)) {
                $('#m-' + ssm + '-' + s).remove();
                //console.log($('#m-'+ssm+'-'+s).length);
            }
            $(graf_ID + ' .plan-graf .plan-graf-months').append(divM);
        }
        if ($('#y-' + s)) {
            $('#y-' + s).remove();
            //console.log($('#m-'+ssm+'-'+s).length);
        }
        $(graf_ID + ' .plan-graf .plan-graf-years').append(div);
    }




    // console.log(widthEL2);
    // console.log(allDAYS);
    // console.log(countM);
    // console.log(countMonth);

    // widthALL = widthEL * countM;

    widthALL = widthEL2 * allDAYS;


    console.log('////////////////////');
    console.log(widthALL);
    console.log(countM);
    console.log(arrCountM);
    console.log('////////////////');
    // console.log(widthALL2);

    $(graf_ID + ' .plan-graf').css("width", widthALL + 'px');


    for (line in arrayYear) {
        lineOBJ = arrayYear[line];

        divSetka = document.createElement('div');
        divSetka.className = 'line-setka';

        var rty = '';
        // for (i = 1; i <= countMonth; i++) {
        for (i = 1; i <= countM; i++) {
            divSetkaEl = document.createElement('div');


            // divSetkaEl.style.width = widthEL + '%';
            divSetkaEl.style.width = arrCountM[i-1] + 'px';


            rty = rty + divSetkaEl.outerHTML;
        }
        divSetka.innerHTML = rty;

        divLine = document.createElement('div');
        divLine.className = 'line';
        divLine.id = lineOBJ.type + '-' + lineOBJ.UID;
        //divLine.innerHTML=divSetka.innerHTML;

        divData = document.createElement('div');
        divData.className = 'line-data';
        divLine.innerHTML = divSetka.outerHTML + divData.outerHTML;

        $(graf_ID + ' .plan-graf .plan-graf-lines').append(divLine);
    }
}

function grafLineData(graf_ID, start, arrayYear) {

    //console.log(arrayYear);


// Массив конечных точек времени

    var wr = [];
    for (i = 0; i <= arrayYear.length - 1; ++i) {
        wr[i] = arrayYear[i]['dotEnd'];
    }
    wr.sort(compareNumeric);
    var startDate = new Date(convertDate(start));
    var sD = new Date(startDate.getFullYear(), startDate.getMonth(), 1);

    var endDate = wr[arrayYear.length - 1];
    var grafWidthMonth = $(graf_ID + ' .plan-graf .plan-graf-months .month').outerWidth();
    // var grafWidthDay = grafWidthMonth / 30;
    var grafWidthDay = 3.618;

    // console.log(grafWidthMonth);
    // console.log(grafWidthDay);
    //console.log(startDate);
    //console.log(startDate.getMonth());
    //console.log(startDate.getDate());
    // console.log(sD);


    //линия с текущей датой
    ToDAY = document.createElement('div');
    ToDAY.className = 'today';

    toDay = new Date();
    toDay.setHours(0, 0, 0, 0);

    leftDiffDat = (diffDate(sD, toDay) * grafWidthDay);
    ToDAY.style.left = leftDiffDat + 'px';
    $(graf_ID + ' .plan-graf').append(ToDAY);

    // console.log(sD);
    // console.log(toDay);

    // console.log(grafWidthMonth);

    //отступ в рх
    //var leftDiffDat = (diffDate(sD, startDate)*grafWidthDay);
    //console.log(leftDiffDat);

    for (i in arrayYear) {
        Line = arrayYear[i];
        leftDiffDat = (diffDate(sD, Line.dotStart) * grafWidthDay);
        widthDiffDat = (diffDate(Line.dotStart, Line.dotEnd) * grafWidthDay);
        x=Math.floor(grafWidthDay);
        // console.log('leftDiffDat');
        // console.log(diffDate(sD, Line.dotStart));
        // console.log(grafWidthDay);
        // console.log(x);
        // console.log(leftDiffDat);



         // console.log('----------------');
         // console.log( 'Line.Period: ' + Line.Period);
         // console.log( milisecToDate(Line.Period));
         // console.log(Line);
         // console.log(Line.Name);
         // console.log(Line.startDate);
         // console.log(Line.endDate);
         console.log('----------------');

        if (Line.type == 'dot') {

            divDot = document.createElement('div');
            divDotText = document.createElement('div');
            divDot.className = 'data-dot';
            divDotText.className = 'dot-text';
            divDot.style.left = leftDiffDat + 'px';
            divDotText.style.left = leftDiffDat + 26 + 'px';
            divDotText.innerHTML = '<p>' + formatDate(Line.startDate) + ' - ' + Line.Name + '</p>';
            //divDotText.innerHTML = '<p><span>'+formatDate(Line.startDate)+'</span> - '+Line.Name+'</p>';
            $('#' + Line.type + '-' + Line.UID + ' .line-data').append(divDot);
            $('#' + Line.type + '-' + Line.UID + ' .line-data').append(divDotText);

        } else if (Line.type == 'line') {


            var sDaysLeft = String(milisecToDate(Line.Period));
            var sDaysText = "дней"; // по умолчанию выводим «дней»
            var nDaysLeftLength = sDaysLeft.length;
            if (sDaysLeft.charAt(nDaysLeftLength - 2) != "1"){
                if (sDaysLeft.charAt(nDaysLeftLength - 1) == "2" || sDaysLeft.charAt(nDaysLeftLength - 1) == "3" || sDaysLeft.charAt(nDaysLeftLength - 1) == "4"){
                    sDaysText = "дня";
                }else if (sDaysLeft.charAt(nDaysLeftLength - 1) == "1"){
                    sDaysText = "день";
                }
            }
            console.log('----------------');
            console.log( 'Line.Period: ' + Line.Period);
            console.log( milisecToDate(Line.Period) + " " + sDaysText);

            divLine = document.createElement('div');
            divLineText = document.createElement('div');
            divLine.className = 'data-line';
            divLineText.className = 'line-text';
            divLine.style.left = leftDiffDat + 'px';
            divLine.style.width = widthDiffDat + 'px';
            divLine.setAttribute('data-toggle', 'modal');
            divLine.setAttribute('data-target', '#modal-' + Line.UID);
            divLine.innerHTML = milisecToDate(Line.Period) + " " + sDaysText;



            if (Line.curPeriod !== '') {
                divLine.style.borderRight = Line.curPeriod * grafWidthDay + 'px solid #BE2E21';
            }

            divLineText.style.left = widthDiffDat + leftDiffDat + 'px';
            //divLineText.innerHTML = '<ul><li>'+formatDate(Line.startDate)+'</li><li>'+formatDate(Line.endDate)+'</li></ul> <p>'+Line.Name+'</p>';
            //divLineText.innerHTML = '<p>'+formatDate(Line.endDate)+' - '+Line.Name+'</p>';
            divLineText.innerHTML =
                '<p>' + Line.endDate.getDate() + '.' + (Line.startDate.getMonth() + 1) + ' - ' + Line.Name + '</p>';
            divLineText.innerHTML = '<p>' + formatDate(Line.endDate) + ' - ' + Line.Name + '</p>';

            if (Line.curDate !== '') {

                dd = Line.endDate.getDate();
                if (dd < 10) dd = '0' + dd;
                mm = Line.endDate.getMonth() + 1;
                if (mm < 10) mm = '0' + mm;

                curDateInput = Line.endDate.getFullYear() + '-' + mm + '-' + dd;
                // console.log(curDateInput);
            } else {
                curDateInput = '';
            }

            // curDateInput = Line.curDate.getDate();


            divModal = '<div class="modal fade" id="modal-' + Line.UID +
                '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel">' +
                Line.Name + '</h4></div><div class="modal-body"><form role="form" name="form' + Line.UID +
                '" id="form-' + Line.UID + '"><input type="hidden" name="UID" value="' + Line.UID +
                '"><div class="form-group"><label for="cutDate">Дата</label><input name="curDate" type="date" class="form-control curDate" id="cutDate" placeholder="гггг-мм-дд" value="' +
                curDateInput +
                '"></div><div class="form-group"><label for="cutComment">Коментарий</label><textarea name="curComm" class="form-control" id="cutComment" rows="3">' +
                Line.curComm +
                '</textarea></div></form></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button><button id="save-' +
                Line.UID + '" type="button" form="form-' + Line.UID + '" onclick="saveCur(form' + Line.UID +
                '); return false" class="btn btn-primary">Сохранить изменения</button></div></div></div></div>';


            $('#' + Line.type + '-' + Line.UID + ' .line-data').append(divLine);
            $('#' + Line.type + '-' + Line.UID + ' .line-data').append(divLineText);
            $('#' + Line.type + '-' + Line.UID + ' .line-data').append(divModal);
        }
    }
}

function saveCur(FORM) {
    console.log(FORM.UID.value);
    // console.log(FORM.curDate.value);
    // console.log(FORM.curComm.value);
    // console.log(convertDate2(FORM.curDate.value));
    sUID = [];
    if (convertDate2(FORM.curDate.value)) {

        // if (FORM.curDate.value !== ''){
        //     console.log('-------------');console.log('-------------');console.log('-------------');

        if (DataCurrentLOC.length == 0) {
            console.log(DataCurrentLOC.length);
            console.log(DataCurrentLOC.length);
            console.log(DataCurrentLOC.length);
            sUID.status = "N";
            sUID.key = 0;
        } else {


            for (k in DataCurrentLOC) {
                if (FORM.UID.value == DataCurrentLOC[k].UID) {
                    sUID.status = 'Y';
                    sUID.key = k;
                    break;
                } else {
                    console.log(DataCurrentLOC.length);
                    sUID.status = "N";
                    sUID.key = DataCurrentLOC.length;
                }
            }

        }


        // console.log(DataCurrentLOC.length);
        // console.log(sUID);

        DataCurrentLOC[sUID.key] = {
            "UID": FORM.UID.value,
            "Comment": FORM.curComm.value,
            "CurDate": convertDate2(FORM.curDate.value)
        };

        try {
            localStorage.setItem('DataCurrent', JSON.stringify(DataCurrentLOC));
        } catch (e) {
            if (e == QUOTA_EXCEEDED_ERR) {
                alert('Превышен лимит');
            }
        }
        // console.log(DataCurrentLOC);
        $.ajax({
            url: '/data-current-save.php',
            dataType: 'json',
            data: {data: DataCurrentLOC},
            //async: false,
            type: 'POST',
            success: function (Data) {

                // console.log(Data);

            }
        });
    } else {
        console.log('-------------');
        console.log('Нет даты');
        console.log('-------------');
        if (DataCurrentLOC.length !== 0) {
            console.log('есть');

            for (k in DataCurrentLOC) {
                if (FORM.UID.value == DataCurrentLOC[k].UID) {
                    sUID.status = 'Y';
                    sUID.key = k;
                    DataCurrentLOC.splice(sUID.key, 1);
                    break;
                }
            }


        } else {
            console.log('нету');
        }
        console.log(DataCurrentLOC);
        try {
            localStorage.setItem('DataCurrent', JSON.stringify(DataCurrentLOC));
        } catch (e) {
            if (e == QUOTA_EXCEEDED_ERR) {
                alert('Превышен лимит');
            }
        }
        // console.log(DataCurrentLOC);
        $.ajax({
            url: '/data-current-save.php',
            dataType: 'json',
            data: {data: DataCurrentLOC},
            //async: false,
            type: 'POST',
            success: function (Data) {

                // console.log(Data);

            }
        });
    }
    console.log('#modal-' + FORM.UID.value);

    $('#modal-' + FORM.UID.value).modal('hide');

    setTimeout(function () {
        var arr = JSON.parse(localStorage.getItem('DateTime'));
        var arrayYears = arrayYear(start, arr);

        // console.log(arrayYears);


        grafTableHeader(graf_ID, start, arrayYears);
        grafLineData(graf_ID, start, arrayYears);
    }, 500);


    // console.log('-------------');
    // console.log(JSON.parse(localStorage.getItem('DataCurrent')));
    //
    // console.log('-------------');

}

function getTMPL(data) {

    const Date = data[0].Date;
    const Name = data[0].Name;
    const DateTime = data[0].DateTime;

    DateTime.sort(arr_sort_SORT);

    formTMPL.titleName.value = Name;
    formTMPL.startDate.value = Date;
    // FORM.curDate.value


    // console.log('Date: ' + Date);
    // console.log('Name: ' + Name);
    // console.log('DateTime: ');
    // console.log(DateTime);

    dDTE = '';
    delEL = '';
    labelName = {};
    labelName.Name = 'Название';
    labelName.UID = 'ID элемента';
    labelName.Period = 'Длительность';
    labelName.Parent_UID = 'Родитель';
    labelName.type = 'Тип';
    labelName.SORT = 'Сортировка';

    selectEL = {};
    selectEL.line = 'Линия';
    selectEL.dot = 'Точка';

    for (i = 0; i < DateTime.length; i++) {
        if (DateTime[i].type == 'dot') {
            DateTime[i].Period = '';
        }

        divDateTmeElement = document.createElement('div');
        divDateTmeElement.className = 'DateTmeElement';
        divDateTmeElement.setAttribute('id', 'Element-' + DateTime[i].UID);

        dDG = '';
        for (key in labelName) {

            divDateGroup = document.createElement('div');
            divDateGroup.className = 'form-group ' + key;

            labelEL = document.createElement('label');
            labelEL.setAttribute('for', key + '-' + DateTime[i].UID);
            labelEL.innerText = labelName[key];
            divDateGroup.appendChild(labelEL);

            if (key == 'type') {

                inputEL = document.createElement('select');
                inputEL.className = 'form-control ' + key;
                inputEL.className = 'form-control ' + key;
                inputEL.setAttribute('id', key + '-' + DateTime[i].UID);
                inputEL.setAttribute('name', key + '-' + DateTime[i].UID);

                // inputEL.setAttribute('required');
                o = 0;
                for (k in selectEL) {
                    if (DateTime[i].type == k) {
                        inputEL.options[o] = new Option(selectEL[k], k, true, true);
                    } else {
                        inputEL.options[o] = new Option(selectEL[k], k);
                    }
                    o++;
                }
            } else {
                inputEL = document.createElement('input');
                inputEL.className = 'form-control ' + key;
                inputEL.setAttribute('id', key + '-' + DateTime[i].UID);
                inputEL.setAttribute('name', key + '-' + DateTime[i].UID);
                inputEL.setAttribute('type', 'text');
                inputEL.setAttribute('value', DateTime[i][key]);
                if (DateTime[i].type == 'dot' && key == 'Period') {
                    inputEL.disabled = true;
                } else if (key == 'UID') {
                    inputEL.disabled = true;
                }
            }

            divDateGroup.appendChild(inputEL);

            dDG = dDG + divDateGroup.outerHTML;

        }

        delEL = document.createElement('div');
        delEL.className = "ElementDelete";
        delEL.setAttribute('onclick', 'deleteElementField(' + DateTime[i].UID + ')');
        delEL.innerHTML = 'X';
        // console.log(delEL.outerHTML);

        divDateTmeElement.innerHTML = delEL.outerHTML + dDG;
        dDTE = dDTE + divDateTmeElement.outerHTML;
    }
    document.getElementsByClassName('DateTime')[0].innerHTML = dDTE;
    try {
        localStorage.setItem('DataTMPL', JSON.stringify(data));
        localStorage.setItem('DateTime', JSON.stringify(DateTime));
        localStorage.setItem('Date', JSON.stringify(Date));
        localStorage.setItem('Name', JSON.stringify(Name));
    } catch (e) {
        if (e === QUOTA_EXCEEDED_ERR) {
            alert('Превышен лимит');
        }
    }

}

function saveTMPL(FORM) {

    dataEtalon = {};
    DateTime = [];
    dataEtalon.Name = FORM.titleName.value;
    dataEtalon.Date = FORM.startDate.value;
    dataEtalon.DateTime = [];
    arrElems = [];
    arrElems = FORM.getElementsByClassName('DateTmeElement');


    // console.log(arrElems.length);
    // console.log(FORM['UID-1'].value);
    // console.log(arrElems);

    for (i = 0; i < arrElems.length; i++) {
        elementField = {};
        elementField.UID = '';
        elementField.Name = '';
        elementField.Period = '';
        elementField.type = '';
        elementField.Parent_UID = '';
        elementField.SORT = '';

        ELEM = arrElems[i];
        ID = ELEM.id.split('-');

        UID = FORM['UID-' + ID[1]].value;
        Name = FORM['Name-' + ID[1]].value;
        Period = FORM['Period-' + ID[1]].value;
        type = FORM['type-' + ID[1]].value;
        Parent_UID = FORM['Parent_UID-' + ID[1]].value;
        SORT = FORM['SORT-' + ID[1]].value;


        elementField.UID = UID;
        elementField.Name = Name;
        elementField.Period = Period;
        elementField.type = type;
        elementField.Parent_UID = Parent_UID;
        elementField.SORT = SORT;

        dataEtalon.DateTime[i] = elementField;


        // console.log('=======================');
        // console.log(ID);
        // console.log(elementField);
        // console.log('=======================');
        /*   console.log('UID: '+UID);
         console.log('Name: '+Name);
         console.log('Period: '+Period);
         console.log('type: '+type);
         console.log('Parent_UID: '+Parent_UID);
         console.log('SORT: '+SORT);
         console.log('=======================');*/
        // console.log(ELEM);
    }

    // console.log('---------------');
    // console.log(dataEtalon.DateTime);
    // console.log('---------------');

    // console.log(FORM.titleName.value);
    // console.log(FORM.startDate.value);

    // console.log(JSON.parse(localStorage.getItem('DataTMPL')));

    dataEtalon.DateTime.sort(arr_sort_SORT);

    arrOK = [];
    arrOK[0] = dataEtalon;

    localStorage.setItem('DataTMPL', JSON.stringify(arrOK));

    // console.log(JSON.parse(localStorage.getItem('DataTMPL')));
    // console.log('---------------');
    // console.log(dataEtalon.DateTime);
    // console.log('---------------');

    $.ajax({
        url: '/data-etalon-save.php',
        dataType: 'json',
        data: {data: arrOK},
        //async: false,
        type: 'POST',
        success: function () {
            // console.log(arrOK);
            getTMPL(arrOK);

        }
    });
    // console.log(arrOK);
    getTMPL(arrOK);
}


function applyTMPL(FORM) {

    dataEtalon = {};
    DateTime = [];
    dataEtalon.Name = FORM.titleName.value;
    dataEtalon.Date = FORM.startDate.value;
    dataEtalon.DateTime = [];
    arrElems = [];
    arrElems = FORM.getElementsByClassName('DateTmeElement');

    // console.log(arrElems.length);
    // console.log(FORM['UID-1'].value);
    // console.log(arrElems);

    for (i = 0; i < arrElems.length; i++) {
        elementField = {};
        elementField.UID = '';
        elementField.Name = '';
        elementField.Period = '';
        elementField.type = '';
        elementField.Parent_UID = '';
        elementField.SORT = '';

        ELEM = arrElems[i];
        ID = ELEM.id.split('-');

        UID = FORM['UID-' + ID[1]].value;
        Name = FORM['Name-' + ID[1]].value;
        Period = FORM['Period-' + ID[1]].value;
        type = FORM['type-' + ID[1]].value;
        Parent_UID = FORM['Parent_UID-' + ID[1]].value;
        SORT = FORM['SORT-' + ID[1]].value;

        elementField.UID = UID;
        elementField.Name = Name;
        elementField.Period = Period;
        elementField.type = type;
        elementField.Parent_UID = Parent_UID;
        elementField.SORT = SORT;

        dataEtalon.DateTime[i] = elementField;

        // console.log('=======================');
        // console.log(ID);
        // console.log(elementField);
        // console.log('=======================');
        /*   console.log('UID: '+UID);
         console.log('Name: '+Name);
         console.log('Period: '+Period);
         console.log('type: '+type);
         console.log('Parent_UID: '+Parent_UID);
         console.log('SORT: '+SORT);
         console.log('=======================');*/
        // console.log(ELEM);
    }

    // console.log('---------------');
    // console.log(dataEtalon.DateTime);
    // console.log('---------------');

    // console.log(FORM.titleName.value);
    // console.log(FORM.startDate.value);

    // console.log(JSON.parse(localStorage.getItem('DataTMPL')));

    dataEtalon.DateTime.sort(arr_sort_SORT);

    arrOK = [];
    arrOK[0] = dataEtalon;

    localStorage.setItem('DataTMPL', JSON.stringify(arrOK));

    // console.log(JSON.parse(localStorage.getItem('DataTMPL')));
    // console.log('---------------');
    // console.log(dataEtalon.DateTime);
    // console.log('---------------');

    // console.log(arrOK);
    getTMPL(arrOK);
}


function createElementField() {

    arrDataFields = document.getElementsByClassName('DateTmeElement');
    lengthDataField = document.getElementsByClassName('DateTmeElement').length;
    // console.log(document.getElementsByClassName('DateTmeElement'));

    // console.log(arrDataFields.length);
    arrUID = [];
    for (i = 0; i < arrDataFields.length; i++) {
        arrUID[i] = Number(arrDataFields[i].id.split('-')[1]);

    }
    // DataAtalonLOC = JSON.parse(localStorage.getItem('DataTMPL'));
    arrUID.sort(compareNumeric);
    UID = Number(arrUID[arrUID.length - 1]) + 1;
    // console.log(arrUID[arrUID.length - 1]);

    divDateTmeElement = document.createElement('div');
    divDateTmeElement.className = 'DateTmeElement';
    divDateTmeElement.setAttribute('id', 'Element-' + UID);
    // console.log('ok');

    labelName = {};
    labelName.Name = 'Название';
    labelName.UID = 'ID элемента';
    labelName.Period = 'Длительность';
    labelName.Parent_UID = 'Родитель';
    labelName.type = 'Тип';
    labelName.SORT = 'Сортировка';

    selectEL = {};
    selectEL.line = 'Линия';
    selectEL.dot = 'Точка';

    dDG = '';

    for (key in labelName) {

        divDateGroup = document.createElement('div');
        divDateGroup.className = 'form-group ' + key;

        labelEL = document.createElement('label');
        labelEL.setAttribute('for', key + '-' + UID);
        labelEL.innerText = labelName[key];
        divDateGroup.appendChild(labelEL);

        if (key == 'type') {

            inputEL = document.createElement('select');
            inputEL.className = 'form-control ' + key;
            inputEL.className = 'form-control ' + key;
            inputEL.setAttribute('id', key + '-' + UID);
            inputEL.setAttribute('name', key + '-' + UID);

            // inputEL.setAttribute('required');
            o = 0;
            for (k in selectEL) {
                inputEL.options[o] = new Option(selectEL[k], k);
                o++;
            }
        } else {
            inputEL = document.createElement('input');
            inputEL.className = 'form-control ' + key;
            inputEL.setAttribute('id', key + '-' + UID);
            inputEL.setAttribute('name', key + '-' + UID);
            inputEL.setAttribute('type', 'text');
            // inputEL.setAttribute('value', DateTime[i][key]);
            if (key == 'UID') {
                inputEL.setAttribute('value', UID);
                inputEL.disabled = true;
            }
        }

        divDateGroup.appendChild(inputEL);

        dDG = dDG + divDateGroup.outerHTML;
        // console.log(divDateGroup);
    }

    delEL = document.createElement('div');
    delEL.className = "ElementDelete";
    delEL.setAttribute('onclick', 'deleteElementField(' + UID + ')');
    delEL.innerHTML = 'X';

    divDateTmeElement.innerHTML = delEL.outerHTML + dDG;
    document.getElementsByClassName('DateTime')[0].appendChild(divDateTmeElement);

}
function deleteElementField(elem) {
    elem = document.getElementById("Element-" + elem);
    elem.remove();
    // console.log(elem);
}


function load_canvas()
{

    console.log(document.querySelector("#printscreen").clientWidth);
    w = document.querySelector("#printscreen").clientWidth;
    console.log(document.querySelector("#printscreen").clientHeight);
    h = document.querySelector("#printscreen").clientHeight;


    document.querySelector("#canvas").setAttribute('width', w);
    document.querySelector("#canvas").setAttribute('height', h);



    $("canvas").empty();
    var canvas = document.querySelector("canvas");
    var ctx = canvas.getContext("2d");
    var ctx = canvas.getContext('2d');
    html2canvas(document.querySelector("#printscreen"), {canvas: canvas}).then(function(canvas) {


        imgs = document.getElementById('imgs');
        imgs.innerHTML = '';


        typeImg = 'png';
        // typeImg = 'jpeg';
        // typeImg = 'bmp';
        console.log(imgs);
        imgs.appendChild(Canvas2Image.convertToImage(canvas, w, h, typeImg));
        document.getElementById('canvas').style.display = 'none';

        // console.log(canvas);

    });

}