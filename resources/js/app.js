require('./bootstrap');

$(document).ready(function() {

    function showEmployee(res,id) {
        if ($(`#img${id}`).attr('src') == '#') {
            $(`#img${id}`).prop('src', `storage/${res['data']['employee_photo']}`);
        }

        if ($(`#body${id} th`).length === 0) {
            $(`#body${id} tr`).append(`<th scope="row">${id}</th>` +
                                        `<td>${res['data']['employee_email']}</td>` +
                                        `<td>${res['data']['employee_age']}</td>` +
                                        `<td>${res['data']['employee_experience']}</td>` +
                                        `<td>${res['data']['employee_salary']} ₽</td>`
                );
        }
    }

    //show table
    function showAll(res) {
        if (res.data.length === 0) {

            if ($('#noEmp').length === 0) {
                $('#info').append("<h2 id='noEmp' class='text-center text-danger'>No employees found in the database</h2>");
            }

        } else {
            if ($('#title').length === 0) {
                $('.accordion').css({display : "block"});
                $('#info').append("<h2 id='title' class='text-center text-primary'>List Employees</h2>");

                res.data.forEach((el, index) => {
                    $('.accordion').append(
                        '<div class="accordion-item">\n' +
                        "                <h2 class='accordion-header' id='" + el['id'] + "'>\n" +
                        "                    <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse" + el['id'] + "' aria-expanded='true' aria-controls='collapseOne'>\n" +
                        " <b>#" + (index + 1) + "&emsp;</b>" + `${el["employee_name"]}` +
                        '                    </button>\n' +
                        '                </h2>\n' +
                        "               <div id='collapse" + el['id'] + "' class='accordion-collapse collapse' aria-labelledby='" + el['id'] + "' data-bs-parent='#accordionExample'>\n" +
                        '                    <div class="accordion-body">\n' +
                        '                        <div class="container">\n' +
                        '                            <div class="row">\n' +
                        '                                <div class="col-4">\n' +
                        "                                    <img class='img-thumbnail' id='img" + el['id'] + "' src='#' alt=''>\n" +
                        '                                </div>\n' +
                        '                                <div class="col"></div>\n' +
                        '                                <div class="col-7">\n' +
                        '                                    <table class="table">\n' +
                        '                                        <thead>\n' +
                        '                                        <tr>\n' +
                        '                                            <th scope="col">Id</th>\n' +
                        '                                            <th scope="col">Email</th>\n' +
                        '                                            <th scope="col">Age</th>\n' +
                        '                                            <th scope="col">Experience</th>\n' +
                        '                                            <th scope="col">Salary</th>\n' +
                        '                                        </tr>\n' +
                        '                                        </thead>\n' +
                        "                                        <tbody id='body" + el['id'] + "' >\n" +
                        '                                        <tr>\n' +
                        '                                        </tr>\n' +
                        '                                        </tbody>\n' +
                        '                                    </table>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                    </div>\n' +
                        '                </div>\n' +
                        '            </div>'
                    );
                });
            }
        }
    }

    // event request all employees
    $('#allEmp').click(function() {
        $.ajax({
            url: '/api/all',
            type: 'GET',
            success: function (res) {
                showAll(res);
            },
            error: function (res) {
                alert('Ошибка! Попробуйте позже...');
            }
        })
    })

    // event click on employee
    $('body').on('click', 'h2.accordion-header', function(e) {
        let id = parseInt(e.currentTarget.id);

        $.ajax({
            url: `/api/${id}`,
            type: 'GET',
            success: function (res) {
                showEmployee(res, id);
            },
            error: function (res) {
                alert('Ошибка! Попробуйте позже...');
            }
        })
    });
});

// POST ajax request
$("#form").on("submit", function(){
    let form = $('form')[0];
    let formData = new FormData(form);

    $.ajax({
        url: '/api/create',
        type: 'post',
        method: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
        }
    });
});



// validation form
(function () {
    'use strict'

    var forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()
