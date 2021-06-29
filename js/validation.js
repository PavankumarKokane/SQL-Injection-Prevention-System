    $(function () {
        $("#username").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#lblError").html("");
 
            //Regex for Valid Characters i.e. Alphabets and Numbers.
            var regex = /^[A-Za-z]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#lblError").html("Only Alphabets allowed.");				
				var alerted = localStorage.getItem('alerted') || '';
    				if (alerted != 'yes') {
    					 alert("Only Alphabets allowed.");
     					localStorage.setItem('alerted','yes');
   					 }
            }
 
            return isValid;
        });
    });

$(function () {
        $("#search").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#lblError").html("");
 
            //Regex for Valid Characters i.e. Alphabets and Numbers.
            var regex = /^[A-Za-z]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#lblError").html("Only Alphabets allowed.");				
				var alerted = localStorage.getItem('alerted') || '';
    				if (alerted != 'yes') {
    					 alert("Only Alphabets allowed.");
     					localStorage.setItem('alerted','yes');
   					 }
            }
 
            return isValid;
        });
    });