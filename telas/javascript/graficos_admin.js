function grafico(usuario_id)
{
    document.getElementById('codigo').value = usuario_id; 
    document.getElementById('formulario').action = './php/alterar_grafico.php';
    document.getElementById('detalhes').style.display = "block";

    
    
}

function fechar()
{
    document.getElementById('detalhes').style.display = "none";
}

function criarGrafico()
{
    document.getElementById('detalhes').style.display = "block";
    document.getElementById('codigo').value='';
    document.getElementById('formulario').action = './php/criar_grafico.php';
}

function ApagarGrafico(grafico_id)
{
    var xmlhttp = new XMLHttpRequest();
		var url = "http://localhost/tcc/telas/php/apagar_grafico.php?grafico_id=" + grafico_id; 
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
		alert('Gráfico removido.');
		location.reload();
}