{
	"rows":[

	<?php for ($i=1; $i < 10000 ; $i++) { ?>
	
		{"appId":"FB21-3289<?php echo $i;?>-29<?php echo $i;?>","Status":"<span class='btn btn-success btn-xs'>Booking Confirm</span>", "CustomerName":"Customer <?php echo $i;?>","From":"From City <?php echo $i;?>","To":"To City <?php echo $i;?>", "Type":"Oneway",
		"BookedOn":"24/02/2019", "JourneyDate":"03/03/2019", "PNR":"JYU4NW", "AgentNetFare":"100", "AgentCommission":"50", "AdminMarkup":"90", "AgentMarkup":"35", "AgentTDS":"10", "AdminTDS":"30", "TotalFare":"500<?php echo $i;?> Rs/-", "Action":"<a class='btn btn-primary btn-xs'>Voucher</a>&nbsp;<a class='btn btn-warning btn-xs'>PDF</a>" 
	},
	<?php }?>	
		

		{"appId":"FB21-170910-295983","Status":"Booking Confirm", "CustomerName":"Arjun","From":"Bengalore","To":"Berlin", "Type":"Oneway",
		"BookedOn":"24/02/2019", "JourneyDate":"03/03/2019", "PNR":"JYU4NW", "AgentNetFare":"100", "AgentCommission":"50", "AdminMarkup":"90", "AgentMarkup":"35", "AgentTDS":"10", "AdminTDS":"30", "TotalFare":"5000", "Action":"Print" 
	}
		
		
	]
}