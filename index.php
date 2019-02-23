<!DOCTYPE html>

<html lang="en">
<head>
    <!-- The jQuery library is a prerequisite for all jqSuite products -->
    <script type="text/ecmascript" src="assets/js/jquery.min.js"></script> 
    <!-- We support more than 40 localizations -->
    <script type="text/ecmascript" src="assets/js/grid.locale-en.js"></script>
    <!-- This is the Javascript file of jqGrid -->   
    <script type="text/ecmascript" src="assets/js/jquery.jqGrid.min.js"></script>
    <!-- A link to a Boostrap  and jqGrid Bootstrap CSS siles-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> 

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/ui.jqgrid-bootstrap.css" />
	<script>
		$.jgrid.defaults.width = 1360;
		$.jgrid.defaults.responsive = true;
		$.jgrid.defaults.styleUI = 'Bootstrap';
	</script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="script.php"></script>
    <meta charset="utf-8" />
    <title>Provab | Demo</title>

    <style>
    
	.title{
		font-size:16px;
		margin-left: 10px;
		
	}
	table{background: #fff;}
	tr td{vertical-align: middle !important; }
	.panel-heading{padding:6px 0px 6px 12px !important;}
	.form-control{
		border: 1px solid #0c7cd547 !important;
		-webkit-box-shadow: inset 0 0px 0 #fff !important; 
		box-shadow: inset 0 0px 0 #fff !important; 
		/*padding: 20px !important;*/
		margin-top: -12px;
		color:#000 !important;
		
	}

	.input-elm{
margin-top: -1px;
	}
    th{
    	background: #eee;
    	font-size: 14px;
    }
    .ui-jqgrid .ui-jqgrid-hbox {
    float: left;
    padding-right: 20px;
    background: #eee;
}
	.bcolor{
		border: 1px solid red !important;
	}
	.green_bcolor{
		border: 1px solid green !important;
	}
	.label{
		margin-left: 18px;
		font-size: 13px; 
		background: #fff;
		color:#2196f3b8;
		padding: 0px 3px 0px 3px;
	}
	.label_val{
		color:red;
	}

	.green_label_val{
		color:green;
	}

	.panel-heading{
		border-bottom: 2px solid #ddd !important;
	}
	.panel{
		border: 2px solid #ddd;
	}
	.badge{
		font-size: 18px;
		border-radius: 25%;
		width:27px;
		height: 27px;
		margin-top: -4px;
		background: #2196f3b8 !important;
		color:#fff !important;
	}
	body{
		background: #ccc;
	}
.ui-pg-selbox{
width:40px;
}
	#input-photo{
		opacity: 0;
	}

	.uploadbox{
		border: 1px solid #0c7cd547;
		height: 43px;
		margin-top: -13px;
	}
	.imagelabel{
		margin-top: 0px;
	}

	.phonecount{
		padding: 0px 2px 0px 2px;
		border-radius: 10%; 
		/*font-size:20px;*/
		border:1px solid red;
		background: #fff;
	}

	.ui-jqgrid .ui-jqgrid-htable .ui-th-div {
    height: 24px;
    margin-top: 0px;
}
.ui-jqdialog .ui-jqdialog-titlebar-close {
    position: absolute;
    top: 0%;
    margin: -3px -3px 0 0;
    /* width: 40px; */
    padding: 0px;
    cursor: pointer;
    font-size: 16px;
    color:#e51c23;
}

.ui-jqdialog .ui-jqdialog-titlebar-close:hover{
	margin: -10px -10px 0 0;
}

select, select.form-control{
	margin-top:0px;
}
    </style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 style="text-align: center; text-decoration: underline;">Flight Report Table Demo @ Provab</h4>
			<div class="panel panel-primary">
				<div class="panel-body">
					<table id="jqGrid"></table>
			    <div id="jqGridPager"></div>
				</div>
			</div>
		</div>
	</div>
