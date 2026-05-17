
@extends('layouts.app')

@section('content')



    <table class="stripped">

      <tr>
          <th>Sprog</th>
          <th>Sprog</th>
      </tr>    


      @foreach($languages as $id => $val)
      
        <tr id="{{ $val["id"] }}">
          <td>

              {{ ucfirst($val["name"]) }}

          </td>
          <td>

            <div>{{ $val["shortname"] }}</div>
         
          </td>

          <td class="text-right">

  

          </td>
        </tr>

      @endforeach
      
    </table>

  
    <a href="/settings" class="btn btn-default">Annuller</a>


@endsection
