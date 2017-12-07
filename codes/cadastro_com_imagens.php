// Conexão com o banco de dados
include('dbfunctions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Se o usuário clicou no botão cadastrar efetua as ações
	if ($_POST['cadastrar']) {

		// Recupera os dados dos campos
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$foto = $_FILES['foto'];

		// Se a foto estiver sido selecionada
		if (!empty($foto['name'])) {

			// Largura máxima em pixels
			$largura = 1500;
			// Altura máxima em pixels
			$altura = 1800;
			// Tamanho máximo do arquivo em bytes
			$tamanho = 1000000;

			$error = '';

			// Verifica se o arquivo é uma imagem
	    	if(!(preg_match('/\.(gif|bmp|png|jpg|jpeg){1}$/i', $foto['name'], $ext))){
	     	   $error[1] = 'Isso não é uma imagem.';
	   	 	}

			// Pega as dimensões da imagem
			$dimensoes = getimagesize($foto['tmp_name']);

			// Verifica se a largura da imagem é maior que a largura permitida
			if($dimensoes[0] > $largura) {
				$error[2] = 'A largura da imagem não deve ultrapassar '.$largura.' pixels';
			}

			// Verifica se a altura da imagem é maior que a altura permitida
			if($dimensoes[1] > $altura) {
				$error[3] = 'Altura da imagem não deve ultrapassar '.$altura.' pixels';
			}

			// Verifica se o tamanho da imagem é maior que o tamanho permitido
			if($foto['size'] > $tamanho) {
	   		 	$error[4] = 'A imagem deve ter no máximo '.$tamanho.' bytes';
			}

			// Se não houver nenhum erro
			if (!$error) {

				echo 'aop';
				// Pega extensão da imagem
				preg_match('/\.(gif|bmp|png|jpg|jpeg){1}$/i', $foto['name'], $ext);

	        	// Gera um nome único para a imagem
	        	$nome_imagem = md5(uniqid(time())) . '.' . $ext[1];

	        	// Caminho de onde ficará a imagem
	        	$caminho_imagem = 'fotos/' . $nome_imagem;

				// Faz o upload da imagem para seu respectivo caminho
				move_uploaded_file($foto['tmp_name'], $caminho_imagem);

				// Insere os dados no banco e se os dados forem inseridos com sucesso
				if (queryObjReturn('INSERT INTO usuarios (nome, email, foto) VALUES (''.$nome.'', ''.$email.'', ''.$nome_imagem.'')')){
					echo 'Você foi cadastrado com sucesso.';
				}
				else
					echo 'nem deu pra inserir;' . 'INSERT INTO usuarios (nome, email, foto) VALUES (''.$nome.'', ''.$email.'', ''.$nome_imagem.'')';
			}

			if($error){
				// Se houver mensagens de erro, exibe-as
				$i = 0;
				while($i < count($error))
				{
					echo $error[$i];
					$i = $i + 1;
				}
			}
		}
	}
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Cadastro de usuário</title>
</head>

<body>
<h1>Novo Usuário</h1>
<form action='< ? p h p echo $_SERVER['PHP_SELF'] ?>' method='post' enctype='multipart/form-data' name='cadastro' >
	Nome:<br />
	<input type='text' name='nome' /><br /><br />
	Email:<br />
	<input type='text' name='email' /><br /><br />
	Foto de exibição:<br />
	<input type='file' name='foto' /><br /><br />
	<input type='submit' name='cadastrar' value='Cadastrar' />
</form>

<hr />

<h1>Usuários cadastrados</h1>
	< ? p h p 
		// Seleciona todos os usuários
		$return = queryObjReturn('SELECT * FROM usuarios ORDER BY nome');

		if ($return)
		{
			// Exibe as informações de cada usuário
			while ($usuario = mysqli_fetch_object($return))
			{
				// Exibimos a foto
				echo '< i m g src='fotos/'.$usuario->foto.'' alt='Foto de exibição' /><br />';
				// Exibimos o nome e email
				echo '<b>Nome:</b> ' . $usuario->nome . '<br />';
				echo '<b>Email:</b> ' . $usuario->email . '<br /><br />';
			}
		}
	? >
</body>
</html>