</div>
    <script type="text/javascript">

        $(document).ready(function () {
			var template = "<div style='margin-left:15px;'><div class='label'> App Reference <sup>*</sup></div><div> {appId} </div>";
			template += "<div class='label'> Status </div><div>{Status} </div>";
			template += "<div class='label'> Customer Name </div><div>{CustomerName} </div>";
			template += "<div class='label'> From </div><div>{From} </div>";
			template += "<div class='label'> To </div><div>{To} </div>";
			template += "<div class='label'> Type</div><div> {Type} </div>";
			template += "<div class='label'> Booked On</div><div> {BookedOn} </div>";
			template += "<div class='label'> Journey Date</div><div> {JourneyDate} </div>";
			template += "<div class='label'> PNR</div><div> {PNR} </div>";
			template += "<div class='label'> Agent NET Fare</div><div> {AgentNETFare} </div>";
			template += "<div class='label'> Agent Commission</div><div> {AgentCommission} </div>";
			template += "<div class='label'> Agent Markup</div><div> {AgentMarkup} </div>";
			template += "<div class='label'> Agent TDS</div><div> {AgentTDS} </div>";
			template += "<div class='label'> Admin TDS</div><div> {AdminTDS} </div>";
			template += "<div class='label'> Total Fare</div><div> {TotalFare} </div>";
			template += "<hr style='width:100%;'/>";
			template += "<div> {sData} {cData}  </div></div>";

            $("#jqGrid").jqGrid({
                url: 'controller.php',
				// we set the changes to be made at client side using predefined word clientArray
                editurl: 'clientArray',
                datatype: "json",
                colModel: [
                    {
						label: 'App Reference',
                        name: 'appId',
                        width: 180,
						key: true,
						editable: true,
						editrules : { required: true}
                    },
                    {
						label: 'Status',
                        name: 'Status',
                        width: 170,
                        editable: false // must set editable to true if you want to make the field editable
                    },
                    {
						label : 'Customer Name',
                        name: 'CustomerName',
                        width: 160,
                        editable: true
                    },
                    {
						label: 'From',
                        name: 'From',
                        width: 100,
                        editable: true
                    },
                    {
						label: 'To',
                        name: 'To',
                        width: 100,
                        editable: true
                    },
                    {
						label: 'Type',
                        name: 'Type',
                        width: 100,
                        editable: true
                    },
                    {
						label: 'Booked On',
                        name: 'BookedOn',
                        width: 120,
                        editable: true
                    },
                    {
						label: 'Journey Date',
                        name: 'JourneyDate',
                        width: 125,
                        editable: true
                    },
                    {
						label: 'PNR',
                        name: 'PNR',
                        width: 140,
                        hidden:true,
                        editable: false
                    },
                    {
						label: 'Agent Net Fare',
                        name: 'AgentNetFare',
                        hidden:true,
                        width: 140,
                        editable: false
                    },
                    {
						label: 'Agent Commission',
                        name: 'AgentCommission',
                        width: 140,
                        hidden:true,
                        editable: false
                    },
                    {
						label: 'Admin Markup',
						hidden:true,
                        name: 'AdminMarkup',
                        width: 140,
                        editable: false
                    },
                    {
						label: 'Agent TDS',
						hidden:true,
                        name: 'AgentTDS',
                        width: 140,
                        editable: false
                    },

                     {
						label: 'Admin TDS',
						hidden:true,
                        name: 'AdminTDS',
                        width: 140,
                        editable: false
                    },
                     {
						label: 'Total Fare',
                        name: 'TotalFare',
                        width: 100,
                        editable: false
                    },

                     {
						label: 'Action',
                        name: 'Action',
                        width: 150,
                        editable: true
                    }
                ],
				sortname: 'appId',
				sortorder : 'asc',
				loadonce: true,
				viewrecords: true,
                width: 880,
                height: 400,
                rowNum: 50,
       			rowList:[50,100,250,500],
                pager: "#jqGridPager",
                  autowidth : true,
   multiselect: true,
   shrinkToFit: true,
   gridview: true,
   
            });

            $('#jqGrid').navGrid('#jqGridPager',
                // the buttons to appear on the toolbar of the grid
                { edit: true, add: true, del: true, search: true, refresh: true, view: true, position: "left", cloneToTop: false },
                // options for the Edit Dialog
                {
                    editCaption: "The Edit Dialog",
					template: template,
                    errorTextFormat: function (data) {
                        return 'Error: ' + data.responseText
                    }
                },
                // options for the Add Dialog
                {
					template: template,
                    errorTextFormat: function (data) {
                        return 'Error: ' + data.responseText
                    }
                },
                // options for the Delete Dailog
                {
                    errorTextFormat: function (data) {
                        return 'Error: ' + data.responseText
                    }
                },

                {
        //Delete
        width:'600',
        multipleSearch:true,

    },


                );



        });

    </script>

    
</body>
</html>