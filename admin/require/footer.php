

<footer class="main-footer">
     
      <div class="pull-right hidden-xs">
        
      </div>

     
  </footer>


<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="../assets/bower_components/chart.js/Chart.js"></script>
<!-- bootstrap datepicker -->
<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- DataTables -->
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>

<!-- CK Editor -->
<script src="../assets/plugins/eqneditor/plugin.js"></script>
<script src="../assets/bower_components/ckeditor/ckeditor.js"></script>
<!-- page script
<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"pengunjung/fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
		
	}
	
	load_data2();
	function load_data2(query)
	{
		$.ajax({
			url:"absensi/fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result2').html(data);
			}
		});
		
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
	
	$('#search_text2').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data2(search);
		}
		else
		{
			load_data2();			
		}
	});
	

});
</script>
 -->
<!-- TABEL
<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('.pilih th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" size="15" />' );
    } );
 
    // DataTable
    var table = $('#example1').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.header() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>
 
<!-- /table---> 
<script>
  $(function () {
    $('#example1').DataTable()
	$('#example2').DataTable()
	$('#example3').DataTable()
	$('#example5').DataTable()	
    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
	
	  //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
	 //Date picker2
    $('#datepicker2').datepicker({
      autoclose: true
    })
	 //Date picker3
    $('#datepicker3').datepicker({
      autoclose: true
    })
  
    CKEDITOR.replace('editor1');
	CKEDITOR.replace('editor2');
	CKEDITOR.replace('editor3');
	CKEDITOR.replace('editor4');
	CKEDITOR.replace('editor5');
	CKEDITOR.replace('editor6');	
	CKEDITOR.replace('editor7');	
	CKEDITOR.replace('editor8');			
  })
</script> 

<script>
  $(function () {

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
		 
          data                :  [  //SUMBER DATA DI FOLDER GRAFIK/PK.PHP
		  <?php  for($a = 0; $a < 12; $a++) {
		  		echo $jumlah_produk[$a]; 
 			} ?>
		  ]
		  
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
		  	   <?php  for($a = 0; $a < 12; $a++) {
		  		echo $jumlah_produkB[$a]; 
 			} ?>
		  ]
        }
      ]
    }

 

     

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
  

</script>
</body>
</html> 