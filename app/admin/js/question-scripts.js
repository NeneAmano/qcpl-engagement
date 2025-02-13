var questions = document.getElementById('questions');
var questionType = document.getElementById('question-type');
var questionCategory = document.getElementById('question-category');
const url = window.location.pathname.split('/');

if(url[4] == 'questions.php'){
    questions.classList.add("border");
    questions.classList.add("border-dark");
    questions.classList.add("border-2");
    questions.classList.add("border-opacity-75");
}else if(url[4] == 'question-type.php'){
    questionType.classList.add("border");
    questionType.classList.add("border-dark");
    questionType.classList.add("border-2");
    questionType.classList.add("border-opacity-75");
}else if(url[4] == 'question-category.php'){
    questionCategory.classList.add("border");
    questionCategory.classList.add("border-dark");
    questionCategory.classList.add("border-2");
    questionCategory.classList.add("border-opacity-75");
}

// function for adding new input field
function add_status() {
    var new_chq_no = parseInt($('#total_chq_status').val()) + 1;
    var new_input = "<input type='text' id='add_choices_" + new_chq_no + "' name='add_choices[]' class='add_choices" + new_chq_no + " form-control mb-2'>";
    $('#new_chq_status').append(new_input);
    $('#total_chq_status').val(new_chq_no);
}

function remove_status() {
    var last_chq_no = $('#total_chq_status').val();
    if (last_chq_no > 1) {
        $('#add_choices_' + last_chq_no).remove();
        $('#total_chq_status').val(last_chq_no - 1);
    }
}

// function for showing the div of choices
// function showfield(name) {
//     if (name == '2') document.getElementById('choices').style.display = "block";
//     else document.getElementById('choices').style.display = "none";
// }

function showfield(selectedValue) {
    // Get the selected option element
    var selectedOption = document.querySelector('#add_question_type option[value="' + selectedValue + '"]');
    
    // Check if the ID of the selected option is 1
    if (selectedOption && selectedOption.id === '1') {
        document.getElementById('choices').style.display = "block";
    } else {
        document.getElementById('choices').style.display = "none";
    }
}


function hidefield() {
    document.getElementById('choices').style.display = 'none';
}

// edit question
$(document).ready(function () {
    $('body').on('click', '.edit', function(event) {

        $('#edit_question_modal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        console.log(data);

        $('#edit_question_id').val(data[0]);
        $('#edit_english_question').val(data[5]);
        $('#edit_tagalog_question').val(data[6]);
    });
});

// delete question
$(document).ready(function () {
    $('body').on('click', '.delete', function(event) {

        $('#delete_question_modal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        console.log(data);

        $('#delete_question_id').val(data[0]);
    });
});

// edit question type
$(document).ready(function () {
    $('body').on('click', '.edit', function(event) {

        $('#edit_question_type_modal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        console.log(data);

        $('#edit_qt_id').val(data[0]);
        $('#edit_question_type').val(data[1]);
    });
});

// edit question category
$(document).ready(function () {
    $('body').on('click', '.edit', function(event) {

        $('#edit_question_category_modal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        console.log(data);

        $('#edit_qc_id').val(data[0]);
        $('#edit_question_category').val(data[1]);
    });
});

