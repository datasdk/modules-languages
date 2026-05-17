@extends('layouts.app')

@section('content')

@php
    
    $category = [
      "role"=>"role",
      "membership"=>"Medlemskab"
    ];

@endphp



  <form method="post" action="{{$action}}">


    @if($type == "edit") @method('PATCH') @endif


    @csrf


    <table class="table">

      <tr>
        <th colspan="2">Rolle</th>
      </tr>
      

      <tr>
          <td width="150">Rolle</td>
          <td> 
          
            <input type="text" name="name" 
            value="@isset($role->name){{$role->name}}@endisset" 

            @if($type == "edit")

              readonly

            @endif

            class="form-control"> 

          </td>
      </tr>


      <tr>
        <td >Navn</td>
        <td> 
    
          <input type="text" name="name"  :default="$role"  />

        </td>
      </tr>


      <tr>
        <td >Beskrivelse</td>
        <td> 
    
          <input type="text" name="description"  :default="$role"  />

        </td>
      </tr>


      <tr>
        <td >Kategori</td>
        <td> 
      

          <select name="category" class="form-control">
            

            @foreach ($category as $key => $val)
               
              <option value="{{$key}}"
              
              @isset($role->category)

                @if($key == $role->category)

                  selected

                @endif

              @endisset

              
              >{{$val}}</option> 

            @endforeach

            <!--<option value="customertype">Kunde type</option>-->
          </select>
          

        </td>
      </tr>

      <tr>
        <td >Aktiv</td>
        <td> 
    
          <label>
            
            <input type="checkbox" name="active"  :default="$role"  /> 

            Denne rolle er aktiv

          </label>

        </td>
      </tr>

    </table>

    
    <button class="btn btn-primary">Opdater rolle</button> 
    <a href="{{$back}}" class="btn btn-default">Annuller</a>


  </form>




@endsection
