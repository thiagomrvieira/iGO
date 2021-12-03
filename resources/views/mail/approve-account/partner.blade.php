<!DOCTYPE html>
<html>
<head>
    <title>iGO - É só pedir!</title>
</head>
<body>
    <h1>Olá, {{ $partner['name'] }}</h1>
    <p>
        A conta da {{ $partner['company_name'] }} foi aprovada! <br> 
        Acesse o <a href="{{ URL::to('/login') }}">backoffice</a>  
        e cadastre as informações necessárias para a ativação da conta.
    </p>
    <p>
        <strong>Dados da conta:</strong>
        <ul>
            <li>E-mail: {{ $user['email'] }}</li>
            <li>Senha: {{ strstr($user['email'], '@', true) . substr($partner['mobile_phone_number'], -3  ) . '@iGO' }}</li>
            
        </ul>
    </p>

    <p>Obrigado!</p>
</body>
</html>