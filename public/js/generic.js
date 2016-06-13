/*GLOBAL VARIABLES*/
var sourceAmount = 0;

/*Handling Delete Action on Table*/
$('button#delete').on('click', function(){
    var dataId = $(this).attr('value');
    var splitData = dataId.split(".");
    swal({
            title: "Are you sure?",
            text: "You will not be able to recover this item!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){
            swal("Deleted!", "Your item has been deleted.", "success");
            window.location = splitData[0].concat('/'.concat(splitData[1]).concat("/destroy"));
        });
});


function searchDataTable(){
    var searchKey = document.getElementsByName('searchComponent')[0].value;
    var searchValue = document.getElementsByName('searchComponent')[1].value;
    var searchUrl = document.getElementsByName('searchComponent')[2].value;
    if (searchKey == '' || searchValue == ''){
        $("#errorSearch").css("display", "block");
        $("#errorSearchContent").html('Search Key || Search Value can not be Empty');
    }else {
        window.location.pathname = searchUrl.concat('/search/').concat(searchKey).concat('/').concat(searchValue);
    }
}

function resetSearchDataTable(){
    var searchUrl = document.getElementsByName('searchComponent')[2].value;
    window.location.pathname = searchUrl;
}

/*Search Data Table*/
$('#txtSearchDataTable').keypress(function(e){
    if(e.which == 13) {
        searchDataTable();
    }
});

/*Date Picker*/
$('#datePicker').datepicker({
    format: 'dd-mm-yyyy'
});

/*Get Expense Source on Change LOV*/
$('#expense_source').change(function(){        
    var idExpenseSource = document.getElementById("expense_source").value;        
    $.get('/fun-laravel/public/saving/select/'+idExpenseSource, function(e){        
        $('#lblSourceValue').css("visibility", "visible");
        sourceAmount = e;
        $('#lblSourceValue').html('IDR. '+thousandSeparator(e));
    });
});

$('#amount').focus(function(){
    document.getElementById("amount").value = '';
});

/*Thousand Separator for Amount Text Field*/
$('#amount').change(function(){
    var currentValue = document.getElementById("amount").value;    
    document.getElementById("amount").value = 'IDR. '+thousandSeparator(currentValue);    
    if (sourceAmount == 0){
        sourceAmount = document.getElementById("lblSourceValue").textContent;
    }
    // console.log("current value : "+currentValue);    
    // console.log("source Amount : "+sourceAmount);
    if (parseFloat(currentValue) > parseFloat(sourceAmount)){
        alert('Expense amount can not be bigger than source amount');
        document.getElementById("amount").value = '';
        document.getElementById("amount").focus();
        document.getElementById("amount").select();
    }else{
        //do nothing
    }
});

/*Thousand Separator using JQuery Number*/
function thousandSeparator(p_Data){    
    return $.number(p_Data);
}