var ctx = document.getElementById('myChartLine').getContext('2d');
		var chart = new Chart(ctx, {
		    // The type of chart we want to create
		    type: 'line',

		    // The data for our dataset
		    data: {
		        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
		        datasets: 
		        [{
		            label: 'Grafico de linha',
		            backgroundColor: 'rgb(255, 99, 132)',
		            borderColor: 'rgb(255, 99, 132)',
		            data: [0, 10, 5, 2, 20, 30, 45]
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});


var ctx1 = document.getElementById('myChartBarra').getContext('2d');
		var myChartBar = new Chart(ctx1, {
		    // The type of chart we want to create
		    type: 'bar',

		    // The data for our dataset
		    data: {
		        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
		        datasets: 
		        [{
		            label: 'Grafico de Barra',
		            backgroundColor: 'rgb(58,203,98)',
		            borderColor: 'rgb(58,203,98)',
		            data: [0, 10, 5, 2, 20, 30, 45]
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});



