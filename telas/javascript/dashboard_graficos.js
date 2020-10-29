

function valorphp(dimensoes, metricas)
{
	document.write(dimensoes);

	var ctx = document.getElementById('myChartLine').getContext('2d');
		var chart = new Chart(ctx, {
		    // The type of chart we want to create
		    type: 'line',

		    // The data for our dataset
		    data: {
		        labels: [dimensoes],
		        datasets: 
		        [{
		            label: 'Grafico de linha',
		            backgroundColor: [
		            	'rgba(56, 99, 132, 1)',
		            ],
		            borderWidth: 6,
		            borderColor: 'rgba(54, 162, 235, 0.5)',
		            data: [metricas]
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});
}





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
		            backgroundColor: [
		                'rgba(255, 99, 132, 1)', // O número de cores dever ter o mesmo número de dados
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)',
		                'rgba(178,34,34, 1)',
		            ],
		            data: [0, 10, 5, 2, 20, 30, 45]
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});


var ctx2 = document.getElementById('myChartRadar').getContext('2d');
		var myChartRadar = new Chart(ctx2, {
		    // The type of chart we want to create
		    type: 'radar',

		    // The data for our dataset
		    data: {
		        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
		        datasets: 
		        [{
		            label: 'Grafico de Barra',
		            backgroundColor: [
		                'rgba(54, 162, 235, 0.2)',
		            ],
		            borderColor: [
		                'rgba(54, 162, 235, 1)',
		            ],
		            borderWidth: 1,
		            data: [0, 10, 5, 2, 20, 30, 45]
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});

var ctx3 = document.getElementById('myChartPie').getContext('2d');
		var myChartPie = new Chart(ctx3, {
		    // The type of chart we want to create
		    type: 'pie',

		    // The data for our dataset
		    data: {
		        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
		        datasets: 
		        [{
		            label: 'Grafico de Barra',
		            backgroundColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)',
		                'rgba(178,34,34, 1)',
		            ],
		            data: [0, 10, 5, 2, 20, 30, 45]
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});

var ctx4 = document.getElementById('myChartPolarArea').getContext('2d');
		var myChartPolarArea = new Chart(ctx4, {
		    // The type of chart we want to create
		    type: 'polarArea',

		    // The data for our dataset
		    data: {
		        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
		        datasets: 
		        [{
		            label: 'Grafico de Barra',
		            backgroundColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)',
		                'rgba(178,34,34, 1)',
		            ],
		            data: [0, 10, 5, 2, 20, 30, 45]
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});

var ctx5 = document.getElementById('myChartLine2').getContext('2d');
		var myChartLine2 = new Chart(ctx5, {
		    // The type of chart we want to create
		    type: 'line',

		    // The data for our dataset
		    data: {
		        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
		        datasets: 
		        [{
		            label: 'Taxa de vitorias',
		            backgroundColor: 'transparent',
		            borderWidth: 6,
		            borderColor: 'rgba(255,69,0, 1)',
		            data: [0, 10, 5, 2, 20, 30, 45]
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});