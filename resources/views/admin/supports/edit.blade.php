<h1>Dúvida {{$support->id}}</h1>

<x-alert></x-alert>

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @method('PUT')
    @include('admin.supports.form', ['support' => $support])
</form>