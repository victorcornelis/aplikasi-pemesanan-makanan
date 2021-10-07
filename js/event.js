var default_url=window.location.origin+"/ticketing/";


$('.clockpicker').clockpicker({
	autoclose: true
});

$('.datepick').datepicker({
	autoclose: true,
	todayBtn: "linked",
	todayHighlight: true,
	format: "yyyy-mm-dd"
});

$('#suggestdate input').datepicker({
	autoclose: true,
	todayBtn: "linked",
	todayHighlight: true,
	format: "yyyy-mm-dd"
});

$('#pfromdate input').datepicker({
	autoclose: true,
	todayBtn: "linked",
	todayHighlight: true,
	format: "yyyy-mm-dd"
});
$('#ptodate input').datepicker({
	autoclose: true,
	todayBtn: "linked",
	todayHighlight: true,
	format: "yyyy-mm-dd"
});

$('#wofromdate input').datepicker({
	autoclose: true,
	todayBtn: "linked",
	todayHighlight: true,
	format: "yyyy-mm-dd"
});
$('#wotodate input').datepicker({
	autoclose: true,
	todayBtn: "linked",
	todayHighlight: true,
	format: "yyyy-mm-dd"
});

$('#department').multiselect({
	includeSelectAllOption: true,
	enableFiltering: true,
	maxHeight: 200,
	buttonWidth: 'btn-block'
});

$('#object').multiselect({
	includeSelectAllOption: true,
	enableFiltering: true,
	maxHeight: 200,
	buttonWidth: 'btn-block'
});

$('#unit').multiselect({
	includeSelectAllOption: true,
	enableFiltering: true,
	maxHeight: 200,
	buttonWidth: 'btn-block'
});

$('#ppa').multiselect({
	includeSelectAllOption: true,
	enableFiltering: true,
	maxHeight: 200,
	buttonWidth: 'btn-block'
});

$('#it').multiselect({
	includeSelectAllOption: true,
	enableFiltering: true,
	maxHeight: 300,
	buttonWidth: 'btn-block'
});

$('#tm').multiselect({
	includeSelectAllOption: true,
	enableFiltering: true,
	maxHeight: 200,
	buttonWidth: 'btn-block'
});

$('#tnm').multiselect({
	includeSelectAllOption: true,
	enableFiltering: true,
	maxHeight: 200,
	buttonWidth: 'btn-block'
});


$('#actuser').multiselect({
	includeSelectAllOption: true,
	enableFiltering: true,
	maxHeight: 200,
	buttonWidth: 'btn-block'
});

$('.multisel').multiselect({
	includeSelectAllOption: true,
	enableFiltering: true,
	maxHeight: 200,
	buttonWidth: 'btn-block'
});

$('#myModal').modal('show');
$(document).ready(function() {
	$('#tickets').DataTable();
});

$('#myTabs a').click(function (e) {
	e.preventDefault()
	$(this).tab('show')
})

$(document).on("click", ".prioritydelete", function () {
     var priorityid = $(this).data('id');
     $(".modal-footer > #priorityid").val(priorityid);
});

$(document).on("click", ".categorydelete", function () {
     var categoryid = $(this).attr('data-id');
     $(".modal-footer > #categoryid").val(categoryid);
});

$(document).on("click", ".statusdelete", function () {
     var statusid = $(this).data('id');
     $(".modal-footer > #statusid").val(statusid);
});

$(document).on("click", ".sourcedelete", function () {
     var statusid = $(this).data('id');
     $(".modal-footer > #sourceid").val(statusid);
});

$(document).on("click", ".dimensidelete", function () {
     var statusid = $(this).data('id');
     $(".modal-footer > #dimensiid").val(statusid);
});

$(document).on("click", ".divisidelete", function () {
     var statusid = $(this).data('id');
     $(".modal-footer > #divisiid").val(statusid);
});

$(document).on("click", ".unitdelete", function () {
    var statusid = $(this).data('id');
    $(".modal-footer > #divisiid").val(statusid);
});

