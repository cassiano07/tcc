function Usuario(usuario_id)
{
    document.getElementById('codigo').value = usuario_id; 
    document.getElementById('formulario').action = './php/alterar_usuario.php';
    document.getElementById('detalhes').style.display = "block";

    
    
}

function fechar()
{
    document.getElementById('detalhes').style.display = "none";
}

function criarUsuario()
{
    document.getElementById('detalhes').style.display = "block";
    document.getElementById('codigo').value='';
    document.getElementById('formulario').action = './php/criar_usuario.php';
}

function ApagarUsuario(usuario_id)
{
    var xmlhttp = new XMLHttpRequest();
		var url = "http://localhost/tcc/telas/php/apagar_usuario.php?usuario_id=" + usuario_id; 
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
		alert('Usuário removido.');
		location.reload();
}