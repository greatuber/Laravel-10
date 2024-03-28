<h1>Nova Dúvida</h1>

<x-alert></x-alert>

<form action="{{route('supports.store')}}" method="POST">
  @include('admin.supports.form')
</form>