//[Data Table Javascript]

//Project:	EduAdmin - Responsive Admin Template
//Primary use:   Used only for the Data Table
// $(document).ready(function(){
//   var dataTable = $('#empTable').DataTable({
//     'processing': true,
//     'serverSide': true,
//     'serverMethod': 'post',
//     //'searching': false, // Remove default Search Control
//     'ajax': {
//       'url':'ajaxfile.php',
//       'data': function(data){
//           // Read values
//           var shopname = $('#shopname').val();
//           var status = $('#status').val();
//           var fromDate = $('#search_fromdate').val();

//           // Append to data
//           data.searchByShopName = shopname;
//           data.searchByStatus = status;
//           data.searchByStatus = fromDate;
//       }
//     },
//     'columns': [
//       { data: 'shopname' },
//       { data: 'status' },
//       { data: 'fromDate' },
//     ]
//   });

//   $('#searchByName').keyup(function(){
//     dataTable.draw();
//   });

//   $('#searchByGender').change(function(){
//     dataTable.draw();
//   });
// });

$(function () {
    "use strict";

    $('#example1').DataTable({
        'paging'      : false,
        'info'        : false,
        'lengthChange': false,
    });
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
	
// 	$('#example thead th').each( function () {
//         var title = $(this).text();
//         $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
//     } );
	var table = $('#example').DataTable( {
		dom: 'lBfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		],
		initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    //.appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
	} );
	$('.btn.btn-info.btn-sm.float-right').on('click', function(e){
	    e.preventDefault();
	    console.log('adsda');
	});
// 	table.columns().every( function () {
//         var that = this;
    
//         $( 'input', this.header() ).on( 'keyup change clear', function () {
//             if ( that.search() !== this.value ) {
//                 that
//                     .search( this.value )
//                     .draw();
//             }
//         } );
//     } );
    $('#clr_filter').on('click', function(){
        $('.filter_class').val('');
        $('.sorting<input>').val('');
        alert('ahsjda');
        table.column('').draw();
    });
    
    $('#btn_search').on('click', function(){
        var fromDate = $("#search_fromdate").val();
        var toDate = $("#search_todate").val();
        console.log(fromDate);
        console.log(toDate);
         table.draw();
    });
	
	$('#tickets').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
	});
	
	$('#productorder').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
	});
	

	$('#complex_header').DataTable();
	
	//--------Individual column searching
	
    // Setup - add a text input to each footer cell
    $('#example5 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example5').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
	
	
	//---------------Form inputs
	var table = $('#example6').DataTable();
 
    // $('button').click( function() {
    //     var data = table.$('input, select').serialize();
    //     alert(
    //         "The following data would have been submitted to the server: \n\n"+
    //         data.substr( 0, 120 )+'...'
    //     );
    //     return false;
    // } );
	
	
	
	
  }); // End of use strict