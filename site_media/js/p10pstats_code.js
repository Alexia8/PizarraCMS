//JAVASCRIPT CLASS THAT LOADS JSON DATA INTO CANVAS PIE CHARTS
//STATS BY GROUP
//STATS INT TOTAL
//==============================================
window.onload = main;
var ctx;
var ctx2;
var ctx3;
var ctx4;
var ctx5;

//main function starts charts
function main() {
    ctx = document.getElementById("myChart").getContext("2d");
    ctx2 = document.getElementById("myChart2").getContext("2d");
    ctx3 = document.getElementById("myTotalChart").getContext("2d");
    ctx4 = document.getElementById("myTotalChart2").getContext("2d");
    ctx5 = document.getElementById("myTotalChart3").getContext("2d");
    getGroups(1);
    getTotal();
}

//loads stats by group 
function getGroups(id) {
    callJsonCore({type: 'groups', id_S: id.toString()}, function (info) {
        if (info) {
            //student chart
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [
                        "Bajas",
                        "Altas",
                        "Inscritos"
                    ],
                    datasets: [
                        {
                            data: [info[0].total_cancelled, info[0].total_students, info[0].total_enrolled],
                            backgroundColor: [
                                "#ff0000",
                                "#64bf22",
                                "#ffd902"
                            ]
                        }]
                },
                options: {
                    responsive: false
                }
            });
            //payment chart
            new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: [
                        "Facturado",
                        "Devuelto"
                    ],
                    datasets: [
                        {
                            data: [info[0].total_invoiced, info[0].total_refunded],
                            backgroundColor: [
                                "#01aedd",
                                "#d1d1d1"
                            ]
                        }]
                },
                options: {
                    responsive: false
                }
            });
        }
    });
}

//load stat in total
function getTotal() {
    callJsonCore({type: 'total'}, function (info) {
        if (info) {
            //student chart
            new Chart(ctx3, {
                type: 'pie',
                data: {
                    labels: [
                        "TOTAL",
                        "Altas",
                        "Bajas",
                        "Inscritos",
                        "Finalizados",
                        "Presencial",
                        "Online"
                    ],
                    datasets: [
                        {
                            data: [info[0].total_studentsDB, info[0].total_signedUp, info[0].total_cancelled, info[0].total_enrolled, info[0].total_ended, info[0].total_onCampus, info[0].total_online],
                            backgroundColor: [
                                "#44877a",
                                "#64bf22",
                                "#ff0000",
                                "#ffd902",
                                "#0175ad",
                                "#00802b",
                                "#b9f7ca"
                            ]
                        }]
                },
                options: {
                    responsive: false
                }
            });
            //system chart
            new Chart(ctx4, {
                type: 'pie',
                data: {
                    labels: [
                        "Facturado",
                        "Devuelto",
                        "Pendiente"
                    ],
                    datasets: [
                        {
                            data: [info[0].total_invoiced, info[0].total_refunds, info[0].total_pending],
                            backgroundColor: [
                                "#fcb500",
                                "#ea0000",
                                "#eeedc1"
                            ]
                        }]
                },
                options: {
                    responsive: false
                }
            });
            //payment chart
            new Chart(ctx5, {
                type: 'pie',
                data: {
                    labels: [
                        "Sedes",
                        "Cursos",
                        "Grupos",
                        "Aulas",
                        "Profesores"
                    ],
                    datasets: [
                        {
                            data: [info[0].total_academies, info[0].total_courses, info[0].total_groups, info[0].total_classrooms, info[0].total_teachers],
                            backgroundColor: [
                                "#11285a",
                                "#3d82e8",
                                "#add8e6",
                                "#0175ad",
                                "#01aedd"
                            ]
                        }]
                },
                options: {
                    responsive: false
                }
            });
        }
    });
}

//maybe for future use when created system history by month
////line chart is deseared
////MAYBE
//function getLine(id) {
//    callJsonCore({type: 'groups', id_S: id.toString()}, function (info) {
//        if (info) {
//            var myLineChart = new Chart(ctx2, {
//                type: 'line',
//                data: {
//                    labels: ["January", "February", "March"],
//                    datasets: [
//                        {
//                            label: "My First dataset",
//                            fill: false,
//                            lineTension: 0.1,
//                            backgroundColor: "rgba(75,192,192,0.4)",
//                            borderColor: "rgba(75,192,192,1)",
//                            borderCapStyle: 'butt',
//                            borderDash: [],
//                            borderDashOffset: 0.0,
//                            borderJoinStyle: 'miter',
//                            pointBorderColor: "rgba(75,192,192,1)",
//                            pointBackgroundColor: "#fff",
//                            pointBorderWidth: 1,
//                            pointHoverRadius: 5,
//                            pointHoverBackgroundColor: "rgba(75,192,192,1)",
//                            pointHoverBorderColor: "rgba(220,220,220,1)",
//                            pointHoverBorderWidth: 2,
//                            pointRadius: 1,
//                            pointHitRadius: 10,
//                            data: [info[0].total_cancelled, info[0].total_students, info[0].total_enrolled],
//                            spanGaps: false
//                        }
//                    ]
//                },
//                options: {
//                    responsive: false
//                }
//            });
//        }
//    });
//}

// ----------------------------------------------------------------

//AJAX call to json core in admin controller
function callJsonCore(data, callback) {

    $.ajax({
        type: 'POST',
        url: '../Controller/Json_core.php',
        data: data,
        success: function (resp) {
            stats = JSON.parse(resp);
            callback(stats);
        },
        error: function () {
            console.log('Error on call');
            callback(false);
        }
    });




}