$(document).on("click", ".ticketdelete", function () {
     var ticketid = $(this).data('id');
     $(".modal-footer > #ticketid").val(ticketid);
});

$(document).on("click", "#convertticket", function () {
     var suggestid = $(this).data('id');
     $(".modal-footer > #suggestid").val(suggestid);
});

$(document).on("click", "#rejectNote", function () {
     var woid = $(this).data('id');
     $("#woidReject").val(woid);
});

$(document).on("click", "#approve", function () {
     var woid = $(this).data('id');
     $("#appwoid").val(woid);
});

$(document).on("click", "#reject", function () {
     var woid = $(this).data('id');
     $("#rejwoid").val(woid);
});


$(document).on("click", "#transferticket", function () {
     var woid = $(this).data('id');
	 var deptid = $('#dept').val();
     $("#woid").val(woid);
     $("#deptid").val(deptid);
});

$(document).on("click", ".responsedelete", function () {
     var responseid = $(this).data('id');
	 //alert(responseid);
     $("#response").val(responseid);
});

$(document).on("click", "#deleteNote", function () {
     var noteid = $(this).data('id');
     $("#noteid").val(noteid);
});

$(document).on("click", "#closeWo", function () {
     var woid = $(this).data('id');
     $("#closewoid").val(woid);
});

$(document).on("click", "#cancelWo", function () {
     var woid = $(this).data('id');
     $("#cancelwoid").val(woid);
});

$(document).on("click", "#provider", function () {
     var deptid = $(this).data('id');
     $("#deptid").val(deptid);
});

$(document).on("click", "#deleteActivity", function () {
     var actid = $(this).data('id');
     $("#actid").val(actid);
});

$(document).on("click", "#addPatient", function () {
     var uhid = $(this).attr('data-id');
	 var name = $(this).attr('rel');
	 //alert(responseid);
     $("#uhid").val(uhid);
     $("#patientname").val(name);
});

$(document).on("change", "#typecat", function(e) {
    //alert("sada");
	$.ajax({
		url:default_url+"home.php?page=changeCategory",
		type:'post',
		data:$("td#change").serialize(),
		success: function(data){
			window.location.replace(default_url+"home.php?page=category");
		},
	});
	e.preventDefault();
}); 

function printWo(woid){
	$.ajax({
		url:default_url+"pages/workorder/printWo.php",
		type:'post',
		data:{woid:woid},
		success:function(data){
		//alert(data);
		}

	});
}

function searchPatient(){
	//alert("sada");
	$.ajax({
		url:default_url+"pages/ticket/searchPatient.php",
		type:'post',
		success:function(data){
			$('#searchPatientView').html(data);
		}

	});
}

function searchPatientData(){
	$.ajax({
		url:default_url+"pages/ticket/searchPatientData.php",
		type:'post',
		data:$("form#search").serialize(),
		success:function(data){
			$('#searchPatientView').html(data);
		}
	});
}

function searchWoUserData(){
	
	$.ajax({
		url:default_url+"pages/workorder/findWoUserData.php",
		type:'post',
		data:$("form#searchout").serialize(),
		success:function(data){
			$('#foundWoOut').html(data);
		}
	});
}

function searchWoData(){
	
	$.ajax({
		url:default_url+"pages/workorder/findWoData.php",
		type:'post',
		data:$("form#searchin").serialize(),
		success:function(data){
			$('#foundWoIn').html(data);
		}
	});
}

/*
function priorityWisePdf(){
	$.ajax({
		url:default_url+"pages/priorityWisePdf.php",
		type:'post',
		data:$("form#search").serialize(),
		success:function(data){
			window.location.href = default_url+"pages/priorityWisePdf.php";
		}
	});
}
*/
function priorityWiseData(){
	$.ajax({
		url:default_url+"pages/ticket/priorityWiseData.php",
		type:'post',
		data:$("form#search").serialize(),
		success:function(data){
			$('#priorityWiseView').html(data);
		}
	});
}

