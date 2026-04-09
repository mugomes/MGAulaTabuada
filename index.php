<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = (int) $_POST['numero'];

    if ($numero < 1 || $numero > 10) {
        echo 'Número Inválido!';
        exit;
    }

    for ($i = 1; $i <= 10; $i++) {
        echo "$numero x $i = " . ($numero * $i) . '<br>';
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada 1 ao 10</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

         .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        input, button {
            padding: 10px;
            margin:10px;
        }

        #resultado {
            margin-top: 20px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tabuada</h1>

        <label for="numero">Escolha um número:</label>
        <input type="number" id="numero" min="1" max="10">

        <button onclick="gerarTabuada()">Gerar Tabuada</button>
        
        <div id="resultado"></div>
    </div>

    <script>
        function gerarTabuada() {
            const numero = document.getElementById('numero').value;

            if (numero < 1 || numero > 10) {
                alert('Digite um número entre 1 e 10');
                return;
            }
            
            fetch('', {
                method: 'POST',
                'headers': {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'numero=' + numero
            })
            .then(res => res.text())
            .then(data => {
                document.getElementById('resultado').innerHTML = data;
            })
        }
    </script>
</body>
</html>