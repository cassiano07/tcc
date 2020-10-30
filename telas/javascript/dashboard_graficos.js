

function line(dimensoes, metricas, nome_dimensao = null)
{
	var ctx = document.getElementById('myChartLine').getContext('2d');
		var chart = new Chart(ctx, {
		    // The type of chart we want to create
		    type: 'line',

		    // The data for our dataset
		    data: {
		        labels: [],
		        datasets: 
		        [{
		            label: [],
		            backgroundColor: [
		            	'rgba(56, 99, 132, 1)',
		            ],
		            borderWidth: 6,
		            borderColor: 'rgba(54, 162, 235, 0.5)',
		            data: []
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});


	for(var i = 0; i < dimensoes.length; i++)
	{
	chart.data.labels.push(dimensoes[i].substr(0,10));

	chart.data.datasets[0].data.push(metricas[i]);
	}

	var label;

	if(nome_dimensao !=  '')
	{
	label= nome_dimensao.concat(' por ');
	label= label.concat(nome_metrica);
	chart.data.datasets[0].label.push(label);
	}
}



function bar(dimensoes, metricas, nome_dimensao = null)
{
	var ctx1 = document.getElementById('myChartBarra').getContext('2d');
		var myChartBar = new Chart(ctx1, {
		    // The type of chart we want to create
		    type: 'bar',

		    // The data for our dataset
		    data: {
		        labels: [],
		        datasets: 
		        [{
		            label: [],
		            backgroundColor: [
		                'rgba(255, 99, 132, 1)', // O número de cores dever ter o mesmo número de dados
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)',
		                'rgba(178,34,34, 1)',
		            ],
		            data: []
		        }]
		    },

		    // Configuration options go here
		    options: {}
	});


	for(var i = 0; i < dimensoes.length; i++)
	{
	myChartBar.data.labels.push(dimensoes[i].substr(0,10));

	myChartBar.data.datasets[0].data.push(metricas[i]);
	}

	var label;

	if(nome_dimensao !=  '')
	{
	label= nome_dimensao.concat(' por ');
	label= label.concat(nome_metrica);
	myChartBar.data.datasets[0].label.push(label);
	}
}

function radar(dimensoes, metricas, nome_dimensao = null)
{
	var ctx2 = document.getElementById('myChartRadar').getContext('2d');
		var myChartRadar = new Chart(ctx2, {
		    // The type of chart we want to create
		    type: 'radar',

		    // The data for our dataset
		    data: {
		        labels: [],
		        datasets: 
		        [{
		            label: [],
		            backgroundColor: [
		                'rgba(54, 162, 235, 0.2)',
		            ],
		            borderColor: [
		                'rgba(54, 162, 235, 1)',
		            ],
		            borderWidth: 1,
		            data: []
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});


	for(var i = 0; i < dimensoes.length; i++)
	{
	myChartRadar.data.labels.push(dimensoes[i].substr(0,10));

	myChartRadar.data.datasets[0].data.push(metricas[i]);
	}

	var label;

	if(nome_dimensao !=  '')
	{
	label= nome_dimensao.concat(' por ');
	label= label.concat(nome_metrica);
	myChartRadar.data.datasets[0].label.push(label);
	}

}

function pie(dimensoes, metricas, nome_dimensao = null)
{
	var ctx3 = document.getElementById('myChartPie').getContext('2d');
		var myChartPie = new Chart(ctx3, {
		    // The type of chart we want to create
		    type: 'pie',

		    // The data for our dataset
		    data: {
		        labels: [],
		        datasets: 
		        [{
		            label: [],
		            backgroundColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)',
		                'rgba(178,34,34, 1)',
		            ],
		            data: []
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});


	for(var i = 0; i < dimensoes.length; i++)
	{
	myChartPie.data.labels.push(dimensoes[i].substr(0,10));

	myChartPie.data.datasets[0].data.push(metricas[i]);
	}

	var label;

	if(nome_dimensao !=  '')
	{
	label= nome_dimensao.concat(' por ');
	label= label.concat(nome_metrica);
	myChartPie.data.datasets[0].label.push(label);
	}
}

function polarArea(dimensoes, metricas, nome_dimensao = null)
{
	var ctx4 = document.getElementById('myChartPolarArea').getContext('2d');
		var myChartPolarArea = new Chart(ctx4, {
		    // The type of chart we want to create
		    type: 'polarArea',

		    // The data for our dataset
		    data: {
		        labels: [],
		        datasets: 
		        [{
		            label: [],
		            backgroundColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)',
		                'rgba(178,34,34, 1)',
		            ],
		            data: []
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});


	for(var i = 0; i < dimensoes.length; i++)
	{
	myChartPolarArea.data.labels.push(dimensoes[i].substr(0,10));

	myChartPolarArea.data.datasets[0].data.push(metricas[i]);
	}

	var label;

	if(nome_dimensao !=  '')
	{
	label= nome_dimensao.concat(' por ');
	label= label.concat(nome_metrica);
	myChartPolarArea.data.datasets[0].label.push(label);
	}
}

function lineSimple(dimensoes, metricas, nome_dimensao = null)
{
	var ctx5 = document.getElementById('myChartLine2').getContext('2d');
		var myChartLine2 = new Chart(ctx5, {
		    // The type of chart we want to create
		    type: 'line',

		    // The data for our dataset
		    data: {
		        labels: [],
		        datasets: 
		        [{
		            label: [],
		            backgroundColor: 'transparent',
		            borderWidth: 6,
		            borderColor: 'rgba(255,69,0, 1)',
		            data: []
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});

	for(var i = 0; i < dimensoes.length; i++)
	{
	myChartLine2.data.labels.push(dimensoes[i].substr(0,10));

	myChartLine2.data.datasets[0].data.push(metricas[i]);
	}

	var label;

	if(nome_dimensao !=  '')
	{
	label= nome_dimensao.concat(' por ');
	label= label.concat(nome_metrica);
	myChartLine2.data.datasets[0].label.push(label);
	}
}