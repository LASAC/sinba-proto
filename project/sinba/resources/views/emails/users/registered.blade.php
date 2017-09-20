<h1>Novo Usuário Registrado</h1>

<h2>Dados Pessoais:</h2>

<ul>
    <li>{{$user->name}} {{$user->lastName}}</li>
    <li>Email: {{$user->email}}</li>
    <li>CPF: {{$user->cpf}}</li>
    <li>RG: {{$user->rg}}</li>
</ul>

<h2>Dados da Instituição</h2>

<ul>
    <li>Instituição: {{$user->institution}}</li>
    <li>Ocupação: {{$user->occupation}}</li>
</ul>

<h2>Endereço:</h2>
<p>
    {{$user->address}}
</p>
<h2>Justificativa:</h2>
<p>
    {{$user->justification}}
</p>