function editPriority(priorityid){
	//alert("sada");
	$.ajax({
		url:default_url+"pages/master/editPriority.php",
		type:'post',
		data:{priorityid:priorityid},
		success:function(data){
		//alert(data);
			$('#formEditPriority').html(data);
		}

	});
}

function editCategory(categoryid){
	//alert("sada");
	$.ajax({
		url:default_url+"pages/master/editCategory.php",
		type:'post',
		data:{categoryid:categoryid},
		success:function(data){
		//alert(data);
			$('#formEditCategory').html(data);
		}

	});
}

function editStatus(statusid){
	//alert("sada");
	$.ajax({
		url:default_url+"pages/master/editStatus.php",
		type:'post',
		data:{statusid:statusid},
		success:function(data){
		//alert(data);
			$('#formEditStatus').html(data);
		}

	});
}

function editSource(sourceid){
	//alert("sada");
	$.ajax({
		url:default_url+"pages/master/editSource.php",
		type:'post',
		data:{sourceid:sourceid},
		success:function(data){
		//alert(data);
			$('#formEditSource').html(data);
		}

	});
}

function editDimensi(dimensiid){
	//alert("sada");
	$.ajax({
		url:default_url+"pages/master/editDimensi.php",
		type:'post',
		data:{dimensiid:dimensiid},
		success:function(data){
		//alert(data);
			$('#formEditDimensi').html(data);
		}

	});
}

function editUnit(idunit){
    //alert("sada");
    $.ajax({
        url:default_url+"pages/master/editUnit.php",
        type:'post',
        data:{idunit:idunit},
        success:function(data){
            //alert(data);
            $('#formEditUnit').html(data);
        }

    });
}

function editDivisi(divisiid){
	//alert("sada");
	$.ajax({
		url:default_url+"pages/master/editDivisi.php",
		type:'post',
		data:{divisiid:divisiid},
		success:function(data){
		//alert(data);
			$('#formEditDivisi').html(data);
		}

	});
}

function editRespond(responseid){
	//alert("sada");
	$.ajax({
		url:default_url+"pages/ticket/editRespond.php",
		type:'post',
		data:{responseid:responseid},
		success:function(data){
		//alert(data);
			$('#formEditRespond').html(data);
		}

	});
}

function editSuggest(pk){
	//alert("sada");
	$.ajax({
		url:default_url+"pages/ticket/editSuggest.php",
		type:'post',
		data:{pk:pk},
		success:function(data){
		//alert(data);
			$('#formEditFeedback').html(data);
		}

	});
}

function editActivity(actid){
	//alert("sada");
	$.ajax({
		url:default_url+"pages/workorder/editActivity.php",
		type:'post',
		data:{actid:actid},
		success:function(data){
		//alert(data);
			$('#formEditActivity').html(data);
		}

	});
}

function editNote(noteid){
	//alert("sada");
	$.ajax({
		url:default_url+"pages/workorder/editNote.php",
		type:'post',
		data:{noteid:noteid},
		success:function(data){
		//alert(data);
			$('#formEditNote').html(data);
		}

	});
}

function editWo(woid){
	$.ajax({
		url:default_url+"pages/workorder/editWo.php",
		type:'post',
		data:{woid:woid},
		success:function(data){
		//alert(data);
			$('#formEditWo').html(data);
		}

	});
}

function updatePriority(){
	//alert("okokoko");
	$("#update").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=updatePriority",
		type:'post',
		data:$("form#update").serialize(),
		success: function(data){
			window.location.replace(default_url+"home.php?page=priority&data=updated");
		},
		});
		e.preventDefault();
	}));
}

function updateCategory(){
	//alert("okokoko");
	$("#update").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=updateCategory",
		type:'post',
		data:$("form#update").serialize(),
		success:function(data){
			window.location.replace(default_url+"home.php?page=category&data=updated");
		}
		});
		e.preventDefault();
	}));
}

function updateStatus(){
	//alert("okokoko");
	event.preventDefault();
	$("#update").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=updateStatus",
		type:'post',
		data:$("form#update").serialize(),
			success:function(data){
				window.location.replace(default_url+"home.php?page=status&data=updated")
			}
		});
	}));
}

