function fetchData()
        {
            var str = document.getElementById("staff_id").value;

            if (str === "")
            {
                alert('Please enter the staff ID');
                return;
             }
             
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("info").innerHTML = this.responseText;
			//alert(this.responseText);
              }
            };
            xmlhttp.open("GET", "info.php?fetchE=" + str, true);
            xmlhttp.send();
        }
  
function getNetSalary(){
var net_salary = 0;
//salaried additions
var basic_salary = document.getElementById("basic_salary").value
var allowance = document.getElementById("allowance").value
var other_salary = document.getElementById("other_salary").value
//salaries deductions
var p_deduction = document.getElementById("p_deduction").value
var tax_deduction = document.getElementById("tax_deduction").value
var other_deduction = document.getElementById("other_deduction").value

net_salary = Number(net_salary) + (Number(basic_salary) + Number(allowance) + Number(other_salary) - Number(p_deduction) - Number(tax_deduction) - Number(other_deduction))
document.getElementById("net_salary").value = net_salary.toFixed(2);
}
	
	function fetchName() {
			var str = document.getElementById("staff_id").value;           
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("info").value = this.responseText;
			//alert(this.responseText);
              }
            };
            xmlhttp.open("GET", "info.php?staff_id=" + str, true);
            xmlhttp.send();
		
	}
	
	
	function fetchPData()
        {
            var str = document.getElementById("patient_id").value;

            if (str === "")
            {
                alert('Please enter the patient ID');
                return;
             }
             
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("info").innerHTML = this.responseText;
              }
            };
            xmlhttp.open("GET", "info.php?fetchP=" + str, true);
            xmlhttp.send();
        }
  
    $(document).ready(function() {
       
        
        demo.initVectorMap();
    });
	//for invoice//////////////////////////////////////////////////////////////////////////////////////////////////////
		sum_all = 0;  
	function sum() {
        var val1 = document.getElementById('unit_cost_1').value;
        var val2 = document.getElementById('qty_1').value;
        var sum = Number(val1) * Number(val2);
        document.getElementById('amount_1').value = sum.toFixed(2);
		

      }
	  function sum2() {
        var val1 = document.getElementById('unit_cost_2').value;
        var val2 = document.getElementById('qty_2').value;
        var sum = Number(val1) * Number(val2);
        document.getElementById('amount_2').value = sum.toFixed(2);
		
		
      }
	  function sum3(){
        var val1 = document.getElementById('unit_cost_3').value;
        var val2 = document.getElementById('qty_3').value;
        var sum = Number(val1) * Number(val2);
        document.getElementById('amount_3').value = sum.toFixed(2);

      }
	  
	  function amount(){
		var val1 = document.getElementById('amount_1').value;
        var val2 = document.getElementById('amount_2').value;
        var val3 = document.getElementById('amount_3').value;
        var sum = Number(val1) + Number(val2) + Number(val3);
        document.getElementById('total_amount').value = sum.toFixed(2);  
	  }
	  function tax_cal(){
			var tax = document.getElementById('selectTax').value;
			  if(tax == "Select Tax")
			  {
				  alert('Tax status not specified');
			  }
			if (tax == "VAT")
			  {
				  var output = 20;
				  
				  document.getElementById('c_tax').value = output.toFixed(2); 
			  }
			  if (tax == "No Tax")
			  {
				  var output = 0;
				  
				  document.getElementById('c_tax').value = output.toFixed(2); 
			  }
	  }
	  function discountGiven(d){
			  var total_amount = document.getElementById('total_amount').value;
			  var tax_amount = document.getElementById('c_tax').value;
			  var discount_cal;
			  var dicounted_price;
			  discount_cal = Number((d/100)) * Number(total_amount);
			  dicounted_price = (Number(total_amount) - Number(discount_cal)) - Number(tax_amount);
			  document.getElementById('groundTotal').value = dicounted_price.toFixed(2);
		  }

		  
//invoice//////////////////////////////////////////////////////////////////////////////////////////////////////