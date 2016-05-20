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

$('#txtSearchDataTable').keypress(function(e){
    if(e.which == 13) {
        searchDataTable();
    }
});

$('#datePicker').datepicker({
    format: 'dd-mm-yyyy'
});