function updateSource(){
	//alert("okokoko");
	event.preventDefault();
	$("#update").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=updateSource",
		type:'post',
		data:$("form#update").serialize(),
			success:function(data){
				window.location.replace(default_url+"home.php?page=source&data=updated")
			}
		});
	}));
}

function updateDimensi(){
	//alert("okokoko");
	event.preventDefault();
	$("#update").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=updateDimensi",
		type:'post',
		data:$("form#update").serialize(),
			success:function(data){
				window.location.replace(default_url+"home.php?page=dimensi&data=updated")
			}
		});
	}));
	
	
}

function updateUnit(){
    //alert("okokoko");
    event.preventDefault();
    $("#update").on('submit',(function(e) {
        $.ajax({
            url:default_url+"home.php?page=updateUnit",
            type:'post',
            data:$("form#update").serialize(),
            success:function(data){
                window.location.replace(default_url+"home.php?page=unit&data=updated")
            }
        });
    }));


}

function updateDivisi(){
	//alert("okokoko");
	event.preventDefault();
	$("#update").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=updateDivisi",
		type:'post',
		data:$("form#update").serialize(),
			success:function(data){
				window.location.replace(default_url+"home.php?page=divisi&data=updated")
			}
		});
	}));
	
	
}

function updateSuggest(pk){
	//alert("okokoko");
	$("#update").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=updateSuggest",
		type:'post',
		data:$("form#update").serialize(),
		success:function(data){
			window.location.replace(default_url+"home.php?page=viewSuggest&data=updated&suggestid="+pk)
		}
		});
		e.preventDefault();
	}));
}

function rejectNotes(){
	$("#insert").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=rejectNotes",
		type:'post',
		data:$("form#reject").serialize(),
			success:function(data){
				window.location.replace(default_url+"home.php?page=rejectNotes&data=updated")
			}
		});
	}));
}

function deletePriority(priorityid){
	//alert("okokoko");
	$("#prioritydelete").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=deletePriority&priorityid="+priorityid,
		type:'post',
		data:$("form#prioritydelete").serialize(),
		success:function(data){
			alert(data);
			window.location.reload();
		}
		});
	}));
}

function deleteCategory(categoryid){
	//alert("okokoko");
	$("#delete").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=deleteCategory&categoryid="+categoryid,
		type:'post',
		data:$("form#delete").serialize(),
		success:function(data){
			//alert(data);
			window.location.reload();
		}

		});
	}));
}

function deleteStatus(statusid){
	//alert("okokoko");
	$("#delete").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=deleteStatus&statusid="+statusid,
		type:'post',
		data:$("form#delete").serialize(),
		success:function(data){
			//alert(data);
			window.location.reload();
		}

		});
	}));
}

function deleteSource(sourceid){
	alert(sourceid);
	$("#delete").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=deleteSource&sourceid="+sourceid,
		type:'post',
		data:$("form#delete").serialize(),
		success:function(data){
			//alert(data);
			window.location.reload();
		}

		});
	}));
}

function deleteDimensi(dimensiid){
	alert(dimensiid);
	$("#delete").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=deleteDimensi&dimensiid="+dimensiid,
		type:'post',
		data:$("form#delete").serialize(),
		success:function(data){
			//alert(data);
			window.location.reload();
		}

		});
	}));
}

function deleteDivisi(divisiid){
	alert(divisiid);
	$("#delete").on('submit',(function(e) {
		$.ajax({
		url:default_url+"home.php?page=deleteDivisi&divisiid="+divisiid,
		type:'post',
		data:$("form#delete").serialize(),
		success:function(data){
			//alert(data);
			window.location.reload();
		}

		});
	}));
}

function deleteUnit(idunit){
    //alert(idunit);
    $("#delete").on('submit',(function(e) {
        $.ajax({
            url:default_url+"home.php?page=deleteDivisi&idunit="+idunit,
            type:'post',
            data:$("form#delete").serialize(),
            success:function(data){
                //alert(data);
                window.location.reload();
            }

        });
    }));
}
