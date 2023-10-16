@extends('layout.app')

@section('titulo', 'citas')

@section('contenido')
<style scoped>
    div {
        text-align: center;
    }

    h2 {
        color: white;
    }

    .div2{
        background-color: white;
       
    }

    .container{
        text-align: center
    }

    p{
        color: black; 
        font-family: 'Courier New', Courier, monospace; 
        
    }
    
</style>
<div>
    <h2>
        <b>Cosulta de citas</b>
    </h2>

    <table class="table table-dark" id="tablaCitas">
        <thead>
            <th>Hola</th>
            <th>Como</th>
            <th>Estas?</th>
        </thead>
        <tbody>
            <tr>
                <td><br></td>
                <td><br></td>
                <td><br></td>
            </tr>
            <tr>
                <td><br></td>
                <td><br></td>
                <td><br></td>
            </tr>
            <tr>
                <td><br></td>
                <td><br></td>
                <td><br></td>
            </tr>
        </tbody>
    </table>
    

@endsection