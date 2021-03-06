<?php session_start();
echo $_SESSION['user_num'];?>
<!DOCTYPE html>
    <html lang=en>
        <head>
            <title>Welcome to Your Calendar</title>
            <link rel="stylesheet" type="text/css" href="cal.css">
            	<script type="text/javascript" src="http://classes.engineering.wustl.edu/cse330/content/calendar.min.js"></script>
		<script type="text/javascript">
		    var month = new Array();
		    month[0] = "January";
		    month[1] = "February";
		    month[2] = "March";
		    month[3] = "April";
		    month[4] = "May";
		    month[5] = "June";
		    month[6] = "July";
		    month[7] = "August";
		    month[8] = "September";
		    month[9] = "October";
		    month[10] = "November";
		    month[11] = "December";
		    document.addEventListener("DOMContentLoaded",function(){
			// get the reference for the body
			var body = document.getElementsByTagName("body")[0];					  
			// creates a <table> element and a <tbody> element
			var calendargrid     = document.createElement("table");
			calendargrid.setAttribute("id","grid");
			var calendargridHead = document.createElement("thead");
			var calendargridBody = document.createElement("tbody");					     
			calendargridHead = document.createTextNode(month[currentMonth.month] + ", " + currentMonth.year);
		       
			// creating all cells
			for (var i = -1; i < currentMonth.getWeeks().length; i++) {
			  // creates a table row
			  var row = document.createElement("tr");
		       
			    for (var j = 0; j < 7; j++) {
				if(i==-1){
				    var cell = document.createElement("td");
				     
				    if(j==0){
					var cellText = document.createTextNode("Sunday");
				    }
				    if(j==1){
					var cellText = document.createTextNode("Monday");
				    }
				    if(j==2){
					var cellText = document.createTextNode("Tuesday");
				    }
				    if(j==3){
					var cellText = document.createTextNode("Wednesday");
				    }
				    if(j==4){
					var cellText = document.createTextNode("Thursday");
				    }
				    if(j==5){
					var cellText = document.createTextNode("Friday");
				    }
				    if(j==6){
					var cellText = document.createTextNode("Saturday");
				    }
				    cell.appendChild(cellText);
				    row.appendChild(cell);
				}
				else{
				// Create a <td> element and a text node, make the text
				// node the contents of the <td>, and put the <td> at
				// the end of the table row
				var cell = document.createElement("td");
				var weeks = currentMonth.getWeeks();
				    var days = weeks[i].getDates();
					  if(days[j].getMonth() == currentMonth.month){	
					      var cellText = document.createTextNode(days[j].getDate());
					      cell.addEventListener("click", clickCell, false);
    
					      cell.appendChild(cellText);
					      row.appendChild(cell);
					  }
					  else{
					      var cellText = document.createTextNode("");
					      cell.appendChild(cellText);
					      row.appendChild(cell); 
					  }
			    
				}
			    }
		       
			    // add the row to the end of the table body
			    calendargridBody.appendChild(row);
			}
			calendargrid.appendChild(calendargridHead);
			// put the <tbody> in the <table>
			calendargrid.appendChild(calendargridBody);
			// appends <table> into <body>
			body.appendChild(calendargrid);
			// sets the border attribute of calendargrid to 3;
			calendargrid.setAttribute("border", "3");
		    }, false);
    
			// For our purposes, we can keep the current month in a variable in the global scope
		    var currentMonth = new Month(2014, 9); // October 2014
		    
		    //firstday = new Day(2014, 9, 1);
		    // Change the month when the "next month" button is pressed
		    document.addEventListener("DOMContentLoaded",function(){
			document.getElementById("nextmonth").addEventListener("click", function(event){
				currentMonth = currentMonth.nextMonth();
				updateCalendar(); // Whenever the month is updated, we'll need to re-render the calendar in HTML
			}, false);
			//change the month when the previous month button is pressed
			document.getElementById("prevmonth").addEventListener("click", function(event){
				currentMonth = currentMonth.prevMonth();
				updateCalendar(); // Whenever the month is updated, we'll need to re-render the calendar in HTML
			}, false);
			var x = document.getElementById("newEventForm");
			document.getElementById("newEventForm").style.display="none";
			var createform = document.createElement("form"); // Create New Element Form
			x.appendChild(createform);
			var heading = document.createElement('h2'); // Heading of Form
			heading.innerHTML = "Create a New Event";
			createform.appendChild(heading);
    
			var line = document.createElement('hr'); // Giving Horizontal Row After Heading
			createform.appendChild(line);
    
			var linebreak = document.createElement('br');
			createform.appendChild(linebreak);
    
			var titlelabel = document.createElement('label'); // Create Label for Event Title Field
			titlelabel.innerHTML = "Event Title : "; // Set Field Labels
			createform.appendChild(titlelabel);
    
			var inputelement = document.createElement('input'); // Create Input Field for Event Title
			inputelement.setAttribute("type", "text");
			inputelement.setAttribute("name", "name");
			createform.appendChild(inputelement);
    
			var linebreak = document.createElement('br');
			createform.appendChild(linebreak);
    
			var startTimeLabel = document.createElement('label'); // Create bel for Event Title Field
			startTimeLabel.innerHTML = "Event Start Time : "; // Set Field Labels
			createform.appendChild(startTimeLabel);
    
			var inputelement2 = document.createElement('input'); // Create Input Field for Event Title
			inputelement2.setAttribute("type", "datetime-local");
			inputelement2.setAttribute("name", "start");
			createform.appendChild(inputelement2);
    
			var linebreak = document.createElement('br');
			createform.appendChild(linebreak);
    
			var endTimeLabel = document.createElement('label'); // Create abel for Event Title Field
			endTimeLabel.innerHTML = "Event End Time : "; // Set Field Labels
			createform.appendChild(endTimeLabel);
    
			var inputelement3 = document.createElement('input'); // Create Input Field for Event Title
			inputelement3.setAttribute("type", "datetime-local");
			inputelement3.setAttribute("name", "end");
			createform.appendChild(inputelement3);
    
			var linebreak = document.createElement('br');
			createform.appendChild(linebreak);
    
			var catlabel = document.createElement('label'); 
			catlabel.innerHTML = "Categroy : "; // Set Field Labels
			createform.appendChild(catlabel);
    
			var workLabel = document.createElement('label'); 
			workLabel.innerHTML = "Work"; 
			createform.appendChild(workLabel);
			var inputelement4 = document.createElement('input'); 
			inputelement4.setAttribute("type", "radio");
			inputelement4.setAttribute("id", "Work");
			inputelement4.setAttribute("name", "cat");
			inputelement4.setAttribute("value", "w");
			createform.appendChild(inputelement4);
			var linebreak = document.createElement('br');
			createform.appendChild(linebreak);
    
			var personalLabel = document.createElement('label'); 
			personalLabel.innerHTML = "Personal"; 
			createform.appendChild(personalLabel);
			var inputelement5 = document.createElement('input');
			inputelement5.setAttribute("type", "radio");
			inputelement5.setAttribute("id", "Personal");
			inputelement5.setAttribute("name", "cat");
			inputelement5.setAttribute("value", "p");
			createform.appendChild(inputelement5);
			var linebreak = document.createElement('br');
			createform.appendChild(linebreak);
    
			var socialLabel = document.createElement('label'); 
			socialLabel.innerHTML = "Social"; 
			createform.appendChild(socialLabel);
			var inputelement6 = document.createElement('input'); 
			inputelement6.setAttribute("type", "radio");
			inputelement6.setAttribute("id", "Social");
			inputelement6.setAttribute("name", "cat");
			inputelement6.setAttribute("value", "s");
			createform.appendChild(inputelement6);
			var linebreak = document.createElement('br');
			createform.appendChild(linebreak);
    
			var otherLabel = document.createElement('label'); 
			otherLabel.innerHTML = "Other"; 
			createform.appendChild(otherLabel);
			var inputelement7 = document.createElement('input'); 
			inputelement7.setAttribute("type", "radio");
			inputelement7.setAttribute("id", "Other");
			inputelement7.setAttribute("name", "cat");
			inputelement7.setAttribute("value", "o");
			createform.appendChild(inputelement7);
			var linebreak = document.createElement('br');
			createform.appendChild(linebreak);
			var submitelement = document.createElement('input');
			// Append Submit Button
			submitelement.setAttribute("type", "submit");
			submitelement.setAttribute("name", "submit");
			submitelement.setAttribute("value", "Add Event");
			createform.appendChild(linebreak);
			document.getElementById("newevent").addEventListener("click", function(event){
			    document.getElementById("newEventForm").style.display="block";
			    submitelement.addEventListener("click", function(event){
				    $cat = null;
				    if (document.getElementById("Work").checked) {
				       $cat = "w"; 
				    }
				    else if (document.getElementById("Personal").checked) {
				       $cat = "p"; 
				    }
				    else if (document.getElementById("Social").checked) {
				       $cat = "s"; 
				    }
				    else if (document.getElementById("Other").checked) {
				       $cat = "o"; 
				    }
				    var dataString = "name=" + encodeURIComponent(inputelement.value) + "&start=" + encodeURIComponent(inputelement2.value) + "&end=" + encodeURIComponent(inputelement3.value) + "&cat=" + encodeURIComponent($cat);
    
				    //alert(dataString);
				    var xmlHttp = new XMLHttpRequest(); // Initialize our XMLHttpRequest instance
				    xmlHttp.open("POST", "newevent.php", true); // Starting a POST request (NEVER send passwords as GET variables!!!)
				    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // It's easy to forget this line for POST requests
				    xmlHttp.addEventListener("load", function(event){
					var jsonData = JSON.parse(event.target.responseText); // parse the JSON into a JavaScript object
					if(jsonData.success){  // in PHP, this was the "success" key in the associative array; in JavaScript, it's the .success property of jsonData
					    //alert("Success!");
					}else{
					    alert("Event not added because:  "+ jsonData.message);
					}
				    }, false); // Bind the callback to the load event
				    xmlHttp.send(dataString); // Send the data
				    document.getElementById("newEventForm").style.display="none";
			    })
			    createform.appendChild(submitelement);
			}, false);		  
		    },false);
		    //If a box is clicked on, give the option to add an event
		    function clickCell() {
			    //here is where we will call to the database the display the events for that date based on the categroies selected 
			alert("hi");		    
			   // Sample syntax for posting xmlHgp.open("POST",	"/query.cgi�,true);	
				    // xmlHgp.send("name=Bob&email=bob@example.com");
		    }
		    // This updateCalendar() function only alerts the dates in the currently specified month.  You need to write
		    // it to modify the DOM (optionally using jQuery) to display the days and weeks in the current month.
		    function updateCalendar(){
    
			var weeks = currentMonth.getWeeks();
			 // get the reference for the body
			 var body = document.getElementsByTagName("body")[0];
			//if there is already a calendar grid there, remove it
			 if (document.getElementById("grid")) document.getElementById("grid").remove();
    
			// creates a <table> element and a <tbody> element
			var calendargrid = document.createElement("table");
			calendargrid.setAttribute("id","grid");
			var calendargridHead = document.createElement("thead");
			var calendargridBody = document.createElement("tbody");
			var weeks = currentMonth.getWeeks();
			calendargridHead = document.createTextNode(month[currentMonth.month] + ", " + currentMonth.year);			
			// creating all cells based on the number of weeks
			for (var i = -1; i < weeks.length; i++) {
			    // creates a table row
			    var row = document.createElement("tr");
				
			    for (var j = 0; j < 7; j++) {
				if(i==-1){
				    var cell = document.createElement("td");
				    if(j==0){
				      var cellText = document.createTextNode("Sunday");
				    }
				    if(j==1){
				     var cellText = document.createTextNode("Monday");
				    }
				    if(j==2){
				     var cellText = document.createTextNode("Tuesday");
				    }
				    if(j==3){
				     var cellText = document.createTextNode("Wednesday");
				    }
				    if(j==4){
				     var cellText = document.createTextNode("Thursday");
				    }
				    if(j==5){
				      var cellText = document.createTextNode("Friday");
				    }
				    if(j==6){
				      var cellText = document.createTextNode("Saturday");
				    }
				    cell.appendChild(cellText);
				    row.appendChild(cell);
				}
			    else{
			      // Create a <td> element and a text node, make the text
			      // node the contents of the <td>, and put the <td> at
			      // the end of the table row
				var cell = document.createElement("td");
				    var days = weeks[i].getDates();
				    if(days[j].getMonth() == currentMonth.month){	
					var cellText = document.createTextNode(days[j].getDate());
					cell.setAttribute("onclick", clickCell, false);
					cell.appendChild(cellText);
					row.appendChild(cell);
					
				    }
				    else{
					var cellText = document.createTextNode("");
					cell.appendChild(cellText);
					row.appendChild(cell); 
				    }
				}
			    }
			 
			    // add the row to the end of the table body
			    calendargridBody.appendChild(row);
			}
			// put the <thead> in the <table>
			calendargrid.appendChild(calendargridHead);
			// put the <tbody> in the <table>
			calendargrid.appendChild(calendargridBody);
			// appends <table> into <body>
			body.appendChild(calendargrid);
			// sets the border attribute of calendargrid to 3;
			calendargrid.setAttribute("border", "3");
		    }
		</script>
        </head>
        <body>
        <div class="main">
        <div class="nav">	
		<div class="logoutbtn">
			<form method="post" action="logout.php">
				<label class="logout">
				<input type="submit" id="logout" value="Log Out">
				</label>
			</form>
		</div>
		<div class = "monthbuttons">
			<button id = "prevmonth">Previous Month</button> 
			<button id = "nextmonth">Next Month</button>
		</div>
			<button id = "newevent">Create a new event</button>
		</div>
		<p id="instructions">Click on a date below to see the events on that day</p>
		<div id="newEventForm">
		</div>
	</div>
		</body>	
	</html>	